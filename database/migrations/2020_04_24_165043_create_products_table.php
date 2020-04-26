<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productcode');
            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            {
                $table->string('name_'.$localeCode);
            }
            $table->unsignedBigInteger('itemunitId');
            $table->string('subsetitem');
            $table->string('itemContent');
            $table->unsignedBigInteger('categoryId');
            $table->timestamps();

            $table->bigInteger('itemrequest');
            $table->bigInteger('itemmax');
            $table->bigInteger('itemmin');

            $table->foreign('itemunitId')->references('id')->on('itemunits')->onDelete('cascade');
            $table->foreign('categoryId')->references('id')->on('categorytypes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
