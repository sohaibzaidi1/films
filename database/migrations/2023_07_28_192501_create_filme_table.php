<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id(); // Equivalent to: $table->bigIncrements('film_id');
            $table->string('name', 255);
            $table->text('description');
            $table->date('release_date');
            $table->timestamps(); // Adds created_at and updated_at columns automatically.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filme');
    }
}
