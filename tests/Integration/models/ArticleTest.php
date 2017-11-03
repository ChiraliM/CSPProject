<?php

namespace Tests\Integration\Models;

use \App\Data\Models\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends TestCase
{

    use DatabaseTransactions;   // Rolls everything back to exactly the way it was before running the test.

    /**
     * @test
     *
     * @return void
     */
    public function it_fetches_trending_articles()
    {
        /* 1. Given - You have 5 articles in the db, 2 of which are popular. In the list, this two should be at the top */

        //Create a model factory to avoid adding records to the db manually each time! (i.e. Article::create();) using factory global class.
        //This will generate 3 dummy articles and persist them to our database.
        factory(Article::class, 3)->create();

        factory(Article::class)->create(['reads' => 20]);
        $mostPopular = factory(Article::class)->create(['reads' => 30]);

        /* 2. When */

        // Use a Query Scope here - When I call an action trending,

        $articles = Article::trending();

        /* 3. Then */

        // In this part, write your phpunit assertions.

        $this->assertEquals($mostPopular->id, $articles->first()->id);
        $this->assertCount(3, $articles);
    }
}
