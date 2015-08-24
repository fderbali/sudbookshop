<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShippingAddressRequest extends Request {

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
                'shipping_address_ligne1' => 'required|max:200',
                'shipping_address_ligne2' => 'max:20',
                'city' => 'required|max:100',
                'country' => 'required|max:100',
                'zip_code' => 'required|max:7'
            ];
	}

}
