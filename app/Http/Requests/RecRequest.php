<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // リクエストを許可
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'date_time' => 'required|date',
            'location' => 'required|string',
            'image' => 'sometimes|image|max:2048', // 画像ファイルのバリデーションルール（必要に応じて調整）
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'タイトルは必須項目です。',
            'title.string' => 'タイトルは文字列で指定してください。',
            'description.required' => '概要は必須項目です。',
            'description.string' => '概要は文字列で指定してください。',
            'date_time.required' => '日時は必須項目です。',
            'date_time.date' => '日時は日付形式で指定してください。',
            'location.required' => '場所は必須項目です。',
            'location.string' => '場所は文字列で指定してください。',
            'image.image' => '画像は有効な画像ファイルで指定してください。',
            'image.max' => '画像のサイズは2MB以内である必要があります。',
        ];
    }
}

