<?php namespace App\Services;

use App\Models\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'password' => 'required|confirmed|min:6|max:100',
			'email' => 'required|email|max:100|unique:user',
			'first_name' => 'required|max:50',
			'last_name' => 'required|max:50',
			'phone' => 'required|max:20',
			'billing_address1' => 'required|max:200',
			'billing_address2' => 'max:200',
			'zip_code' => 'required|max:50',
			'city' => 'required|max:50',
			'country' => 'required|max:50',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
			'password' => bcrypt($data['password']),
			'email' => $data['email'],
                        'phone' => $data['phone'],
                        'billing_address1' => $data['billing_address1'],
			'billing_address2' => $data['billing_address2'],
                        'zip_code' => $data['zip_code'],
                        'city' => $data['city'],
			'country' => $data['country'],
		]);
	}

}
