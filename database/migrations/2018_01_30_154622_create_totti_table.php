<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTottiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('club');
            $table->integer('status')->default(1)->comment('状态:1为展示;2为下架');
            $table->index(['name','status']);
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
        Schema::dropIfExists('totti');
    }
}
