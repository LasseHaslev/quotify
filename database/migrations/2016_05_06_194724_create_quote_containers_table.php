<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_containers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer( 'author_id' )
                ->unsigned()
                ->index();
            $table->foreign( 'author_id' )
                ->references( 'id' )
                ->on( 'authors' )
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
        Schema::drop('quote_containers');
    }
}
