<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
          'title'=>'required|unique:products',
          'description'=>'required',
          'image'=>'required|image',
          'content'=>'required',
          'category_id'=>'required',
          'price'=>'required'
        
        ];
    }
}
