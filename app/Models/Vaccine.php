<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table = 'vaccines';
    protected $primaryKey = 'vaccine_id';

    public function vaccinated(){
        return $this->belongsTo(Vaccinated::class,'vaccinated_id');
    }

    public function batch(){
        return $this->belongsTo(Batch::class,'batch_id');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['vaccine_number','vaccinated_id'];


    public $timestamps = false;
}