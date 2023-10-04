
    <div class="w-4/5 md:w-auto mx-auto md:h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden bg-white p-4 md:p-6 md:mx-5 my-3"> <!-- グレーの背景を追加 -->

        <div class="flex justify-center items-center my-5 flex-col">
        @if ($drinkoff)
        <span class="text-sm text-gray-600">飲みの誘いOKな人はクリック!</span>
            <x-element.button-a :href="route('nomimatch.edit_status', $loginUser->profile)"
                theme="secondary" :str="'飲み依頼OKをオンにしますか？(飲み依頼OKに設定すると飲みの依頼を受けることができます。)'">飲み依頼OKにする</x-element.button-a>
        @else
        <div class="p-5 border-red-200 border-1 bg-red-100 text-red-700 mb-10">
            飲み依頼OKに設定中！
        </div>
            <x-element.button-a :href="route('nomimatch.edit_status', $loginUser->profile)"
                theme="cancel" :str="'飲みの依頼OKをオフにします'">飲み依頼OKオフにする</x-element.button-a>
        @endif
        </div>
    </div>
