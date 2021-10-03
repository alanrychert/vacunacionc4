<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $table = 'vaccines_batches';
    protected $primaryKey = 'id';
    
    public function vaccine(){
        return $this->belongsTo(Vaccine::class,'id');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['code', 'number_of_vaccines', 'reception_date'];

    protected $guarded = ['id'];

    public $timestamps = false;
}