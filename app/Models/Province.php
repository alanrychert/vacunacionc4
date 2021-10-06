<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $primaryKey = 'province_id';

    public function sanitary_regions()
    {
        return $this->hasMany(SanitaryRegion::class,'province_id');
    }

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name'];


    public $timestamps = false;
}