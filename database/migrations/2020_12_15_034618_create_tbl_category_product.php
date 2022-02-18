<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCategoryProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category_product', function (Blueprint $table) {
            $table->increments('phong_id');
            $table->text('tieu_de_phong');
            $table->integer('gia_phong');
            $table->text('quan');
            $table->integer('chu_phong_id');
            $table->text('so_nha_duong');
            $table->text('hien_thi');
            $table->integer('dien_tich');
            $table->string('hinh_anh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_category_product');
    }
}
