<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {

            $table->bigIncrements('ID');

            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('ID')->on('users')->onDelete('cascade');

            $table->string('CenterName',20);
            $table->integer('Moblie')->unique();
            $table->integer('Phone')->nullable;
            $table->string('Address');
            $table->string('IP',20);
            $table->integer('OrdersNum');
            $table->integer('Banned');// (3 حظر كامل بدون تسجيل دخول) (2 حتى يتنهي رصيده)  (1 محظور لمدة 24 ساعة) قيم (0 غير محظور )
            $table->string('BannedReason');
            $table->date('BannedDate');
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
        Schema::dropIfExists('clients');
    }
}
