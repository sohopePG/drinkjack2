
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('プロフィール') }}
        </h2>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{route('nomimatch.user_update',$profile)}}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
        <p class="mt-1 text-sm text-gray-600">
            {{ __($profile->user->name) }}
        </p>
            <img src="{{ Storage::disk('s3')->url($profile->image) }}" width="200" height="250">
        </div>

        <div>
            <x-image-form name="image" labelText="プロフィール画像"></x-imege-form>
        </div>
        <div>
            <x-input-label for="name" :value="__('自己紹介')" />
            <x-textarea name="bio" rows="4" value="{{$profile->bio}}" />

        </div>

        <div>
            <x-input-label for="email" :value="__('よく飲む場所')" />
            <x-text-input name="location" type="text" class="mt-1 block w-full" :value="old('よく飲む場所', $profile->location)"/>
        </div>
        <div>
            <x-input-label for="email" :value="__('所属')" />
            <x-text-input name="group" type="text" class="mt-1 block w-full" :value="old('所属', $profile->group)"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('保存') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('保存しました。') }}</p>
            @endif

        </div>
    </form>
</section>
