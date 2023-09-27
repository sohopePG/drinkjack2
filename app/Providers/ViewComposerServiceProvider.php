<?php

namespace App\Providers;
use App\Models\Profile;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Announcement;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
{
    View::composer('*', function ($view) {
        $userId = auth()->id();
        $loginUser = auth()->user();

        // $loginUserがnullでないことを確認
        if ($loginUser) {

            $announcements = Announcement::where('receiver_id', $userId)
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->paginate(10);

            // $loginUserのプロフィールが存在することを確認
            if ($loginUser->profile) {
                $drinkoff = $loginUser->profile->status === 'いつでも飲みOKオフ';
            } else {
                // プロフィールが存在しない場合の処理
                $drinkoff = false; // 仮にプロフィールが存在しない場合はfalseとして扱う
            }

            $view->with('loginUser', $loginUser);

            $view->with('drinkoff', $drinkoff);
            $view->with('announcements', $announcements);
        } else {
            // ユーザーがログインしていない場合の処理
            $view->with('loginUser', null);
            $view->with('drinkoff', false);
            $view->with('announcements', []);
        }
    });
}
}
