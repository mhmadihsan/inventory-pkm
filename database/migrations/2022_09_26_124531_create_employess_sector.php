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
        Schema::create('employess_sector', function (Blueprint $table) {
            $table->unsignedBigInteger('master_sector_id');
            $table->unsignedBigInteger('employess_id');
            $table->primary(['master_sector_id', 'employess_id']);
            $table->foreign('master_sector_id')->references('id')
                    ->on('master_sector')->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('employess_id')->references('id')
                    ->on('master_employess')->onDelete('cascade')
                    ->onUpdate('cascade');
            //$table->id();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employess_sector');
    }
};
