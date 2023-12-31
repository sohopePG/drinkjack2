
    <div class="container h-4/5 md:h-full md:max-w-2xl md:w-full max-h-sm md:max-h-lg p-3 border-2 border-double bg-gray-50 my-3">
        <h2 class="text-sm md:text-lg font-semibold border p-1 md:p-3 bg-gray-200">お知らせ</h2>
        <ul class="overflow-y-auto h-36">
            @props(['adminAnnouncements'])

            @if (count($adminAnnouncements) === 0)
                <li class="bg-white my-1 p-1">
                    <p class="text-gray-500">お知らせはありません</p>
                </li>
            @else
                @foreach ($adminAnnouncements as $adminAnnouncement)
                    <li class="bg-white my-1 md:p-1 truncate text-sm md:text-md">
                        <a href="{{route('announcement.show_admin_announcement',$adminAnnouncement)}}">
                        <small class="text-gray-500">{{ $adminAnnouncement->created_at }}</small>
                        <p class="mb-1">{{ $adminAnnouncement->title }}</p>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
        @if (auth()->user() && auth()->user()->permission_flag)
        <!-- 管理者ユーザー向けのお知らせ追加ボタン -->
        <a href="{{ route('announcement.create') }}" class="mt-3 inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">お知らせを追加</a>
    @endif
    </div>
