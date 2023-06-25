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
        Schema::create('detail_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index
            ('fk_detail_user_to_users');
            $table->foreignId('type_user_id')->nullable()->index
            ('fk_detail_user_to_type_user');
            $table->string('contact')->nullable();
            $table->longText('address')->nullable();
            $table->longText('photo')->nullable();
            $table->enum('gender', [1,2])->nullable();
            $table->timestamps();
            $table->softDeletes(); //softdeletes wajib ada, sewaktu2 bikin modul yang diperuntukan untuk sebuah aturan table yang data nya tidak boleh di hapus, dan didalam project besar softdeletes wajib ada. dan didalam sofdeletes ini tidak perlu mengubah pengaturan migrations sewaktu2, karena sudah otomatis ada softdiletes.

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_user');
    }
};
