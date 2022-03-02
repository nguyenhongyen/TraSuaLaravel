<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaivietgioithieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baivietgioithieus', function (Blueprint $table) {
            $table->id();
            $table->string('tenbaiviet');
            $table->string('danhmuc');
            $table->string('hinhanh');
            $table->text('noidung');
            $table->string('kichhoat');
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
        Schema::dropIfExists('baivietgioithieus');
    }
}
