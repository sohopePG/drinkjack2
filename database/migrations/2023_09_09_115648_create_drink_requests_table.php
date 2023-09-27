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
        Schema::create('drink_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requester_id'); // 依頼者のユーザーID
            $table->unsignedBigInteger('receiver_id'); // 受けた人のユーザーID
            $table->String('status');
            $table->text('comment')->nullable(); // コメント
            $table->timestamps();

            // 外部キー制約の追加
            $table->foreign('requester_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drink_requests');
    }
};
