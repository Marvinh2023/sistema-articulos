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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $articleId = $this->route('article')?->id; // null si es store, id si es update

        return [
            'titulo'        => 'required|string|max:255|unique:articles,titulo,' . $articleId,
            'descripcion'   => 'required|string',
            'precio'        => 'required|numeric|min:0',
            'category_id'   => 'required|exists:categories,id',
            'condition_id'  => 'required|exists:conditions,id',
        ];
    }
}
