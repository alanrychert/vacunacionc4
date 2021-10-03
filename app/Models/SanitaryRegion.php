<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanitaryRegion extends Model
{
    use HasFactory;
    protected $table = 'sanitary_regions';
    protected $primaryKey = 'id';

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'code'];

    protected $guarded = ['id'];

    public $timestamps = false;
}