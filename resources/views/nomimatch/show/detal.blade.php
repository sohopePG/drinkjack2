<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Drink Jack') }}
        </h2>
    </x-slot>

    @if (session('feedback.success'))
        <x-element.mes-box>{{ session('feedback.success') }}</x-element.mes-box>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mx-auto lg:flex">
                        <div class="md:w-1/2 relative">
                            <div class="my-5">
                                <div class="my-6 border-b border-solid border-gray-500">
                                    <div class="my-2 border-l-4 border-solid border-yellow-600">
                                        <p class="ml-3 text-xl break-words">{{ $recruitment->title }}</p>
                                    </div>
                                </div>
                            </div>

                            <img src="{{ image_url($recruitment->image) }}">
                            <span
                                class="bg-green-400 px-4 py-3 mb-10 rounded-2xl  lg:hidden absolute -top-10 right-0">{{ $recruitment->status }}</span>
                        </div>
                        <div class="p-6 relative lg:w-1/3 lg:mx-auto flex flex-col justify-center">

                            <x-nomimatch.options :recruitment="$recruitment" :userId="$recruitment->user_id"
                                class="absolute top-1"></x-nomimatch.options>

                            <div class="my-auto">
                                <span
                                    class="bg-green-400 px-2 py-3 mb-10 rounded-2xl hidden lg:block lg:w-1/3 text-center ">{{ $recruitment->status }}</span>
                                <div class="text-xl flex my-3 lg:my-6 lg:text-3xl font-semibold">
                                    <svg class="mr-2" role="img" xmlns="http://www.w3.org/2000/svg" width="38px"
                                        height="38px" viewBox="0 0 24 24" aria-labelledby="peopleIconTitle"
                                        stroke="#000000" stroke-width="1" stroke-linecap="square"
                                        stroke-linejoin="miter" fill="none" color="#000000">
                                        <path
                                            d="M1 18C1 15.75 4 15.75 5.5 14.25 6.25 13.5 4 13.5 4 9.75 4 7.25025 4.99975 6 7 6 9.00025 6 10 7.25025 10 9.75 10 13.5 7.75 13.5 8.5 14.25 10 15.75 13 15.75 13 18M12.7918114 15.7266684C13.2840551 15.548266 13.6874862 15.3832994 14.0021045 15.2317685 14.552776 14.9665463 15.0840574 14.6659426 15.5 14.25 16.25 13.5 14 13.5 14 9.75 14 7.25025 14.99975 6 17 6 19.00025 6 20 7.25025 20 9.75 20 13.5 17.75 13.5 18.5 14.25 20 15.75 23 15.75 23 18" />
                                        <path stroke-linecap="round"
                                            d="M12,16 C12.3662741,15.8763472 12.6302112,15.7852366 12.7918114,15.7266684" />
                                    </svg>
                                    @if ($recruitment->max_participants == 0)
                                        募集人数: 何人でも
                                    @else
                                        募集人数: {{ $recruitment->max_participants }}人
                                    @endif
                                </div>
                                <div class="flex my-3 lg:my-6 lg:text-xl">
                                    <svg class="mr-2" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" aria-labelledby="trainIconTitle"
                                        stroke="#000000" stroke-width="1" stroke-linecap="square"
                                        stroke-linejoin="miter" color="#000000">

                                        <path
                                            d="M6 11V6M6 11V16C6 16.5523 6.44772 17 7 17H8M6 11H12M6 6C6.66667 5.33333 8 4 12 4C16 4 17.3333 5.33333 18 6M6 6H12M18 6V11M18 6H12M18 11V16C18 16.5523 17.5523 17 17 17H16M18 11H12M8 17H16M8 17L7 20H17L16 17M12 11V6" />
                                        <circle cx="9" cy="14" r="1" />
                                        <circle cx="15" cy="14" r="1" />
                                    </svg>
                                    場所:{{ $recruitment->location }}
                                </div>

                                <div class="flex my-3 lg:my-6 lg:text-xl">
                                    <svg role="img" xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24px"
                                        height="24px" viewBox="0 0 24 24" aria-labelledby="calendarIconTitle"
                                        stroke="#000000" stroke-width="1" stroke-linecap="square"
                                        stroke-linejoin="miter" fill="none" color="#000000">
                                        <title id="calendarIconTitle">Calendar</title>
                                        <path d="M3 5H21V21H3V5Z" />
                                        <path d="M21 9H3" />
                                        <path d="M7 5V3" />
                                        <path d="M17 5V3" />
                                    </svg>開催予定日:<span
                                        class="text-xl text-red-600 font-bold ml-1">{{ $recruitment->date_time }}</span>
                                </div>
                                <div class="flex my-3 lg:my-6 lg:text-xl">
                                    @if ($recruitment->deadline)
                                        <svg class="mr-2" width="24px" height="24px" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                            aria-labelledby="calendarDeclineIconTitle" stroke="#000000" stroke-width="1"
                                            stroke-linecap="square" stroke-linejoin="miter" fill="none"
                                            color="#000000">
                                            <title id="calendarDeclineIconTitle">Decline calendar invite</title>
                                            <path d="M3 5H21V21H3V5Z" />
                                            <path d="M21 9H3" />
                                            <path d="M7 5V3" />
                                            <path d="M17 5V3" />
                                            <path d="M15 18L8.99999 12" />
                                            <path d="M15 12L9 18" />
                                        </svg>
                                        募集締め切り日:
                                        <span
                                            class="text-xl text-red-600 font-bold ml-1">{{ $recruitment->deadline }}</span>
                                    @endif
                                </div>
                            </div>
                            @if (!isset($existingParticipant))
                                <a href="{{ route('nomimatch.participate', $recruitment) }}"
                                    class="px-5 py-5 shadow-lg cursor-pointer text-center text-white rounded-md bg-yellow-500 hover:bg-yellow-600 hover:shadow-xl mt-4">この飲み会に参加する</a>
                            @elseif(isset($existingParticipant))
                                <a href="#"
                                    class="px-5 py-5 shadow-lg cursor-pointer text-center text-white rounded-md bg-gray-300">参加済み</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 lg:flex">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-5 py-5 lg:w-1/2">
                    <a href="{{ route('nomimatch.user_detail', $recruitment->user->profile) }}"
                        class="text-lg font-medium hover:underline">
                        <img src="{{ image_url($recruitment->user->profile->image) }}"class="h-32 w-32">
                        作成者:{{ $recruitment->user->name }}
                    </a>
                    <div class="rounded-r-lg text-lg px-5 py-5 bg-gray-200 border-l-4 border-solid border-gray-600 max-w-full break-words">
                        {!! nl2br(e( $recruitment->description)) !!}
                    </div>
                </div>

            </div>
        </div>

        <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8 lg:w-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <p class="text-xl p-5 w-full mx-auto border-soild border-gray-200 border-b-2 text-center bg-gray-50">
                    参加者一覧</p>
                <div class="w-full flex  flex-wrap text-center">
                    @if ($recruitment->participants->isEmpty())
                        <p class="text-xl text-gray-500 p-24 mx-auto">参加者がいません</p>
                    @else
                        @foreach ($recruitment->participants as $participant)
                            <div class="flex-col px-3 py-5 flex justify-between">
                                <a href="{{ route('nomimatch.user_detail', $participant->profile) }}"
                                    class="text-lg font-medium hover:underline">
                                    <img src="{{ image_url($participant->user->profile->image) }}"class="w-16 h-16 md:w-36 md:h-36 mx-auto"
                                        class="my-auto">
                                    {{ $participant->user->name }}
                                </a><br>
                                @if ($participant->user_id === auth()->id())
                                    <x-element.button-a :href="route('nomimatch.cancel', $participant)" theme="cancel" :str="'参加キャンセルしますか?'">キャンセル</x-element.button-a>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold mb-4">コメント一覧</h2>
                        @include('profile.partials.comment-form')
                    </div>
                    <div class="divide-y divide-gray-200">
                        @if ($recruitment->comments->isEmpty())
                            <div class="p-4 text-gray-500">コメントはありません</div>
                        @else
                            @foreach ($recruitment->comments as $comment)
                                <div class="p-4">
                                    <div class="flex justify-between relative">
                                        <div class="flex items-center">
                                            <img src="{{ image_url($comment->user->profile->image) }}"
                                                class="w-16 h-16 md:w-20 md:h-20" alt="User Image">
                                        </div>
                                        <div class="w-11/12 my-auto ml-6">
                                            <div class="text-sm text-gray-500">{{ $comment->created_at }}</div>
                                            <div class="text-lg font-semibold">{{ $comment->user->name }}</div>
                                            <p class="text-gray-700 bg-gray-200 p-5 rounded-md md:w-1/2">
                                                {!! nl2br(e( $comment->content)) !!}</p>
                                        </div>
                                        <x-nomimatch.options-comment :comment="$comment"
                                            :userId="$comment->user_id"></x-nomimatch-options-comment>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>



</x-app-layout>
<script>
    document.querySelectorAll('.edit-comment-button').forEach(button => {
        button.addEventListener('click', () => {
            const commentId = button.getAttribute('data-comment-id');
            const commentContent = button.previousElementSibling.textContent;

            // テキストエリアに表示
            const textarea = document.createElement('textarea');
            textarea.value = commentContent;
            button.parentElement.replaceChild(textarea, button);
        });
    });
</script>
