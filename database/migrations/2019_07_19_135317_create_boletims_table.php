<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('nota_portugues');
            $table->float('nota_ingles');
            $table->float('nota_ciencias');
            $table->float('nota_mat');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->timestamps();
        });
        //Foreign Keys
        Schema::table('boletims', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletims');
    }
}
