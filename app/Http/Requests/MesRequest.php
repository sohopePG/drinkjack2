<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // 認可チェックを有効にする場合は true に変更
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'comment' => 'required|string|max:255', // コメントは必須で255文字まで
            'description' => 'string|max:500', // 説明は文字列で最大500文字まで
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'comment.required' => 'コメントは必須です。',
            'comment.string' => 'コメントは文字列である必要があります。',
            'comment.max' => 'コメントは255文字以下である必要があります。',
            'description.string' => '説明は文字列である必要があります。',
            'description.max' => '説明は500文字以下である必要があります。',
        ];
    }
}

