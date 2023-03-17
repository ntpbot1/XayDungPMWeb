<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->id();
            $table->string('ma_sp');
            $table->string('ten_sp');
            $table->double('gia_sp');
            $table->string('ram');
            $table->string('dung_luong');
            $table->string('pin');
            $table->string('hinh_anh');
            $table->string('mo_ta');
            $table->unsignedBigInteger('ma_nsx',20);
            $table->timestamps();
            $table->foreign('ma_nsx')->references('id')->on('nhasanxuats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphams');
    }
}
