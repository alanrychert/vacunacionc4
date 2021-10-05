<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Batch extends Model
{
    use HasFactory;
    protected $table = 'vaccines_batches';
    protected $primaryKey = 'id';

    public function vaccines(){
        return $this->hasMany(Vaccines::class,'batch_number');
    }

    /**
     * The attributes that are mass asignable
     * 
     * @var array
     */
    protected $fillable = ['batch_number', 'since', 'to', 'dose', 'reception_date', 'date_of_expiry'];

    protected $guarded = ['id'];

    protected $dates = ['date_of_expiry'];

    public function getDateOfExpiryAttribute($date_of_expiry) 
    {
        return Carbon::parse($date_of_expiry)->format('yyyy-MM-dd');
    }

    public $timestamps = false;
}