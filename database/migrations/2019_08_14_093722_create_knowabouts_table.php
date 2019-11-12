<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowaboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowabouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tagline');
            $table->longtext('description');
            $table->string('image');
            $table->string('altimage');
            $table->string('file');
            $table->string('video');

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
        Schema::dropIfExists('knowabouts');
    }
}
