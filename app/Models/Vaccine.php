<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table = 'vaccines';
    protected $primaryKey = 'id';

    public function type_of_vaccine(){
        return $this->belongsTo(TypeOfVaccine::class,'type_of_vaccine');
    }

    public function vaccinated(){
        return $this->belognsTo(Vaccinated::class,'dni');
    }

    public function batch(){
        return $this->belognsTo(Batch::class,'batch_number');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['vaccine_number', 'type_of_vaccine', 'batch_number'];

    protected $guarded = ['id'];

    public $timestamps = false;
}