<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThucuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thucuongs', function (Blueprint $table) {
            $table->id();
            $table->string('tensanpham');
            $table->string('slug');
            $table->string('hinhanh');
            $table->integer('danhmuc');
            $table->integer('giaban');
            $table->integer('giamgia');
            $table->string('mota');
            $table->string('trangthai');
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
        Schema::dropIfExists('thucuongs');
    }
}
