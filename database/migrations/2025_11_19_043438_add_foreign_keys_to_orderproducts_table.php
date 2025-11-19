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
        Schema::table('orderproducts', function (Blueprint $table) {
            $table->foreign(['order_id'], 'orderproducts_ibfk_1')->references(['id'])->on('orders')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['product_id'], 'orderproducts_ibfk_2')->references(['id'])->on('products')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orderproducts', function (Blueprint $table) {
            $table->dropForeign('orderproducts_ibfk_1');
            $table->dropForeign('orderproducts_ibfk_2');
        });
    }
};
