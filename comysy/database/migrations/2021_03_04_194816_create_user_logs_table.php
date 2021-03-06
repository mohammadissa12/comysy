<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_logs', function (Blueprint $table) {

            $table->bigIncrements('ID');
            $table->string('User'); //mhd
            $table->double('OldBalance');
            $table->date('TransfareDate');
            $table->double('Value');
            $table->double('NewBalance');

            $table->string('Title',20);

            $table->string('TransfareTo',20);

            $table->double('Coms');




            $table->string('Status',20);//منفذة

            $table->string('RejectedBy',20);
            $table->string('RejectCouse');
            $table->string('Message');
            $table->string('SubmittedBy',20);
            $table->date('SubmittedDate');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_logs');
    }
}
