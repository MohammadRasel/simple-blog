<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{




	public function testApplication()
	    {
	        $response = $this->get('/');

	        $response->assertStatus(200);
	    }

}
