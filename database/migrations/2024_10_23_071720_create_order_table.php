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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('no_pop_hotline')->nullable();
            $table->string('tgl_order')->nullable();
            $table->string('no_po_md')->nullable();
            $table->string('tgl_proses_md')->nullable();
            $table->string('no_po_ahm')->nullable();
            $table->string('tgl_order_ke_ahm')->nullable();
            $table->string('part_no')->nullable();
            $table->string('etd_ahm')->nullable();
            $table->string('tgl_supply_ahm')->nullable();
            $table->string('tgl_gi_supply_md')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
