<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_languages', function (Blueprint $table) {
            $table->increments('id');

            $table->string( 'text' );

            $table->integer( 'confirmed_by' )
                ->unsigned()
                ->nullable()
                ->index();
            $table->foreign( 'confirmed_by' )
                ->references( 'id' )
                ->on( 'users' )
                ->onDelete( 'set null' );

            $table->integer( 'language_id' )
                ->unsigned()
                ->index();
            $table->foreign( 'language_id' )
                ->references( 'id' )
                ->on( 'languages' )
                ->onDelete( 'cascade' );

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
        Schema::drop('quote_languages');
    }
}
