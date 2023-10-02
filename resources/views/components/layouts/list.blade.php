<div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="w-full flex justify-center items-center my-5">
            <button
                class="mt-4 ml-4 text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                <a href="{{ route('nomimatch.create') }}" class="text-white-500">飲み会を募集する</a>
            </button>
          </div>
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="container mx-auto">
                    <div class="flex flex-wrap -m-4">
                        @props(['recruitments'])
                        @if ($recruitments->isEmpty())
            <!-- 募集が存在しない場合のメッセージを表示 -->
            <div class="w-full p-4 text-center">
                <p class="text-gray-600 text-lg">募集されている飲み会はありません</p>
            </div>
        @else
                        @foreach ($recruitments as $recruitment)
                            <div class="p-4  md:w-1/3 max-w-xl">
                                <div class="relative text-gray-500 top-0 rigth-0 w-full ">
                                    <div
                                        class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg ">
                                        <img class="lg:h-48 md:h-36 w-full object-cover object-center hidden md:block"
                                            src="{{ Storage::disk('s3')->url($recruitment->image) }}" alt="blog">
                                        <div class="p-6 relative">
                                            <span
                                                class="bg-green-400 px-2 py-2 rounded-2xl">{{ $recruitment->status }}</span>
                                            <x-nomimatch.options :recruitment="$recruitment" :userId="$recruitment->user_id"
                                                class="absolute top-1"></x-nomimatch.options>
                                            <h1 class="w-32 md:w-auto title-font text-xl font-medium text-gray-900 my-5 truncate">
                                                {{ $recruitment->title }}
                                            </h1>
                                            <div>
                                                <div>
                                                    <div class="text-xl flex">
                                                        <svg class="mr-2" role="img"
                                                            xmlns="http://www.w3.org/2000/svg" width="28px"
                                                            height="28px" viewBox="0 0 24 24"
                                                            aria-labelledby="peopleIconTitle" stroke="#000000"
                                                            stroke-width="1" stroke-linecap="square"
                                                            stroke-linejoin="miter" fill="none" color="#000000">
                                                            <title id="peopleIconTitle">People</title>
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
                                                    <div class="md:block md:flex flex hidden ">
                                                        <svg class="mr-2" width="24px" height="24px"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            aria-labelledby="trainIconTitle" stroke="#000000"
                                                            stroke-width="1" stroke-linecap="square"
                                                            stroke-linejoin="miter" color="#000000">
                                                            <title id="trainIconTitle">Train</title>
                                                            <path
                                                                d="M6 11V6M6 11V16C6 16.5523 6.44772 17 7 17H8M6 11H12M6 6C6.66667 5.33333 8 4 12 4C16 4 17.3333 5.33333 18 6M6 6H12M18 6V11M18 6H12M18 11V16C18 16.5523 17.5523 17 17 17H16M18 11H12M8 17H16M8 17L7 20H17L16 17M12 11V6" />
                                                            <circle cx="9" cy="14" r="1" />
                                                            <circle cx="15" cy="14" r="1" />
                                                        </svg>
                                                        場所:{{ $recruitment->location }}
                                                    </div>

                                                    <div class="flex">
                                                        <svg role="img" xmlns="http://www.w3.org/2000/svg"
                                                            class="mr-2" width="24px" height="24px"
                                                            viewBox="0 0 24 24" aria-labelledby="calendarIconTitle"
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
                                                    <div class="md:block md:flex flex hidden">
                                                        @if ($recruitment->deadline)
                                                            <svg class="mr-2" width="24px" height="24px"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                                aria-labelledby="calendarDeclineIconTitle"
                                                                stroke="#000000" stroke-width="1"
                                                                stroke-linecap="square" stroke-linejoin="miter"
                                                                fill="none" color="#000000">
                                                                <title id="calendarDeclineIconTitle">Decline calendar
                                                                    invite</title>
                                                                <path d="M3 5H21V21H3V5Z" />
                                                                <path d="M21 9H3" />
                                                                <path d="M7 5V3" />
                                                                <path d="M17 5V3" />
                                                                <path d="M15 18L8.99999 12" />
                                                                <path d="M15 12L9 18" />
                                                            </svg>
                                                            募集締め切り日:
                                                            <span
                                                                class="text-xl text-red-600 font-bold ml-1" >{{ $recruitment->deadline }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div
                                                class="border-dashed border-2 border-red-400 py-2 px-5 md:py-5 bg-red-50 md:text-xl text-lg font-bold mt-5">
                                                現在の参加者:<span
                                                    class="text-red-500 ml-5">{{ $recruitment->participants->count() }}</span>
                                                <a href="{{ route('nomimatch.detal', $recruitment) }}"
                                                    class="text-right inline-block text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">飲み会詳細
                                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="2" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5l7 7-7 7"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        @if ($recruitment->status === '募集締め切り' || $recruitment->status === '開催終了')
                                            <div
                                                class="absolute inset-0 bg-gray-900 opacity-50 flex items-center justify-center">
                                                <p class="text-white text-2xl font-bold">
                                                    {{ $recruitment->status }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>

                </div>
                <div class='mt-2'>
                    {{ $recruitments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
