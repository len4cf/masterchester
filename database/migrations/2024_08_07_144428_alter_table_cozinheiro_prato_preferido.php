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
        Schema::table('cozinheiro', function (Blueprint $table){
            $table->foreignId('prato_preferido_id')->nullable()->constrained('food')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cozinheiro', function (Blueprint $table){
            $table->dropForeign('prato_preferido_id');
            $table->dropColumn('prato_preferido_id');
        });
    }
};
