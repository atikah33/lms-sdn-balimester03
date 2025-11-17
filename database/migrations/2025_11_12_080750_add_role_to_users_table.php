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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'guru', 'siswa'])->default('siswa')->after('email');
            $table->string('nisn')->nullable()->after('role');
            $table->string('nip')->nullable()->after('nisn');
            $table->string('kelas')->nullable()->after('nip');
            $table->string('is_active')->nullable()->after('kelas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'nisn', 'nip', 'kelas', 'is_active']);
        });
    }
};
