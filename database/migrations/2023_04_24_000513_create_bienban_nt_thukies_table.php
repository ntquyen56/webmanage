<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienban_nt_thukies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_giaotrinh');
            $table->text('nd_giaotrinh');
            $table->text('kt_giaotrinh');
            $table->text('ndtd_giaotrinh');
            $table->text('ddcautruc_gt');
            $table->text('nd_ketluan');


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
        Schema::dropIfExists('bienban_nt_thukies');
    }
};
