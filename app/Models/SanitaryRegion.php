<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanitaryRegion extends Model
{
    use HasFactory;
    protected $table = 'sanitary_regions';
    protected $primaryKey = 'sanitary_region_id';

    public function province(){
        return $this->belongsTo(Province::class,'province_id');
    }

    public function users(){
        return $this->hasMany(User::class,'sanitary_region_id');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name'];

    public $timestamps = false;
}