<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Vaccinated extends Model
{
    use HasFactory;
    protected $table = 'vaccinated';
    protected $primaryKey = 'vaccinated_id';

    public function vaccines(){
        return $this->hasMany(
            Vaccine::class,'vaccinated_id'
        );
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'dni', 'comorbidity', 'sex', 'date_of_birth', 'date_of_vaccination'];

    protected $dates = ['date_of_birth', 'date_of_vaccination'];

    public $timestamps = false;

    public function getDateOfBirthAttribute($date_of_birth) 
    {
        return Carbon::parse($date_of_birth)->format('Y-m-d');
    }

    public function getDateOfVaccinationAttribute($date_of_vaccination) 
    {
        return Carbon::parse($date_of_vaccination)->format('Y-m-d');
    }
}