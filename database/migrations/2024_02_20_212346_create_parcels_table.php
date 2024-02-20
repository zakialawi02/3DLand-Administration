<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_table', function (Blueprint $table) {
            $table->id();
            $table->string('parcel_id');
            $table->string('parcel_name')->nullable();
            $table->integer('parcel_occupant')->nullable();
            // Tambahkan kolom lain jika diperlukan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcel_table');
    }
};
