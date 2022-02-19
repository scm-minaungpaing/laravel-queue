<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->longText("ORDERNUMBER")->nullable();
            $table->longText("QUANTITYORDERED")->nullable();
            $table->longText("PRICEEACH")->nullable();
            $table->longText("ORDERLINENUMBER")->nullable();
            $table->longText("SALES")->nullable();
            $table->longText("ORDERDATE")->nullable();
            $table->longText("STATUS")->nullable();
            $table->longText("QTR_ID")->nullable();
            $table->longText("MONTH_ID")->nullable();
            $table->longText("YEAR_ID")->nullable();
            $table->longText("PRODUCTLINE")->nullable();
            $table->longText("MSRP")->nullable();
            $table->longText("PRODUCTCODE")->nullable();
            $table->longText("CUSTOMERNAME")->nullable();
            $table->longText("PHONE")->nullable();
            $table->longText("ADDRESSLINE1")->nullable();
            $table->longText("ADDRESSLINE2")->nullable();
            $table->longText("CITY")->nullable();
            $table->longText("STATE")->nullable();
            $table->longText("POSTALCODE")->nullable();
            $table->longText("COUNTRY")->nullable();
            $table->longText("TERRITORY")->nullable();
            $table->longText("CONTACTLASTNAME")->nullable();
            $table->longText("CONTACTFIRSTNAME")->nullable();
            $table->longText("DEALSIZE")->nullable();
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
        Schema::dropIfExists('flights');
    }
}
