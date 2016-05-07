<?php

use App\User;
use App\Quote;
use Illuminate\Database\Seeder;

class UseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $quotes = Quote::all();
        User::all()->each( function ( $user ) use ( $quotes )
        {

            for ($i = 0; $i < 10; $i++) {
                $user->favorites()->attach( $quotes->random()->id );
            }

        } );

    }
}
