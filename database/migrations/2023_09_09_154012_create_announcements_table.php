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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id'); // 送り主のユーザーID
            $table->unsignedBigInteger('receiver_id'); // 受取人のユーザーID
            $table->unsignedBigInteger('request_id')->nullable();
            $table->string('title');
            $table->boolean('read')->default(false);
            $table->text('description')->nullable();;
            $table->timestamps();

            // 外部キー制約を追加
            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->foreign('request_id')->references('id')->on('drink_requests');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['receiver_id']);
            $table->dropForeign(['request_id']);
        });
    }
};
