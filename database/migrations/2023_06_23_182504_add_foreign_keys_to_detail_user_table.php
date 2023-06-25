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
        Schema::table('detail_user', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_detail_user_to_users')
            ->reference('id')->on('users')->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            $table->foreign('type_user_id', 
            'fk_detail_user_to_type_user')
            ->reference('id')->on('users')->reference('id')->on
            ('type_users')->onDelete('CASCADE')->onUpdate('CASCADE');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //kalau ada yg error ini berarti di hapus aja
    {
        Schema::table('detail_user', function (Blueprint $table) {
            $table->dropForeign('fk_detail_user_to_users');
            $table->dropForeign('fk_detail_user_to_type_user');
            
        });
    }
};
