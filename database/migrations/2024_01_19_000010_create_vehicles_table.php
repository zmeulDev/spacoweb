<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('model')->nullable();
            $table->string('vin')->nullable();
            $table->string('type');
            $table->string('plates');
            $table->integer('odometer')->nullable();
            $table->date('manufacter_date')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('owner')->nullable();
            $table->date('insurance')->nullable();
            $table->date('inspection')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
