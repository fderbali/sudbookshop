<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsletterRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'first_name' => 'max:50',
                        'last_name' => 'max:50',
                        'email' => 'required|email|unique:newsletter'
		];
	}

}
