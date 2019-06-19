<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	protected $table = 'wb_users';
	protected $fillable = ['name', 'email'];
	public $timestamps = true;

	public function saveUser ($data) {
		$result =  User::where('email', $data['email'])->get();

		if(count($result) > 0) {
			return $result[0]->id;
		} else {
			$input = [
				'email' => $data['email'],
				'name'  => $data['name']
			];

			$user = User::create($input);

			return $user->id;
		}
	}
}
