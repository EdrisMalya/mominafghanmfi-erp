<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class CustomerRequiredItem extends Model
{
    use HasFactory, LogsActivity, CausesActivity;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                        ->logOnlyDirty()
                        ->logOnly(['*'])
                        ->useLogName('CustomerRequiredItem')
                        ->dontSubmitEmptyLogs()
                        ->dontLogIfAttributesChangedOnly(['updated_at'])
                        ;
    }

    public function getCreatedAtAttribute($value){
        $ss = cache()->get('software-settings');
        if(!$ss) return $value;
        return Carbon::parse($value)->format(cache()->get('software-settings')->date_format.' h:i:s A');
    }

    public function supplier_document()
    {
        return $this->belongsTo(File::class, 'supplier_document_id');
    }
}
