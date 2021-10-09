<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Batch extends Model
{
    use HasFactory;
    protected $table = 'vaccines_batches';
    protected $primaryKey = 'batch_id';

    public function vaccines(){
        return $this->hasMany(Vaccines::class,'batch_id');
    }

    public function type_of_vaccine(){
        return $this->belongsTo(TypeOfVaccine::class,'type_of_vaccine_id');
    }

    public function sanitary_region(){
        return $this->belongsTo(SanitaryRegion::class,'sanitary_region_id');
    }

    /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['batch_number', 'since', 'to', 'dose', 'reception_date', 'date_of_expiry'];

    protected $dates = ['reception_date','date_of_expiry'];

    public function getReceptionDateAttribute($reception_date) 
    {
        return Carbon::parse($reception_date)->format('yyyy-MM-dd');
    }

    public $timestamps = false;
}