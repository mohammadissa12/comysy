<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_services', function (Blueprint $table) {


            $table->bigIncrements('ID');

            $table->unsignedBigInteger('CompanyID');
            $table->foreign('CompanyID')->references('ID')->on('companies')->onDelete('cascade');


            $table->string('ServiceName',20);
            $table->string('ServiceType',20);
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
        Schema::dropIfExists('company_services');
    }
}
