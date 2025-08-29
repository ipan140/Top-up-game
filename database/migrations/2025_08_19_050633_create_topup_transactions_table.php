<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('topup_transactions', function (Blueprint $table) {
            $table->id();

            // Relasi
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('topup_type_id')->constrained()->onDelete('cascade');

            // Info transaksi
            $table->string('order_id')->unique();
            $table->decimal('gross_amount', 15, 2); // jumlah bayar
            $table->integer('quantity')->default(1);
            $table->string('status')->default('pending'); // pending, success, failed

            // Info tambahan
            $table->string('payment_type')->nullable();
            $table->string('snap_token')->nullable(); // token midtrans
            $table->string('email');                  // email user
            $table->string('game_user_id');           // ID player game
            $table->string('server_id');              // server id

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('topup_transactions');
    }
};
