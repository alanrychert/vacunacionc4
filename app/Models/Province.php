<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $primaryKey = 'id';

    public function sanitary_regions()
    {
        return $this->hasMany(SanitaryRegion::class,'province');
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