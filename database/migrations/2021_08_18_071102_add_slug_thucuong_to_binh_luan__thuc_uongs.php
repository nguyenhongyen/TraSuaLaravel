<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugThucuongToBinhLuanThucUongs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('binh_luan__thuc_uongs', function (Blueprint $table) {
            $table->string('slug_thucuong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('binh_luan__thuc_uongs', function (Blueprint $table) {
            //
        });
    }
}
