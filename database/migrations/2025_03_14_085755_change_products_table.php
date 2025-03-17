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
        Schema::table('products', function (Blueprint $table) {
            // thêm cột
            $table->text('description')->after('category_id');
            // đổi kiểu dữ liệu số nguyên dương
            $table->unsignedInteger('price')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //xóa cột
            $table->dropColumn('description');
            // đổi về kiểu số nguyên
            $table->integer('price')->change();
        });
    }
};
