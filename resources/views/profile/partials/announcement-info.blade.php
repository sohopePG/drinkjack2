<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('のみまっち') }}
        </h2>
    </header>

    <div>
        <p class="mt-1 text-sm text-gray-600">
            {{ __($announcement->sender->name) }}
        </p>
        <img src="{{ Storage::disk('s3')->url($announcement->sender->profile->image) }}" width="200" height="250">
    </div>

    <div>
        <x-input-label for="group" :value="__('メッセージ')" />
            <x-input-label for="group" :value="__('参加者が現れました')" />

    </div>
</section>
