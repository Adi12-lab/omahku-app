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
        return [
            "name" => ["string", "required", "max:225"],
            "category_id" => ["integer", "required"],
            "slug" => ["string", "required", "max:50", "unique:properties,slug"],
            "size" => ["required", "numeric"],
            "description" => ["string", "required", "min:10"],
            "province_id" => ["integer", "required"],
            "city_id" => ["integer", "required"],
            "year_built" => ["date"],
            "subdistrict_id" => ["integer", "required"],
            "bathrooms" => ["integer", "required"],
            "bedrooms" => ["integer", "required"],
            "rooms" => ["integer", "required"],
            "for" => ["in:on,off", "nullable"],
            "status" => ["in:on,off", "nullable"],
            "price" => ["required", "integer"],
            "isFeatured" => ["in:on,off", "nullable"],
            "latitude" => ["numeric", "nullable"],
            "longitude" => ["numeric", "nullable"],
        ];
    }
}
