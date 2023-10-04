<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->boolean('send_email_on_participant')->default(false); // 既存のデータにはデフォルト値としてfalseが設定されます
            $table->boolean('send_email_on_drink_request')->default(false);
            $table->boolean('send_email_on_request_result')->default(false);
        });
    }

    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('send_email_on_participant');
            $table->dropColumn('send_email_on_drink_request');
            $table->dropColumn('send_email_on_request_result');
        });
    }
}

