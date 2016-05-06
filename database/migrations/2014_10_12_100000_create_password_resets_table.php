<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();

            $table->integer( 'user_role_id' )
                ->unsigned()
                ->nullable()
                ->default( 0 )
                ->index();
            $table->foreign( 'user_role_id' )
                ->references( 'id' )
                ->on( 'user_roles' )
                ->onCascade( 'set null' );

            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_resets');
    }
}
