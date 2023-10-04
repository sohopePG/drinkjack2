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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->text('bio')->nullable();
            $table->string('status')->default('いつでも飲みOKオフ');
            $table->string('location')->nullable();
            $table->string('group')->nullable();
            $table->string('image')->nullable()->default('kkrn_icon_user_5.png');
            $table->boolean('send_email_on_participant')->default(false);
            $table->boolean('send_email_on_drink_request')->default(false);
            $table->boolean('send_email_on_request_result')->default(false);
            // 他のカラムをここに追加
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
