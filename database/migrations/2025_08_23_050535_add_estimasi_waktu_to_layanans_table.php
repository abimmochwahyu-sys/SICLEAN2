<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstimasiWaktuToLayanansTable extends Migration
{
    public function up()
    {
        Schema::table('layanans', function (Blueprint $table) {
            $table->integer('estimasi_waktu')->after('jenis_layanan');
        });
    }

    public function down()
    {
        Schema::table('layanans', function (Blueprint $table) {
            $table->dropColumn('estimasi_waktu');
        });
    }
};

