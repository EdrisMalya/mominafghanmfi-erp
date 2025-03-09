<?php

namespace App\Http\Controllers\Configurations\SystemConfigurations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configurations\SystemConfigurations\FinancingModeRequest;
use App\Http\Resources\Configurations\SystemConfigurations\FinancingModeResource;
use App\Models\FinanceModeRequestSteps;
use App\Models\FinancingMode;
use App\Models\RequestStepFields;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FinancingModeController extends Controller
{
    public function index()
    {
        $this->allowed('financing-modes-configurations-access');
        $modes = FinancingMode::all()->load(['steps.fields'=>function ($query) {
            $query->whereNull('request_step_field_id');
        }]);
        return FinancingModeResource::collection($modes);
    }

    public function store(FinancingModeRequest $request)
    {
        $this->allowed('financing-modes-configurations-create');
        $data = $request->validatedData();
        $mode = FinancingMode::query()->create($data);
        if($data['default_mode']){
            FinancingMode::query()
                ->where('default_mode', true)
                ->where('id', '!=', $mode->id)
                ->update(['default_mode' => false]);
        }
        return ['result' => true, 'message' => 'Saved successfully'];
    }
    public function update(FinancingMode $financingMode, FinancingModeRequest $request)
    {
        $this->allowed('financing-modes-configurations-update');
        $data = $request->validatedData();
        $financingMode->update($data);
        if($data['default_mode']){
            FinancingMode::query()
                ->where('default_mode', true)
                ->where('id', '!=', $financingMode->id)
                ->update(['default_mode' => false]);
        }
        return ['result' => true, 'message' => 'Mode updated successfully', 'mode' => $financingMode];
    }
    public function destroy(FinancingMode $financingMode)
    {
        $this->allowed('financing-modes-configurations-delete');
        $financingMode->delete();
        return ['result' => true, 'message' => 'Deleted successfully'];
    }


    public function stepConfigurations(Request $request)
    {
        $this->allowed('financing-modes-configurations-update-configurations');
        $financing_mode = $request->get('financing_mode');
        $financing_mode = FinancingMode::query()->find($financing_mode['id']);

        DB::beginTransaction();
        try {
            $existingSteps = FinanceModeRequestSteps::where('financing_mode_id', $financing_mode->id)
                ->get()
                ->keyBy('id');
            $requestStepIds = [];

            foreach ($request->get('steps') as $index => $stepData) {
                $stepId = $stepData['id'] ?? null;
                $stepParams = [
                    'step_name' => $stepData['name'],
                    'required' => $stepData['required'],
                    'order' => $index,
                    'financing_mode_id' => $financing_mode->id,
                ];

                // Update or create step
                if ($stepId && $existingSteps->has($stepId)) {
                    $step = $existingSteps->get($stepId);
                    $step->update($stepParams);
                    $existingSteps->forget($stepId);
                } else {
                    $step = FinanceModeRequestSteps::create($stepParams);
                    $stepId = $step->id;
                }
                $requestStepIds[] = $stepId;

                // Process fields for this step
                $existingFields = RequestStepFields::where('finance_mode_request_step_id', $step->id)
                    ->get()
                    ->keyBy('id');
                $requestFieldIds = [];

                foreach ($stepData['fields'] as $fieldIndex => $fieldData) {
                    $fieldId = $fieldData['id'] ?? null;
                    $fieldParams = [
                        'order' => $fieldIndex,
                        'field_name' => $fieldData['field_name'],
                        'width' => $fieldData['width'],
                        'field' => json_encode($fieldData['field']),
                        'finance_mode_request_step_id' => $step->id,
                        'request_step_field_id' => null,
                    ];

                    // Update or create parent field
                    if ($fieldId && $existingFields->has($fieldId)) {
                        $field = $existingFields->get($fieldId);
                        $field->update($fieldParams);
                        $existingFields->forget($fieldId);
                    } else {
                        $field = RequestStepFields::create($fieldParams);
                        $fieldId = $field->id;
                    }
                    $requestFieldIds[] = $fieldId;

                    // Process child fields if applicable
                    if (isset($fieldData['field']['value']) &&
                        $fieldData['field']['value'] === 'multiple-fields' &&
                        !empty($fieldData['field']['options']['fields'])) {
                        $existingChildFields = RequestStepFields::where('request_step_field_id', $field->id)
                            ->get()
                            ->keyBy('id');

                        foreach ($fieldData['field']['options']['fields'] as $childIndex => $childData) {
                            $childId = $childData['id'] ?? null;
                            $childParams = [
                                'order' => $childIndex,
                                'field_name' => $childData['field_name'],
                                'width' => $childData['width'],
                                'field' => json_encode($childData['field']),
                                'finance_mode_request_step_id' => $step->id,
                                'request_step_field_id' => $field->id,
                            ];

                            // Update or create child field
                            if ($childId && $existingChildFields->has($childId)) {
                                $childField = $existingChildFields->get($childId);
                                $childField->update($childParams);
                                $existingChildFields->forget($childId);
                            } else {
                                RequestStepFields::create($childParams);
                            }
                        }

                        // Delete remaining child fields not in request
                        $existingChildFields->each->delete();
                    }
                }

                // Delete fields not present in the request
                $existingFields->each->delete();
            }

            // Delete steps not present in the request
            $existingSteps->each->delete();

            DB::commit();
            return ['result' => true, 'message' => 'Saved'];
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception);
            return ['result' => false, 'message' => $exception->getMessage()];
        }
    }
}
