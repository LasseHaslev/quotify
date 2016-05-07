<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserQuoteFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quote_favorites', function (Blueprint $table) {
            $table->increments('id');

            // User
            $table->integer( 'user_id' )
                ->unsigned()
                ->index();
            $table->foreign( 'user_id' )
                ->references( 'id' )
                ->on( 'users' )
                ->onDelete( 'cascade' );

            // Quote
            $table->integer( 'quote_id' )
                ->unsigned()
                ->index();
            $table->foreign( 'quote_id' )
                ->references( 'id' )
                ->on( 'quotes' )
                ->onDelete( 'cascade' );

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_quote_favorites');
    }
}
