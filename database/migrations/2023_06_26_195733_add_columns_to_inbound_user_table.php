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
        Schema::table('inbound_user', function (Blueprint $table) {
            $table->after('inbound_id',function (Blueprint $table){
                $table->unsignedDouble('subscription_price_per_month');
                $table->text('description')->nullable();
                $table->text('private_description')->nullable();
                $table->unsignedDouble('payment_amount')->nullable();
                $table->date('payment_date')->nullable();
                $table->date('start_date');
                $table->date('end_date');
            });

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inbound_user', function (Blueprint $table) {
            $table->dropColumn('subscription_price_per_month');
            $table->dropColumn('description');
            $table->dropColumn('private_description');
            $table->dropColumn('payment_amount');
            $table->dropColumn('payment_date');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
};
