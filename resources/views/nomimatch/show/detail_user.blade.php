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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.userinfo')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
