<section class="w-full">
    <header>
        <h2 class="text-lg font-medium text-gray-900">{{ __('のみまっち') }}</h2>
    </header>
    <div class="w-full grid grid-cols-1 gap-4 mt-4">
        @if ($sendRequests->isEmpty())
            <p class="text-gray-600 text-lg font-medium mt-4">送った依頼はありません</p>
        @else
            @foreach ($sendRequests as $sendRequest)
                <div class="bg-white border border-gray-200 rounded-lg shadow-md mb-4 flex items-center relative">
                    @if ($sendRequest->status === '承認')
                        <span class="bg-green-400 px-2 py-1 my-5 rounded-2xl absolute top-0 right-6">{{ $sendRequest->status }}</span>
                    @elseif ($sendRequest->status === '否認')
                        <span class="bg-red-400 px-2 py-1 my-5 rounded-2xl absolute top-0 right-6">{{ $sendRequest->status }}</span>
                    @else
                        <span class="bg-gray-400 px-2 py-1 my-5 rounded-2xl absolute top-0 right-6">{{ $sendRequest->status }}</span>
                    @endif
                    <img src="{{ image_url($sendRequest->receiver->profile->image) }}" alt="Receiver's Image" class="object-cover" width="150px" height="150px">
                    <div class="p-6 relative">
                        <p class="text-gray-600 text-sm">{{ $sendRequest->created_at }}</p>
                        <p class="text-lg font-medium text-gray-900">{{ $sendRequest->receiver->name }}</p>
                        <p class="max-w-sm rounded-lg text-lg px-5 py-5 bg-gray-200 break-words ">
                            {!! nl2br(e($sendRequest->comment)) !!}
                        </p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
