<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //dd($this->route('contacts'));
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            //to chect if company id exist in table companies.
            'company_id'=>'required|exists:companies,id'
        ];
    }

     public function attributes(){

     return[ 'company_id' => 'company'];
     }

    public function messages(){

            return [
                'email.email' => 'the email you entered is not valid',
                'first_name.required' => 'First name cannot be empty',
                'email.required' => 'email cannot be empty',
                "*.required" => 'the :attribute field cannot be empty'
            ];
         }
}
