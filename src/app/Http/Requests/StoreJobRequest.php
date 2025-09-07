<?php

namespace App\Http\Requests;

class StoreJobRequest extends JobRequest
{
    public function rules(): array
    {
        return array_merge($this->commonRules(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
        ]);
    }
}
