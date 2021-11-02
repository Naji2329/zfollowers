<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->integer('quantity');
            $table->unSignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('cats')->onDelete('cascade');
            $table->unSignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('cats')->onDelete('cascade');
            $table->text('desc');
            $table->float('price');
            $table->integer('discount')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('services');
    }
}
