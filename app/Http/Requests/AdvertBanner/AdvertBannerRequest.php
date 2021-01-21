<?php
namespace App\Http\Requests\AdvertBanner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdvertBannerRequest extends FormRequest
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
            'advert_code'=> ['required', Rule::exists('adverts', "code")],
            'banner_id'=> ['required', Rule::exists('banners', "id"), Rule::unique('advert_banners', "banner_id")
                ->where(function ($query) {
                    return $query->where('advert_code', $this->advert_code);
                })->ignore($this->id)],
            'max_total_impression'=> "required|int|min:1",
            'max_total_display_per_impression'=> "required|int|min:1",
            'status'=>'boolean'
        ];
    }

}