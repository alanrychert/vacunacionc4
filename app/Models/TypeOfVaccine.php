<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfVaccine extends Model
{
    use HasFactory;
    protected $table = 'type_of_vaccines';
    protected $primaryKey = 'id';

    public function vaccines(){
        return $this->hasMany(Vaccine::class,'type_of_vaccine');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'type_code', 'days_between_doses'];

    protected $guarded = ['id'];

    public $timestamps = false;
}