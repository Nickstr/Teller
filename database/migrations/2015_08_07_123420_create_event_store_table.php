<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_store', function(Blueprint $t) {
            $t->string('uuid');
            $t->string('stream_id')->index();
            $t->string('type');
            $t->text('payload');
            $t->timestamps();
            $t->primary('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_store');
    }
}
