<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->bigInteger('nik')->unsigned();
            $table->bigInteger('no_telpon')->unsigned();
            $table->bigInteger('no_kk')->unsigned();
            $table->text('alamat');
            $table->string('img_npwp')->nullable();
            $table->string('img_ktp', 255)->nullable();
            $table->string('img_kk', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
