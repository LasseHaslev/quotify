<?php

use Illuminate\Database\Seeder;
use App\Quote;

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
            $quoteContainers = $u->quotes()->saveMany( factory( App\Quote::class, 5 )->make() );
            $quoteContainers->each( function ($quoteContainer)
            {
                $quotes = $quoteContainer->contents()->saveMany( factory( App\QuoteLanguage::class, 5 )->make() );
                // $quotes = $quoteContainer->quotes()->saveMany( factory( App\QuoteLanguage::class, 5 )->make() );
                // $quotes->each( function ($quote)
                // {

                // } );
            } );
            // $u->posts()->save(factory(App\Post::class)->make());
        });
    }
}
