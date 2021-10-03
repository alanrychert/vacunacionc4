<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinated extends Model
{
    use HasFactory;
    protected $table = 'vaccinated';
    protected $primaryKey = 'id';

        /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'dni', 'comorbilidad', 'sex', 'date_of_birth', 'date_of_vaccination'];

    protected $guarded = ['id'];

    public $timestamps = false;
}