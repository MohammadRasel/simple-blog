<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class PostPublishTest extends TestCase
{
    
    use RefreshDatabase;

    public function testPublishPost()
	{
		//store post info into database named blog_testing using fake-factory
		$post = factory('App\Post')->create();
		$user = factory('App\User')->create([
			'name' => 'Mohammad Rasel',
			'email' => 'rasel@gmail.com',
			'password' => 'root'
		]);



		// retrieve post info to check
	    $postInfo = [
	    	'user_id' => $post->user_id,
	    	'title' => $post->title,
	      	'body' => $post->body,
	        'created_at' => $post->created_at,
	        'updated_at' => $post->updated_at	
	    ];

	    $response = $this->actingAs($user)->post('/posts', $postInfo);
	    $response->assertRedirect('/');
	    $this->assertDatabaseHas('posts', $postInfo);

	}
}

