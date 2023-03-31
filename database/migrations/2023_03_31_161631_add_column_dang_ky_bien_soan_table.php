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
        //
        Schema::table('dang_ki_bien_soan', function (Blueprint $table) {
            //
            $table->integer('status');
            $table->integer('tongdiem');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('dang_ki_bien_soan', function (Blueprint $table) {
            //
            $table->removeColumn('status');
            $table->removeColumn('tongdiem');

        });
    }
};
