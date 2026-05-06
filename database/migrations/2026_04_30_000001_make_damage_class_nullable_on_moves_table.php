<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE moves MODIFY damage_class VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("UPDATE moves SET damage_class = 'physical' WHERE damage_class IS NULL");
        DB::statement('ALTER TABLE moves MODIFY damage_class VARCHAR(255) NOT NULL');
    }
};