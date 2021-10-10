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
    public function __construct($request)
    {
        $this->request= $request;
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
        $batch = Batch::get()->where('batch_number','=',$this->request->batch_number)->first();
        
        $vaccine = Vaccine::get()
        ->where('batch_id','=',$this->$batch->batch_id)
        ->where('vaccine_number','=',$this->request->vaccine_number)
        ->first();
        dd($this);
        return is_null($vaccine);

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
