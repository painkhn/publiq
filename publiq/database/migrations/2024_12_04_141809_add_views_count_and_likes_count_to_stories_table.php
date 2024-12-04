<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('stories', function (Blueprint $table) {
            $table->integer('views_count')->default(0);
            $table->integer('likes_count')->default(0);
        });
    }

    public function down()
    {
        Schema::table('stories', function (Blueprint $table) {
            $table->dropColumn('views_count');
            $table->dropColumn('likes_count');
        });
    }
};
