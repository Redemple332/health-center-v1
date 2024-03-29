<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
			'password' => 'required|min:8|confirmed',
			'contact' => 'required|string',
			'address' => 'required|string',
			'email' => 'required|email|unique:users,email',
			'role_id' => 'required|exists:roles,id',
		];
	}
}
