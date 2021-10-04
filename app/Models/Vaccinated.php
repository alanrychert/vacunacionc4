<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinated extends Model
{
    use HasFactory;
    protected $table = 'vaccinated';
    protected $primaryKey = 'id';

    public function vaccines(){
        return $this->hasMany(
            Vaccine::class,['applied_vaccine', 'type_of_vaccine']
        );
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'dni', 'comorbidity', 'sex', 'date_of_birth', 'date_of_vaccination'];

    protected $guarded = ['id'];

    public $timestamps = false;
}