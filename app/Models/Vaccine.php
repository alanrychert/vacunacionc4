<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table = 'vaccines';
    protected $primaryKey = 'id';

    public function vaccines(){
        return $this->belongsTo(TypeOfVaccine::class,'type_of_vaccine');
    }

    public function batch(){
        return $this->belognsTo(Batch::class,'batch_number');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['suffix_code','dose'];

    protected $guarded = ['id'];

    public $timestamps = false;
}