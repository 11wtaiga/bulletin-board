<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'thread.title' => 'required|string|max:100',
            'thread.discription' => 'required|string|max:4000',
        ];
    }
}