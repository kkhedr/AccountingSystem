<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_titles', function (Blueprint $table) {
            $table->bigIncrements('id');

            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            {
                $table->string('itemtitle_'.$localeCode);
            }
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
        Schema::dropIfExists('item_titles');
    }
}
