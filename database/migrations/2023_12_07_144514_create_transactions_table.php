<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->char('id_pegawai');
            $table->char('id_kendaraan');
            $table->char('id_driver');
            $table->integer('tujuan_tambang');
            $table->enum('tahap', ['firstACC', 'secondACC', 'firstReject', 'secondReject', 'waiting'])->default('waiting');
            $table->datetime('date_approve_1')->nullable();
            $table->datetime('date_approve_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
