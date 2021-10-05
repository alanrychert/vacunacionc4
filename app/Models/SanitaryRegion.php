<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanitaryRegion extends Model
{
    use HasFactory;
    protected $table = 'sanitary_regions';
    protected $primaryKey = 'id';

    public function province(){
        return $this->belongsTo(Province::class,'province');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name'];

    protected $guarded = ['id'];

    public $timestamps = false;
}