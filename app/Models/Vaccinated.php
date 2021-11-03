<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use League\CommonMark\Extension\Attributes\Node\Attributes;

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
     * Accessor for Age.
    */
    public function age()
    {
        $currentDate = date("Y-m-d");
        $age = date_diff(date_create($this->date_of_birth), date_create($currentDate));

        $currentDate = date("Y-m-d");
        date_create($currentDate);
        
        return $age->format("%y");
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'dni', 'comorbidity', 'sex', 'date_of_birth'];

    protected $dates = ['date_of_birth'];

    public $timestamps = false;

    public function getDateOfBirthAttribute($date_of_birth) 
    {
        return Carbon::parse($date_of_birth)->format('Y-m-d');
    }

   
}