<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{


	use RefreshDatabase;

  	public function testUserRegister()
	{
		//store user info into database named blog_testing using fake-factory
		$user = factory('App\User')->create([
			'name' => 'Mohammad Rasel',
			'email' => 'rasel@gmail.com',
			'password' => 'root'
		]);



		// retrieve user info to check
	    $userInfo = [
	    	'name' => $user->name,
	      	'email' => $user->email,
	        'password' => $user->password,
	        'remember_token' => $user->remember_token,
	        'created_at' => $user->created_at,
	        'updated_at' => $user->updated_at
	    ];

	    $response = $this->post('/register', $userInfo);

	    $response->assertRedirect('/');
	   
	    $this->assertDatabaseHas('users', $userInfo);
	}
}
