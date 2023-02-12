<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_has_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('point_id');
            $table->unsignedBigInteger('service_id');
            $table->integer('price')->default(0);
            $table->timestamps();
        });

        Schema::table('point_has_services', function($table) {
            $table->foreign('point_id')
                ->references('id')
                ->on('points');
            $table->foreign('service_id')
                ->references('id')
                ->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_has_services');
    }
};
