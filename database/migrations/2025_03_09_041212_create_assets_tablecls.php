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
            $table->string('Code', 50)->nullable();;
            $table->string('Name', 100)->nullable();;
            $table->string('Description', 100)->nullable();;
            $table->unsignedBigInteger('LocationID')->nullable();;
            $table->string('Owner', 100)->nullable();
            $table->unsignedBigInteger('DepartmentID')->nullable();
            $table->date('AcquisitionDate')->nullable();
            $table->unsignedBigInteger('TypeID')->nullable();
            $table->unsignedBigInteger('StatusID')->nullable();
            $table->unsignedBigInteger('ClassificationID')->nullable();
            $table->unsignedBigInteger('CriticalityID')->nullable();
            $table->unsignedBigInteger('UserID')->nullable();
            $table->foreign('LocationID')->references('LocationID')->on('locations');;
            $table->foreign('TypeID')->references('TypeID')->on('asset_types');
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments');
            $table->foreign('StatusID')->references('StatusID')->on('statuses');
            $table->foreign('ClassificationID')->references('ClassificationID')->on('classifications');
            $table->foreign('CriticalityID')->references('CriticalityID')->on('criticality_levels');
            $table->foreign('UserID')->references('UserID')->on('persons');
            $table->softDeletes();
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
