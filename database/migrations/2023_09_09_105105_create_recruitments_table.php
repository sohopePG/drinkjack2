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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->dateTime('deadline')->nullable();
            $table->dateTime('date_time');
            $table->string('location');
            $table->integer('max_participants')->nullable();
            $table->string('status');
            $table->boolean('update_flag')->default(false);
            $table->string('image')->nullable()->default("https://s3-ap-northeast-1.amazonaws.com/drinkjack/OGsS71Sul7kvc6bkI8mC1kBfeIXQ5Ts2CHAxTgyt.jpg");
            // 他のカラムをここに追加
            $table->timestamps();

            // 外部キー制約の追加
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 外部キー制約を削除
        Schema::table('recruitments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('recruitments');
    }
};

