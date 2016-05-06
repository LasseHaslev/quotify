<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
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
                ->nullable()
                ->index();
            $table->foreign( 'language_id' )
                ->references( 'id' )
                ->on( 'languages' )
                ->onDelete( 'set null' );

            $table->integer( 'quote_container_id' )
                ->unsigned()
                ->index();
            $table->foreign( 'quote_container_id' )
                ->references( 'id' )
                ->on( 'quote_containers' )
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
        Schema::drop('quotes');
    }
}
