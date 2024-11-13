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
    Schema::create('assurances', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('type');
        $table->text('description');  // Text field for description
        $table->decimal('price', 8, 2);  // Price as decimal with two decimal places
        $table->date('expiration_date');  // Expiration date of the assurance
        $table->timestamps();  // Created at and updated at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assurances');
    }
};
