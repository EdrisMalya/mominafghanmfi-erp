<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class MurabehaRequest extends Model
{
    use HasFactory, LogsActivity, CausesActivity;

    protected $guarded = [];

    protected $casts = [
        'step_2_completed' => 'boolean',
        'step_3_completed' => 'boolean',
        'step_4_completed' => 'boolean',
        'step_5_completed' => 'boolean',
        'step_6_completed' => 'boolean',
        'step_7_completed' => 'boolean',
        'step_8_completed' => 'boolean',
        'step_9_completed' => 'boolean',
        'step_10_completed' => 'boolean',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                        ->logOnlyDirty()
                        ->logOnly(['*'])
                        ->useLogName('MurabehaRequest')
                        ->dontSubmitEmptyLogs()
                        ->dontLogIfAttributesChangedOnly(['updated_at'])
                        ;
    }

    public function getCreatedAtAttribute($value){
        $ss = cache()->get('software-settings');
        if(!$ss) return $value;
        return Carbon::parse($value)->format(cache()->get('software-settings')->date_format.' h:i:s A');
    }

    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function customer_details() : HasOne
    {
        return $this->hasOne(CustomerDetails::class, 'financing_mode_request_id')->where('financing_mode', 'murabeha');
    }

    public function customer_assets() : HasMany
    {
        return $this->hasMany(CustomerAsset::class, 'relation_id')->where('relation', 'murabeha');
    }

    public function created_by_user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
