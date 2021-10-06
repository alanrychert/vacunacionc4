<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfVaccine extends Model
{
    use HasFactory;
    protected $table = 'type_of_vaccines';
    protected $primaryKey = 'type_of_vaccine_id';

    public function batches(){
        return $this->hasMany(Batch::class,'type_of_vaccine_id');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'type_code', 'days_between_doses'];


    public $timestamps = false;
}