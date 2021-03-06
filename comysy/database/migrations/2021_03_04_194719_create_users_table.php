<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('UserName',20);
            $table->string('Password');
            $table->integer('UserType');// أنواع المستخدم شركة أو آدمن أو كازية
            $table->string('Email',20)->unique();
            $table->double('Balance');
            $table->boolean('AllowNeg');
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
        Schema::dropIfExists('users');
    }
}
