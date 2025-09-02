<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('layanans', function (Blueprint $table) {
        $table->integer('harga_per_kilo')->after('jenis_layanan');
    });
}


public function down()
{
    Schema::table('layanans', function (Blueprint $table) {
        $table->dropColumn('harga_per_kilo');
    });
}

};
