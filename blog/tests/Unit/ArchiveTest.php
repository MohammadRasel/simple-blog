<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArchiveTest extends TestCase
{
    use RefreshDatabase;

    public function testArchives()
    {
        //Given I have two records in the database that are posts
        // and each one is posted a month apart
        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
        	'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        //When I fetch the archives
       $posts = Post::archives();

        //Then the response should be in proper format
        $this->assertEquals([
        	[
        		'year' => $first->created_at->format('Y'),
        		'month' => $first->created_at->format('F'),
        		'published' => 1

        	],
        	[
        		'year' => $second->created_at->format('Y'),
        		'month' => $second->created_at->format('F'),
        		'published' => 1

        	]
        ], $posts);
    }
}
