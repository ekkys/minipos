<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'code'=> 'required|max:255',
            'name'=> 'required|max:255',
            'description'=> 'required|max:255',
            'price'=> 'required|max:255',
            'quantity'=> 'required|max:255',
            'category_id'=> 'required|max:255',
            'supplier_id'=> 'required|max:255',
            'image' => 'image|file|max:1024 ',
        ];
    }
}
