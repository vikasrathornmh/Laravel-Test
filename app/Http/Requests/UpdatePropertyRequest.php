<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
        return [
            'county' => 'required',
            'country' => 'required',
            'town' => 'required',
            'description' => 'required',
            'url' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'image_full' => 'required',
            'image_thumbnail' => 'required',
            'num_bedrooms' => 'required',
            'num_bathrooms' => 'required',
            'price' => 'required',
            'property_type_id' => 'required',
            'type' => 'required'
        ];
    }
}
