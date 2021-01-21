<?php
namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BannerRequest extends FormRequest
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
            'title'=> ['required',Rule::unique('banners', "title")->ignore($this->id)],
            'image_location_type_code'=> "required|string",
            'image'=> "mimes:jpeg,png|max:5120",
            'status'=>'boolean'
        ];
    }

}