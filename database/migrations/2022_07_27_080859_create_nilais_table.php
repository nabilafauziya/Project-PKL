<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_guru')->unsigned();
            $table->bigIteger('id_kelas')->unsigned();
            $table->integer('nilai_kehadiran');
            $table->integer('nilai_harian');
            $table->integer('pas');
            $table->integer('pat');
            $table->integer('raport');
            $table->string('nilai_grade');


             // foreign key
            $table->foreign('id_guru')->references('id')->on('gurus');
            $table->foreign('id_kelas')->references('id')->on('kelas');
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
        Schema::dropIfExists('nilais');
    }
}