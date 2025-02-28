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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del activo
            $table->string('serial_number')->unique(); // Número de serie
            $table->string('asset_tag')->unique()->nullable(); // Etiqueta del activo
            $table->unsignedBigInteger('category_id'); // Categoría del activo
            $table->unsignedBigInteger('location_id'); // Ubicación del activo
            $table->unsignedBigInteger('user_id')->nullable(); // Usuario asignado
            $table->unsignedBigInteger('supplier_id')->nullable(); // Proveedor
            $table->decimal('purchase_price', 10, 2)->nullable(); // Precio de compra
            $table->date('purchase_date')->nullable(); // Fecha de compra
            $table->enum('status', ['Disponible', 'Asignado', 'En mantenimiento', 'Dado de baja'])->default('Disponible'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
