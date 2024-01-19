<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('address')->nullable();
            $table->string('type');
            $table->integer('rooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->string('parking')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
