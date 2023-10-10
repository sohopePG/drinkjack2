<?php
use App\Models\Announcement;
use App\Models\DrinkRequest;
use App\Models\AnnouncementRead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // ユーザーのシーディング
        $users = [
            [
                'name' => 'ユーザー1',
                'email' => 'user1@example.com',
                'password' => bcrypt('password1'),
                'permission_flag' =>false,
            ],
            [
                'name' => 'ユーザー2',
                'email' => 'user2@example.com',
                'password' => bcrypt('password2'),
                'permission_flag' =>false,
            ],
            [
                'name' => 'ユーザー3',
                'email' => 'user3@example.com',
                'password' => bcrypt('password3'),
                'permission_flag' =>true,
            ],
            // 他のユーザーも追加
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
        $recruitments = [
            [
                'user_id' => 1,
                'title' => '飲み会募集1',
                'description' => '一緒に飲みに行きませんか？',
                'deadline' => '2023-09-30 17:00:00',
                'date_time' => '2023-10-05 18:00:00',
                'location' => '東京',
                'max_participants' => 10,
                'status' => '募集中',
                'update_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'title' => '飲み会募集2',
                'description' => '飲みに参加してくれる人募集中！',
                'deadline' => '2023-09-28 16:00:00',
                'date_time' => '2023-10-10 19:30:00',
                'location' => '大阪',
                'max_participants' => 8,
                'status' => '募集中',
                'update_flag' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他の飲み会募集データも追加
        ];

        foreach ($recruitments as $recruitment) {
            DB::table('recruitments')->insert($recruitment);
        }



        // プロフィールのシーディング
        $profiles = [
            [
                'user_id' => 1,
                'bio' => 'ユーザー1の自己紹介文',
                'status' => 'いつでも飲みOKオフ',
                'location' => '東京',
                'group' => '第2グループ',
                'send_email_on_participant'=>false,
                'send_email_on_drink_request'=>false,
                'send_email_on_request_result'=>false,

            ],
            [
                'user_id' => 2,
                'bio' => 'ユーザー2の自己紹介文',
                'status' => 'いつでも飲みOKオフ',
                'location' => '大阪',
                'group' => '第1グループ',
                'send_email_on_participant'=>false,
                'send_email_on_drink_request'=>false,
                'send_email_on_request_result'=>false,
            ],
            [
                'user_id' => 3,
                'bio' => 'ユーザー3の自己紹介文',
                'status' => 'いつでもOKオフ',
                'location' => '愛知',
                'group' => '第4グループ',
                'send_email_on_participant'=>true,
                'send_email_on_drink_request'=>true,
                'send_email_on_request_result'=>true,
            ],
            // 他のユーザーのプロフィールも追加
        ];

        foreach ($profiles as $profile) {
            DB::table('profiles')->insert($profile);
        }

        $comments = [
            [
                'user_id' => 1,
                'recruitment_id' => 1,
                'content' => '楽しみです！',
                'created_at' => now(), // 現在の日時を設定
                'updated_at' => now(), // 現在の日時を設定
            ],
            [
                'user_id' => 2,
                'recruitment_id' => 1,
                'content' => '参加できなくなりました。',
                'created_at' => now(), // 現在の日時を設定
                'updated_at' => now(), // 現在の日時を設定
            ],
            // 他のコメントデータも追加
        ];
        $adminAnnouncements = [
            [
                'title' => '重要なお知らせ',
                'content' => 'これは管理者からの重要なお知らせです。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'システムアップデート情報',
                'content' => 'システムのアップデート情報をお知らせします。',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'title' => 'システムアップデート情報',
                'content' => 'システムのアップデート情報をお知らせします。',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'title' => 'システムアップデート情報',
                'content' => 'システムのアップデート情報をお知らせします。',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'title' => 'システムアップデート情報',
                'content' => 'システムのアップデート情報をお知らせします。',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 他の管理者お知らせデータも追加
        ];

        foreach ($adminAnnouncements as $announcement) {
            DB::table('announcement_admins')->insert($announcement);
        }

        foreach ($comments as $comment) {
            DB::table('comments')->insert($comment);
        }
        $announcements = [
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'request_id' => null, // リクエストがない場合は null に設定
                'title' => 'ユーザー1からの通知',
                'description' => 'ユーザー1からの通知の内容',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'request_id' => 1, // リクエストがある場合は該当のリクエストの ID を設定
                'title' => 'ユーザー2からの通知',
                'description' => 'ユーザー2からの通知の内容',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他の通知データも追加
        ];

        foreach ($announcements as $announcement) {
            DB::table('announcements')->insert($announcement);
        }

        // リクエストのシーディング
        $drinkRequests = [
            [
                'requester_id' => 1,
                'receiver_id' => 2,
                'comment' => 'ユーザー1からのリクエストコメント',
                'status' => '未承認',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'requester_id' => 2,
                'receiver_id' => 1,
                'comment' => 'ユーザー2からのリクエストコメント',
                'status' => '承認済み',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他のリクエストデータも追加
        ];

        foreach ($drinkRequests as $drinkRequest) {
            DB::table('drink_requests')->insert($drinkRequest);
        }



    }

}
