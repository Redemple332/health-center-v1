<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
		return [
			'health_center_id' => 'nullable',
			'first_name' => 'required|string',
			'last_name' => 'required|string',
			'contact' => 'required|string',
			'address' => 'required|string',
			'password' => 'required|min:8|confirmed',
			'email' => ['required', 'email', 'string', 'max:255'],
			'role_id' => 'exists:roles,id',
		];
	}
}
