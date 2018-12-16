<?php
namespace Tests\Unit;
use Tests\TestCase;
use Session;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
class LoginTest extends TestCase
{
	use RefreshDatabase;
    
    
     // The login form can be displayed.
    
    public function testLoginFormDisplayed()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
    
     // A valid user can be logged in.
     
    public function testLoginAValidUser()
    {
        $user = factory(User::class)->create([
        	'password' => bcrypt('root')
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'root'
        ]);
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
    }
    
     //An invalid user cannot be logged in.
    
    public function testDoesNotLoginAnInvalidUser()
    {
        $user = factory(User::class)->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'invalid'
        ]);
        $response->assertSessionHasErrors();
        $this->assertGuest(); //dontSeeIsAuthenticated
    }
    
   
}
