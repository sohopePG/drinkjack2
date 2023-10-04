<section>
    <form method="POST" action="{{ route('nomimatch.update_email_settings', $profile) }}">
        @csrf

        <!-- 参加者が現れた時にメールを送るかどうかのフラグ -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-3 p-2" for="send_email_on_participant">
                <input class="mr-2 leading-tight" type="checkbox" name="send_email_on_participant" id="send_email_on_participant" {{ $profile->send_email_on_participant ? 'checked' : '' }}>
                <span class="text-sm">
                    募集中の飲み会に参加者が現れた時にメールで通知する
                </span>
            </label>
        </div>

        <!-- 飲みの依頼が来た時にメールを送るかどうかのフラグ -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-3 p-2" for="send_email_on_drink_request">
                <input class="mr-2 leading-tight" type="checkbox" name="send_email_on_drink_request" id="send_email_on_drink_request" {{ $profile->send_email_on_drink_request ? 'checked' : '' }}>
                <span class="text-sm">
                    飲みの依頼が来た時にメールで通知する
                </span>
            </label>
        </div>

        <!-- 送った依頼の結果が返ってきたときにメールを送るかどうかのフラグ -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-3 p-2" for="send_email_on_request_result">
                <input class="mr-2 leading-tight" type="checkbox" name="send_email_on_request_result" id="send_email_on_request_result" {{ $profile->send_email_on_request_result ? 'checked' : '' }}>
                <span class="text-sm">
                    送った飲みの依頼の結果が返ってきたときにメールで通知する
                </span>
            </label>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                保存
            </button>
        </div>
    </form>
</section>
