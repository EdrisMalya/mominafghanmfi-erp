<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class MurabehaRequest extends Model
{
    use HasFactory, LogsActivity, CausesActivity;

    protected $guarded = [];

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
}
