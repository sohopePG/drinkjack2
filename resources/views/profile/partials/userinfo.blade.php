<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('プロフィール') }}
        </h2>
    </header>

    <div>
        <img src="{{ Storage::disk('s3')->url($profile->image) }}" width="200" height="250">
    </div>

    <div class="p-5 rounded-md">
        @if($profile->user_id === auth()->id())
            <x-element.button-a-none :href="route('nomimatch.userinfo',$profile)">プロフィール編集</x-element.button-a-none>
        @endif

        <div class="my-5">
            <div class="my-6 border-b border-solid border-gray-500">
                <div class="my-2 border-l-4 border-solid border-yellow-600">
                    <x-input-label for="name" :value="__('名前')" class="text-lg ml-2"/>
                </div>
            </div>
            <p class="bg-gray-100 p-6 rounded-md">{{ $profile->user->name ?? '未設定' }}</p>
        </div>


        <div class="my-5">
            <div class="my-6 border-b border-solid border-gray-500">
                <div class="my-2 border-l-4 border-solid border-yellow-600">
                    <x-input-label for="location" :value="__('よく飲む場所')" class="text-lg ml-2"/>
                </div>
            </div>
            <p class="bg-gray-100 p-6 rounded-md">{{ $profile->location ?? '未設定' }}</p>
        </div>

        <div class="my-5">
            <div class="my-6 border-b border-solid border-gray-500">
                <div class="my-2 border-l-4 border-solid border-yellow-600">
                    <x-input-label for="group" :value="__('所属')" class="text-lg ml-2"/>
                </div>
            </div>
            <p class="bg-gray-100 p-6 rounded-md">{{ $profile->group ?? '未設定' }}</p>
        </div>
        <div class="my-5">
            <div class="my-6 border-b border-solid border-gray-500">
                <div class="my-2 border-l-4 border-solid border-yellow-600">
                    <x-input-label for="name" :value="__('自己紹介')" class="text-lg ml-2"/>
                </div>
            </div>
            <p class="bg-gray-100 p-6 rounded-md">{{ $profile->bio ?? '未設定' }}</p>
        </div>
    </div>
</section>
