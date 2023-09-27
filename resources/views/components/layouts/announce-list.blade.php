
    <div class="container md:h-full md:w-full max-w-lg max-h-lg p-3 border-2 border-double bg-gray-50 my-3">
        <h2 class="text-2xl font-semibold border p-3 bg-gray-200">お知らせ</h2>
        <ul class="overflow-y-auto h-36">
            @props(['adminAnnouncements'])

            @if (count($adminAnnouncements) === 0)
                <li class="bg-white my-1 p-1">
                    <p class="text-gray-500">お知らせはありません</p>
                </li>
            @else
                @foreach ($adminAnnouncements as $adminAnnouncement)

                    <li class="bg-white my-1 p-1 truncate">
                        <a href="{{route('announcement.show_admin_announcement',$adminAnnouncement)}}">
                        <small class="text-gray-500">{{ $adminAnnouncement->created_at }}</small>
                        <p class="mb-1">{{ $adminAnnouncement->title }}</p>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
