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
        Schema::table('dialogues', function (Blueprint $table) {
            //カラム名をdialogueからtalkに変更
            $table->renameColumn('dialogue', 'talk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dialogues', function (Blueprint $table) {
            //
            $table->renameColumn('talk', 'dialogue');
        });
    }
};
