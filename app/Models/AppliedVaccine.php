<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedVaccine extends Model
{
    use HasFactory;
    protected $table = 'applied_vaccines';
    protected $primaryKey = 'id';

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['suffix_code','dose'];

    protected $guarded = ['id'];

    public $timestamps = false;
}