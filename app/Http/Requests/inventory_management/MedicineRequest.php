<?php

namespace App\Http\Requests\inventory_management;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
			'name' => 'required',
			'description' => 'required',
			'medicine_type_id' => 'required',
			'medicine_category_id' => 'required',
			'supplier_id' => 'required',
			'expiration_date' => 'required',
			'quantity' => 'required',
			'price' => 'required',
			'name' => 'required',
			'description' => 'nullable',
		];
	}
}
