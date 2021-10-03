<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table = 'vaccines';
    protected $primaryKey = 'id';
    
    public function veterinaria(){
        return $this->belongsTo(Veterinaria::class,'id');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['code', 'name', 'dose', 'time_between_doses', 'date_of_expiry'];

    protected $guarded = ['id'];

    public $timestamps = false;

    public function getImagenAttribute($imagen){
        if($imagen == NULL){
            return NULL;
        }

        $contenido = stream_get_contents($imagen);

        return $contenido;
    }
}