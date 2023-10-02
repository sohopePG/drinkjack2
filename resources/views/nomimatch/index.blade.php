<x-layout>
    <x-app-layout >


        <x-slot name="header" >
            <div class="relative">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Drink Jack') }}
            </h2>

            </div>
        </x-slot>
        @if (session('feedback.success'))
        <x-element.mes-box>{{ session('feedback.success') }}</x-element.mes-box>
        @endif
        <div class="flex flex-col-reverse">
        <x-layouts.oklist :alwaysOkUsers="$alwaysOkUsers" ></x-layouts.oklist>
        <x-layouts.list :recruitments="$recruitments" ></x-layouts.list>
        <div class="md:flex md:items-end w-full h-4/5 max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">
            <x-layouts.announce-list :adminAnnouncements="$adminAnnouncements" class="w-4/5"></x-layouts.announce-list>
            <x-layouts.ok-profile class="w-1/5"></x-layouts.ok-profile>
        </div>
        <div>
        </div>



    </x-app-layout>
</x-layout>
