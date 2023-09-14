<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        $rules =  [
            "name" => ["string", "required", "max:225"],
            "category_id" => ["integer", "required"],
            "slug" => ["string", "required", "max:50"],
            "size" => ["required", "numeric"],
            "small_description" => ["string", "nullable", "max:75"],
            "description" => ["string", "required", "min:10"],
            "year_built" => ["date"],
            "subdistrict_id" => ["integer", "required"],
            "bathrooms" => ["integer", "required"],
            "bedrooms" => ["integer", "required"],
            "rooms" => ["integer", "required"],
            "for" => ["in:on,off", "nullable"],
            "status" => ["in:on,off", "nullable"],
            "price" => ["required", "integer"],
            "isFeatured" => ["in:on,off", "nullable"],
            "previous_image.*" => ["nullable", "integer"],
            "address" => ["required", "string", "min:5"],
            "latitude" => ["numeric", "nullable"],
            "longitude" => ["numeric", "nullable"],
            "map_iframe" => ["string", "min:10", "nullable"],
            "street_iframe" => ["string", "min:10", "nullable"]
        ];
        if(!$this->isMethod("PATCH")) {
            $rules["slug"][] = "unique:properties,slug";
        }
        return $rules;
    }
}
