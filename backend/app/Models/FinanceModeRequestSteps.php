<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class FinanceModeRequestSteps extends Model
{
    use HasFactory, LogsActivity, CausesActivity;

    protected $guarded = [];

    protected $casts = [
        'required' => 'boolean'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                        ->logOnlyDirty()
                        ->logOnly(['*'])
                        ->useLogName('FinanceModeRequestSteps')
                        ->dontSubmitEmptyLogs()
                        ->dontLogIfAttributesChangedOnly(['updated_at'])
                        ;
    }

    public function getCreatedAtAttribute($value){
        $ss = cache()->get('software-settings');
        if(!$ss) return $value;
        return Carbon::parse($value)->format(cache()->get('software-settings')->date_format.' h:i:s A');
    }
    public function fields() : HasMany
    {
        return $this->hasMany(RequestStepFields::class, 'finance_mode_request_step_id')->where('request_step_field_id', '=', null);
    }
}
