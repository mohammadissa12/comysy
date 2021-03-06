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
        Schema::create('Users', function (Blueprint $table) {
            $table->int('ID')->increments();
            $table->string('UserName',20);
            $table->string('Password');
            $table->int('UserType');// أنواع المستخدم شركة أو آدمن أو كازية
            $table->string('email',20)->unique();
            $table->double('Balance');
            $table->boolean('AllowNeg');
            $table->date('CreatedDate');
            $table->date('LastUpdate');

            $table->rememberToken();
        });

        Schema::create('Clients', function (Blueprint $table) {
            $table->int('ID')->increments();
            $table->int('UserID')->unsigned();
            $table->foreign('UserID')->references('ID')->on('Users');
            $table->string('CenterName',20);
            $table->int('Moblie')->unique();
            $table->int('Phone')->nullable;
            $table->string('Address');
            $table->string('IP',20);
            $table->int('OrdersNum');
            $table->int('Banned');// (3 حظر كامل بدون تسجيل دخول) (2 حتى يتنهي رصيده)  (1 محظور لمدة 24 ساعة) قيم (0 غير محظور )
            $table->string('BannedReason');
            $table->date('BannedDate');

            $table->rememberToken();
        });

        Schema::create('Perms', function (Blueprint $table) {
            $table->int('ID')->increments();
            $table->int('UserID')->unsigned();
            $table->foreign('UserID')->references('ID')->on('Users');
            $table->int('CompanyID');

            $table->rememberToken();
        });




        Schema::create('UserLog', function (Blueprint $table) {
            $table->int('ID')->increments();
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

            $table->rememberToken();
        });




        Schema::create('Companies', function (Blueprint $table) {
            $table->int('ID')->increments();
            $table->string('CompanyName',20);
            $table->string('UserName',20);
            $table->string('Password');
            $table->string('CompanyType',20);
            $table->int('Aviliable');
            $table->boolean('IsAuto');

            $table->string('Message')->nullable();


            $table->date('CreatedDate');
            $table->date('LastUpdate');




            $table->rememberToken();
        });


        Schema::create('CompanyServices', function (Blueprint $table) {

               $table->int('ID')->increments();
               $table->int('CompanyID')->unsigned();
               $table->foreign('CompanyID')->references('ID')->on('Companies');
               $table->string('ServiceName',20);
               $table->string('ServiceType',20);

               $table->rememberToken();

            });


        Schema::create('UserServices', function (Blueprint $table) {
                $table->int('ID')->increments();
                $table->int('UserID')->unsigned();
                $table->foreign('UserID')->references('ID')->on('Users');
                $table->string('ServiceName',20);
                $table->string('ServiceType',20);
                $table->boolean('IsPrime');


                $table->rememberToken();
            });
            Schema::create('Commission', function (Blueprint $table) {
                            $table->int('ID')->increments();
                            $table->int('CompanyID')->unsigned();
                            $table->foreign('CompanyID')->references('ID')->on('Companies');
                            $table->double('C1');
                            $table->double('C2');
                            $table->double('C3');
                            $table->double('C4');
                            $table->double('C5');


                            $table->rememberToken();
             });


             Schema::create('Notifications', function (Blueprint $table) {
                $table->int('ID')->increments();
                $table->int('UserID')->unsigned();
                $table->foreign('UserID')->references('ID')->on('Users');
                $table->string('Title',20);
                $table->string('Message');

                $table->date('CreatedDate');

                $table->rememberToken();
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
