<?php


namespace App\Http\Requests\Advert;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdvertRequest extends FormRequest
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
        //dd($this->post());
        return [
            'title'=> ['required',Rule::unique('adverts')->ignore($this->id)],
            'status'=>'boolean'
        ];
    }

}