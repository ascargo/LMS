<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            if (Schema::hasColumn('books', 'cover_path') && !Schema::hasColumn('books', 'cover')) {
                $table->renameColumn('cover_path', 'cover');
            }
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            if (Schema::hasColumn('books', 'cover')) {
                $table->renameColumn('cover', 'cover_path');
            }
        });
    }
};
