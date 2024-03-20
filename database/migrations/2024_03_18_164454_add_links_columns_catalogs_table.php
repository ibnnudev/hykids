<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('catalogs', function (Blueprint $table) {
            $table->longText('shopee_link')->nullable()->after('discount_price');
            $table->longText('tokopedia_link')->nullable()->after('shopee_link');
            $table->longText('bukalapak_link')->nullable()->after('tokopedia_link');
            $table->longText('tiktok_link')->nullable()->after('bukalapak_link');
            $table->longText('lazada_link')->nullable()->after('tiktok_link');
            $table->longText('whatsapp_link')->nullable()->after('lazada_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catalogs', function (Blueprint $table) {
            $table->dropColumn('shopee_link');
            $table->dropColumn('tokopedia_link');
            $table->dropColumn('bukalapak_link');
            $table->dropColumn('tiktok_link');
            $table->dropColumn('lazada_link');
            $table->dropColumn('whatsapp_link');
        });
    }
};
