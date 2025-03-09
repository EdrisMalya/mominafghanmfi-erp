<?php

namespace App\Models;

use App\Http\Resources\FileResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class Customer extends Model
{
    use HasFactory, LogsActivity, CausesActivity;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                        ->logOnlyDirty()
                        ->logOnly(['*'])
                        ->useLogName('Customer')
                        ->dontSubmitEmptyLogs()
                        ->dontLogIfAttributesChangedOnly(['updated_at'])
                        ;
    }

    public function getCreatedAtAttribute($value){
        $ss = cache()->get('software-settings');
        if(!$ss) return Carbon::make($value)->format('Y-m-d h:i:s A');
        return Carbon::parse($value)->format(cache()->get('software-settings')->date_format.' h:i:s A');
    }

    public function getUpdatedAtAttribute($value){
        $ss = cache()->get('software-settings');
        if(!$ss) return Carbon::make($value)->format('Y-m-d h:i:s A');
        return Carbon::parse($value)->format(cache()->get('software-settings')->date_format.' h:i:s A');
    }

    public function created_by_user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function photo() : HasOne
    {
        return $this->hasOne(File::class, 'relation_id')->where('relation_type', 'customer_files')->where('folder_prepend', 'photo');
    }

    public function nic_copy() : HasOne
    {
        return $this->hasOne(File::class, 'relation_id')->where('relation_type', 'customer_files')->where('folder_prepend', 'nic_copy');
    }

    public function province() : BelongsTo
    {
        return $this->belongsTo(CountryProvince::class, 'province_id');
    }
}
