<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdathangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdathangs', function (Blueprint $table) {
            $table->id('id_ctdh');
            $table->unsignedBigInteger('id_dat_hang',20);
            $table->unsignedBigInteger('id_san_pham',20);
            $table->double('gia',50);
            $table->double('so_luong',50);
            $table->double('tong_tien',50);
            $table->timestamps();
            $table->foreign('id_dat_hang')->references('id_dat_hang')->on('dondathangs');
            $table->foreign('id_san_pham')->references('id_sp')->on('sanphams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdathangs');
    }
}
