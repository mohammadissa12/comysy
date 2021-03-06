<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {

            $table->bigIncrements('ID');

            $table->unsignedBigInteger('CompanyID');
            $table->foreign('CompanyID')->references('ID')->on('companies')->onDelete('cascade');

            $table->double('C1');
            $table->double('C2');
            $table->double('C3');
            $table->double('C4');
            $table->double('C5');

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
        Schema::dropIfExists('commissions');
    }
}
