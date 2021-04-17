<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithDrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('with_draws', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('value');
            $table->string('details')->nullable();
            $table->string('date');
            $table->unsignedBigInteger('details_id');
            $table->unsignedBigInteger('charity_id');
            $table->foreign('details_id')->references('id')->on('details')->onDelete('cascade');
            $table->foreign('charity_id')->references('id')->on('branches')->onDelete('cascade');
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
        Schema::dropIfExists('with_draws');
    }
}
