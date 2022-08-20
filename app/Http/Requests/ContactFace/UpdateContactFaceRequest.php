<?php

namespace App\Http\Requests\ContactFace;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UpdateContactFaceRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //dd($this);
        return [
            'name' => 'required|string|max:255',
            //'phone' => 'nullable|unique:contact_faces,phone|max:13',
            'phone' => [
                'nullable',
                'max:13',
               // Rule::unique('contact_faces', 'phone')->ignore($this->id),
            ],
            //'email' => 'required|email|unique:contact_faces',
            'email' => [
                'required',
                'email',
               // Rule::unique('contact_faces')->ignore($this->id),
            ],
            'position' => 'nullable|string|max:50',
            'gender' => 'required',
            'status' => 'nullable',
            'client_id' => 'required|exists:clients,id',
        ];
    }
}
