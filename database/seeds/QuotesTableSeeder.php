<?php

use Illuminate\Database\Seeder;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Author::class, 5)->create()->each(function($u) {
            $quoteContainers = $u->quotes()->saveMany( factory( App\QuoteContainer::class, 5 )->make() );
            $quoteContainers->each( function ($quoteContainer)
            {
                $quotes = $quoteContainer->quotes()->saveMany( factory( App\Quote::class, 5 )->make() );
                // $quotes = $quoteContainer->quotes()->saveMany( factory( App\Quote::class, 5 )->make() );
                // $quotes->each( function ($quote)
                // {

                // } );
            } );
            // $u->posts()->save(factory(App\Post::class)->make());
        });
    }
}
