<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PortfolioRequest extends FormRequest
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
        $portfolio = $this->route('portfolio');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('portfolios', 'slug')->ignore($portfolio)],
            'description' => ['required', 'string'],
            'problem' => ['required', 'string'],
            'solution' => ['required', 'string'],
            'result' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
        ];
    }
}
