<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_services', function (Blueprint $table) {

            $table->bigIncrements('ID');

            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('ID')->on('users')->onDelete('cascade');

            $table->string('ServiceName',20);
            $table->string('ServiceType',20);
            $table->boolean('IsPrime');
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
        Schema::dropIfExists('user_services');
    }
}
