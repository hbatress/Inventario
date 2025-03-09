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
        Schema::create('assets_tablecls', function (Blueprint $table) {
            $table->id('AssetID');
            $table->string('Code', 50)->unique();
            $table->string('Name', 100);
            $table->unsignedBigInteger('TypeID')->nullable();
            $table->unsignedBigInteger('LocationID')->nullable();
            $table->unsignedBigInteger('DepartmentID')->nullable();
            $table->unsignedBigInteger('StatusID')->nullable();
            $table->unsignedBigInteger('ClassificationID')->nullable();
            $table->unsignedBigInteger('CriticalityID')->nullable();
            $table->unsignedBigInteger('ActionID')->nullable();
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->foreign('TypeID')->references('TypeID')->on('asset_types');
            $table->foreign('LocationID')->references('LocationID')->on('locations');
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments');
            $table->foreign('StatusID')->references('StatusID')->on('statuses');
            $table->foreign('ClassificationID')->references('ClassificationID')->on('classifications');
            $table->foreign('CriticalityID')->references('CriticalityID')->on('criticality_levels');
            $table->foreign('ActionID')->references('ActionID')->on('actions');
            $table->foreign('CreatedBy')->references('UserID')->on('persons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets_tablecls');
    }
};
