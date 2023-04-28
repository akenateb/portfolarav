<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        return match ($this->method()){
            "POST"=>[
              "title" => "required|min:2|max:150|unique:articles",
                "content" => "required|min:10|max:1000",
                "category_id" => "required|exists:categories,id"
            ],
            "PUT" =>[
                "title" => "required|min:2|max:150|unique:articles,title," . $this->route("article")->id,
                "content" => "required|min:10|max:1000",
                "category_id" => "required|exists:categories,id"
            ],

        };
    }
}
