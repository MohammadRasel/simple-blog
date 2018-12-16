<?php

namespace Tests\Unit;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MakeCommentTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeComment()
    {
		//create a user
        $user = factory('App\User')->create([
			'name' => 'Mohammad Rasel',
			'email' => 'rasel@gmail.com',
			'password' => 'root'
		]);
        // create a post
		$post = factory('App\Post')->create();
		//create a comment on above created post by a user which is created above
		$comment = factory('App\Comment')->create([
			'user_id'=> $user->id,
			'post_id'=> $post->id
		]);



		// retrieve comment info to check
	    $commentInfo = [
	    	'user_id' => $comment->user_id,
	    	'post_id' => $comment->post_id,
	    	'body' =>$comment->body
	    		
	    ];

	    $postId = $comment->post_id;

	   $var =  url("/posts/".$postId."/comments");
	   $var2 =  url("/posts/".$postId);

	    $response = $this->actingAs($user)->post($var, $commentInfo);
	    $response->assertRedirect($var2);
	    $this->assertDatabaseHas('comments', $commentInfo);//check database those info either exit or not
    }


    //test for addComment Function
    public function testAddComment(){
    	$user = factory('App\User')->create([
			'name' => 'Mohammad Rasel',
			'email' => 'rasel@gmail.com',
			'password' => 'root'
		]);
		$post = factory('App\Post')->create();
    	$comment = factory('App\Comment')->create([
			'user_id'=> $user->id,
			'post_id'=> $post->id
		]);

    	$this->actingAs($user);
    	$res = $post->addComment($comment->body); // addComment function takes one argument
    	$this->assertEquals(201, $res);
    }


}
