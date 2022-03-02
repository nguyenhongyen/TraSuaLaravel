<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanhngotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banhngot', function (Blueprint $table) {
            $table->id();
            $table->string('tenbanh');
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
        Schema::dropIfExists('banhngot');
    }
}
