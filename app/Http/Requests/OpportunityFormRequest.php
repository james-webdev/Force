<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpportunityFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules['status'] = 'required';
        $rules['close_date'] = 'required:date';
        $rules['value'] = 'required|numeric|min:1';
        $rules['title'] = 'required';
        $rules['description'] = 'required';    
        if (request('status') == 0) {

            $rules['close_date'] = 'required|date|after_or_equal:today';
        } else {
            
             $rules['close_date'] = 'required_without:expected_close|date|before_or_equal:today';   
            

        } 

        return $rules;
    }
}
