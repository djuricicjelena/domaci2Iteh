<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVezba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vezbe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv_vezbe');
            $table->string('opis');
            $table->integer('trener_id');
            $table->integer('tip_id');
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
        Schema::dropIfExists('vezbe');
    }
}
