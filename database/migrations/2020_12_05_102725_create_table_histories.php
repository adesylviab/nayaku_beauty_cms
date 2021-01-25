<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//Nama, keluhane, perawatan.e opo, trus lek isok seh atek tanggal
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('treatment');
            $table->string('complaint');
            $table->string('hasil')->nullable();
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
        Schema::dropIfExists('histories');
    }
}
