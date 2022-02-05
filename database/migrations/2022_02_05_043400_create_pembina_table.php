<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->integer('kode_admin');
            $table->string('nama_admin');
            $table->integer('nta');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('tlp');
            $table->string('agama');
            $table->string('golongan');
            $table->string('jabatan');
            $table->string('pangkalan');
            $table->string('foto');
            $table->softDeletes();
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
        Schema::dropIfExists('pembina');
    }
}
