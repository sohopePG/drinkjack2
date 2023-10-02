<section class="w-full">
    <header>
        <h2 class="text-lg font-medium text-gray-900">{{ __('のみまっち') }}</h2>
    </header>
    <div class="w-full mt-4">
        @if ($sendRequests->isEmpty())
            <p class="text-gray-600 text-lg font-medium mt-4">受け取った依頼はありません</p>
        @else
            @foreach ($sendRequests as $sendRequest)

            <div class="md:bg-white border-b md:border border-gray-200 md:rounded-lg md:shadow-md overflow-hidden mb-4 flex items-center relative w-full">
                @if ($sendRequest->status === '承認')
                <span class="bg-green-400 px-2 py-1 my-5 rounded-2xl absolute top-0 right-6">{{ $sendRequest->status }}されました</span>
                    @elseif ($sendRequest->status === '否認')
                        <span class="bg-red-400 px-2 py-1 my-5 rounded-2xl absolute top-0 right-6">{{ $sendRequest->status }}されました</span>
                        @else
                        <span class="bg-gray-400 px-2 py-1 my-5 rounded-2xl absolute top-0 right-6">{{ $sendRequest->status }}</span>
                    @endif
                    <img src="{{ Storage::disk('s3')->url($sendRequest->requester->profile->image) }}" alt="Receiver's Image"
                        class="object-cover w-16 h-16 md:w-36 md:h-36">
                        <div class="p-6 break-words">
                            <p class="text-gray-600 text-sm">{{ $sendRequest->created_at }}</p>
                            <p>{{ $sendRequest->requester->name }}さんに飲みの依頼を送りました!</p>
                        <p class="rounded-lg md:text-lg md:px-5 md:py-5 md:bg-gray-200 ">
                            {!! nl2br(e($sendRequest->comment)) !!}
                        </p>
                </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
