<?php

namespace App\Http\Requests;

use App\View\Components\TodoForm;
use Xlited\Lamx\Requests\HtmxRequest;

class TodoRequest extends HtmxRequest
{
    public string $component = TodoForm::class;

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
        return [
            'title' => 'required|string|max:255',
        ];
    }
}
