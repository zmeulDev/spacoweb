<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContractsTable extends Migration
{
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->foreign('vehicle_id', 'vehicle_fk_9411223')->references('id')->on('vehicles');
            $table->unsignedBigInteger('property_id')->nullable();
            $table->foreign('property_id', 'property_fk_9411224')->references('id')->on('properties');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_9411229')->references('id')->on('teams');
        });
    }
}
