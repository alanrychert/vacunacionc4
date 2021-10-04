<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfVaccine extends Model
{
    use HasFactory;
    protected $table = 'type_of_vaccine';
    protected $primaryKey = 'id';

    public function vaccines(){
        return $this->hasMany(Vaccine::class,'type_of_vaccine');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'preffix_code', 'time_between_doses', 'date_of_expiry'];

    protected $guarded = ['id'];

    public $timestamps = false;
}