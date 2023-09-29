<div x-data="{ showModal: false }">
    <!-- ここに未読のお知らせアイコンを追加 -->
    <div class="relative" x-cloak>
        <!-- 未読のカウントを表示する要素 -->
        <div class="absolute top-0.5 left-5 -mt-2 -mr-2 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center"
            id="unread-mark">
            <span id="unread-count"></span>
        </div>

        <svg role="img" x-on:click="showModal = true" xmlns="http://www.w3.org/2000/svg" width="34px" height="34px"
            viewBox="0 0 24 24" aria-labelledby="bellIconTitle" stroke="#000000" stroke-width="2"
            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000">
            <title id="bellIconTitle">Bell</title>
            <path stroke-linejoin="round"
                d="M10.5,4.5 C12.1666667,4.5 13.8333333,4.5 15.5,4.5 C17.5,4.5 18.8333333,3.83333333 19.5,2.5 L19.5,18.5 C18.8333333,17.1666667 17.5,16.5 15.5,16.5 C13.8333333,16.5 12.1666667,16.5 10.5,16.5 L10.5,16.5 C7.1862915,16.5 4.5,13.8137085 4.5,10.5 L4.5,10.5 C4.5,7.1862915 7.1862915,4.5 10.5,4.5 Z"
                transform="rotate(90 12 10.5)" />
            <path d="M11,21 C12.1045695,21 13,20.1045695 13,19 C13,17.8954305 12.1045695,17 11,17"
                transform="rotate(90 12 19)" />
        </svg>
    </div>

    <!-- モーダル -->

    <div x-show="showModal" x-on:click.away="showModal = false"
        class="fixed flex items-center justify-center z-50 inset-0.5  ">
        <div class="absolute inset-0 bg-black opacity-80"></div>

        <!-- モーダルコンテンツ -->
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- お知らせ一覧内容 -->
            <div class="modal-content py-4 text-left px-6" id="announcementModal">
                <!-- お知らせ一覧の内容を表示 -->
                <ul id="announcementList">
                    @props(['announcements'])
                    @if (count($announcements) > 0)
                        @foreach ($announcements as $announcement)
                            <a href="{{ route('announcement.show_announcement', $announcement) }}"
                                data-announcement-id="{{ $announcement->id }}"
                                data-is-drink-request="{{ $announcement->request_id ? 'true' : 'false' }}"
                                class="notification-link {{ $announcement->read ? 'opacity-50' : 'font-bold' }} flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                                <!-- 通知の内容を表示 -->
                                <div class="w-full">
                                    <div class="flex justify-between flex-col">
                                        <small class="text-xs text-muted">{{ $announcement->created_at }}</small>
                                        <small class="font-semibold">{{ $announcement->title }}</small>
                                    </div>
                                    <p class="text-sm mt-2">{{ $announcement->description }}</p>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p class="text-center text-gray-500 mt-4">通知がありません</p>
                    @endif
                </ul>


                <!-- フッター -->
                <div class="modal-footer mt-4">
                    <a href="{{ route('announcement.markAllAsRead') }}"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">すべてを既読にする</a>
                    <button x-on:click="showModal = false"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-800">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 未読のカウントを取得
            fetch('{{ route('announcement.unreadCount') }}')
                .then(response => response.json())
                .then(data => {
                    const unreadCount = data.unread_count;

                    // 未読のカウントをアイコンに表示
                    const unreadCountElement = document.getElementById('unread-count');
                    const unreadmarkElement = document.getElementById('unread-mark');
                    if (unreadCount > 0) {
                        unreadCountElement.textContent = unreadCount.toString();
                        unreadmarkElement.style.display = 'block';
                    } else {
                        unreadmarkElement.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Error fetching unread count:', error);
                });
        });
    </script>
    <script>
        document.querySelectorAll('.notification-link').forEach(function(link) {
            link.addEventListener('click', function(event) {

                // クリックされた通知のIDとデータ属性を取得
                const announcementId = link.getAttribute('data-announcement-id');
                const isDrinkRequest = link.getAttribute('data-is-drink-request') === 'true';

                // 飲みの依頼の通知である場合
                if (isDrinkRequest) {
                    // 送信者と受信者のIDを比較して遷移先ルートを決定
                    fetch(`/check-drink-request/${announcementId}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.isSender) {
                                // 送信者の場合、nomimatch.request_send にリダイレクト
                                window.location.href = '{{ route('nomimatch.request_send') }}';
                            } else if (data.isReceiver) {
                                // 受信者の場合、nomimatch.request_receive にリダイレクト
                                window.location.href = '{{ route('nomimatch.request_receive') }}';
                            } else {
                                // エラー処理または適切な処理を行う
                                console.error('不正な通知です。');
                            }
                        })
                        .catch(error => {
                            console.error('エラーが発生しました:', error);
                        });
                } else {
                    // 非飲みの依頼の通知の場合、通常のリダイレクトを行う
                    window.location.href = link.getAttribute('href');
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.notification-link').forEach(function(link) {
            link.addEventListener('click', function(event) {

                // クリックされた通知のIDを取得
                const announcementId = link.getAttribute('data-announcement-id');

                // サーバーに通知の既読フラグを更新するリクエストを送信
                fetch(`/update-read-status/${announcementId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({}),
                    })
                    .then(response => {
                        if (response.ok) {
                            // 通知の既読フラグが正常に更新された場合の処理
                            // ここで通知を既読スタイルに変更するなどの操作を行うことができます
                        } else {
                            console.error('エラーが発生しました:', response.statusText);
                        }
                    })
                    .catch(error => {
                        console.error('エラーが発生しました:', error);
                    });
            });
        });
    </script>
</div>
