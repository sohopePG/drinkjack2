<section class="w-full">
    <div class="w-full mt-4">
        @if ($receiveRequests->isEmpty())
            <p class="text-gray-600 text-lg font-medium mt-4">受け取った依頼はありません</p>
        @else
            @foreach ($receiveRequests as $receiveRequest)

            <div class="md:bg-white border-b md:border border-gray-200 md:rounded-lg md:shadow-md overflow-hidden mb-4 flex items-center relative w-full">
                @if ($receiveRequest->status === '承認')
                <span class="bg-green-400 px-2 py-1 my-5 rounded-2xl absolute top-0 right-6">{{ $receiveRequest->status }}しました</span>
                    @elseif ($receiveRequest->status === '否認')
                        <span class="bg-red-400 px-2 py-1 my-5 rounded-2xl absolute top-0 right-6">{{ $receiveRequest->status }}しました</span>
                    @endif
                    <img src="{{ Storage::disk('s3')->url($receiveRequest->requester->profile->image) }}" alt="Receiver's Image"
                        class="object-cover w-16 h-16 md:w-36 md:h-36">
                        <div class="p-6 break-words">
                            <p class="text-gray-600 text-sm">{{ $receiveRequest->created_at }}</p>
                            <p>{{ $receiveRequest->requester->name }}さんから飲みの依頼が来ました!</p>
                        <p class="rounded-lg md:text-lg md:px-5 md:py-5 md:bg-gray-200 ">
                            {!! nl2br(e($receiveRequest->comment)) !!}
                        </p>


                    @if ($receiveRequest->status === '未承認')
                        <form action="{{ route('drink-requests.handle', $receiveRequest) }}" method="POST" class="my-3">
                            @csrf
                            <button type="submit" name="approve"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">承認</button>
                            <button type="submit" name="deny"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">否認</button>
                        </form>
                    @endif
                </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
