<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('nha_cung_caps', function (Blueprint $table) {
            $table->id();
            $table->string('ma_nha_cung_cap')->unique();
            $table->string('ten_nha_cung_cap');
            $table->string('nguoi_dai_dien');
            $table->string('dia_chi');
            $table->string('dien_thoai');
            $table->string('email');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }


    public function down()
    {
        //
    }
};
