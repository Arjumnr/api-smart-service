<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_oli', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->foreignId('oli_id');
            $table->dateTime('tgl_aktif');
            $table->date('expire');
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
        Schema::dropIfExists('user_oli');
    }
}
