<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDondathangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dondathangs', function (Blueprint $table) {
            $table->id('id_dat_hang');
            $table->unsignedBigInteger('id_khach_hang',50);
            $table->string('ten_khach_hang',50);
            $table->string('sdt',50);
            $table->string('dia_chi',50);
            $table->unsignedBigInteger('id_trang_thai',20);
            $table->timestamps();
            $table->foreign('id_khach_hang')->references('id_khach_hang')->on('khachhangs');
            $table->foreign('id_trang_thai')->references('id_trang_thai')->on('trangthais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dondathangs');
    }
}
