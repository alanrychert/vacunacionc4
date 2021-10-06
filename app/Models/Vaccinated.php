<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Vaccinated extends Model
{
    use HasFactory;
    protected $table = 'vaccinated';
    protected $primaryKey = 'id';

    public function vaccines(){
        return $this->hasMany(
            Vaccine::class,'applied_vaccine', 'type_of_vaccine'
        );
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'dni', 'comorbidity', 'sex', 'date_of_birth', 'date_of_vaccination'];

    protected $guarded = ['id'];

    protected $dates = ['date_of_birth', 'date_of_vaccination'];

    public $timestamps = false;

    public function getDateOfBirthAttribute($date_of_birth) 
    {
        return Carbon::parse($date_of_birth)->format('yyyy-MM-dd');
    }

    public function getDateOfVaccinationAttribute($date_of_vaccination) 
    {
        return Carbon::parse($date_of_vaccination)->format('yyyy-MM-dd');
    }
}