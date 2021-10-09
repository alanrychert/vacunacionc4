<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Batch;
use App\Models\Vaccine;

class AvailableVaccine implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($batch_number,$vaccine_number)
    {
        $this->batch_number = $batch_number;
        $this->vaccine_number = $vaccine_number;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        
        //batch_number is unique so there will always be only one batch with that number
        $batch = Batch::get()->where('batch_number','=',$this->batch_number)->first();
        
        $vaccine = Vaccine::get()
        ->where('batch_id','=',$batch->batch_id)
        ->where('vaccine_number','=',$this->vaccine_number)
        ->first();
        dd($this);
        return $vaccine!=null;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
