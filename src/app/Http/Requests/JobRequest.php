<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
    public function commonRules(): array
    {
        return [
            'title' => 'string|max:255',
            'description' => 'string',
            'salary' => 'integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|in:Full-Time,Part-Time,Contract,Internship,Temporary,Volunteer,On-Call',
            'is_remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'required|email|max:255',
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website' => 'nullable|url|max:255',
        ];
    }
}
