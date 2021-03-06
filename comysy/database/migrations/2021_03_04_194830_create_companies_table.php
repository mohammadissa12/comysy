<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {

            $table->bigIncrements('ID');
            $table->string('CompanyName',20);
            $table->string('UserName',20);
            $table->string('Password');
            $table->string('CompanyType',20);
            $table->integer('Aviliable');
            $table->boolean('IsAuto');

            $table->string('Message')->nullable();




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
        Schema::dropIfExists('companies');
    }
}
