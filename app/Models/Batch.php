<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Batch extends Model
{
    use HasFactory;
    protected $table = 'vaccines_batches';
    protected $primaryKey = 'id';

    public function vaccines(){
        return $this->hasMany(Vaccines::class,'batch_number');
    }

    public function sanitary_region(){
        return $this->belongsTo(SanitaryRegion::class,'name');
    }

    /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['province','batch_number', 'since', 'to', 'dose', 'reception_date', 'date_of_expiry', 'sanitary_region'];

    protected $guarded = ['id'];

    protected $dates = ['reception_date','date_of_expiry'];

    public function getReceptionDateAttribute($reception_date) 
    {
        return Carbon::parse($reception_date)->format('yyyy-MM-dd');
    }

    public $timestamps = false;
}