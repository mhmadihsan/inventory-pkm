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
        Schema::create('arcive_file', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->string('month');
            $table->dateTime('uploaded_at');
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name_file');
            $table->string('path_file');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')
                ->on('master_category')->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('user_id')->references('id')
                ->on('users')->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arcive_file');
    }
};
