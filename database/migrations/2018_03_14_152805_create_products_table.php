<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('catergorydetails_code');
            $table->char('name', 50);
            $table->float('price');
            $table->string('saleup')->nullable();
            $table->string('imagefront');
            $table->string('imageback');
            $table->string('mainimage');
            $table->string('mainsquare');
            $table->string('detailimagetwo');
            $table->string('detailsquaretwo');
            $table->string('detailimagethree');
            $table->string('detailsquarethree');
            $table->string('event_code')->nullable();
            $table->longText('detail');
            $table->text('material');
            $table->text('care');
            $table->text('size');
            $table->text('fit');
            $table->longText('advice');
            $table->char('brands', 20);
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
        Schema::dropIfExists('products');
    }
}
