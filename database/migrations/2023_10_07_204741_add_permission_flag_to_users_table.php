<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermissionFlagToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // 権限フラグを表すカラムを追加
            $table->boolean('permission_flag')->default(false);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // マイグレーションをロールバックする際にカラムを削除
            $table->dropColumn('permission_flag');
        });
    }
}

