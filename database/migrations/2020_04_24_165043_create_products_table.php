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
            $table->unsignedBigInteger('subsetitem-one');
            $table->unsignedBigInteger('subsetitem-two');
            $table->string('itemContent');
            $table->string('itemContentOne');
            $table->string('itemContentTwo');


            $table->unsignedBigInteger('categoryId');
            $table->timestamps();

            $table->bigInteger('itemrequest');
            $table->bigInteger('itemmax');
            $table->bigInteger('itemmin');

            $table->unsignedBigInteger('itemtitle_id');

            $table->foreign('itemunitId')->references('id')->on('itemunits')->onDelete('cascade');
            $table->foreign('subsetitem-one')->references('id')->on('itemunits')->onDelete('cascade');
            $table->foreign('subsetitem-two')->references('id')->on('itemunits')->onDelete('cascade');

            $table->foreign('itemtitle_id')->references('id')->on('item_titles')->onDelete('cascade');


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
