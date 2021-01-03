<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();
            $table->string('athlete_name');
            $table->string('athlete_slug');
            $table->integer('club_id');
            $table->integer('pengcab_id');
            $table->integer('category_id');
            $table->integer('kelas_id');
            $table->string('address');
            $table->string('gender');
            $table->date('birthday');
            $table->string('prestasi');
            $table->string('image_one');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('athletes');
    }
}
