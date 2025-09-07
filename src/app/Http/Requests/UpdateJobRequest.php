<?php

namespace App\Http\Requests;

class UpdateJobRequest extends JobRequest
{
    public function rules(): array
    {
        return array_merge($this->commonRules(), [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'salary' => 'sometimes|integer',
        ]);
    }
}