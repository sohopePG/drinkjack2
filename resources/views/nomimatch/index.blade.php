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
        <div class="fixed inset-x-0 bottom-0 bg-white md:hidden border-t py-2">
            <div class="flex justify-between">
              <div class="w-1/3 flex justify-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000" class="mx-auto">
                  <title>Home</title>
                  <path d="M2 12L5 9.3M22 12L19 9.3M19 9.3L12 3L5 9.3M19 9.3V21H5V9.3"/>
                </svg>
                <a href="{{ route('nomimatch.index') }}" class="flex-1 py-1 px-2 text-center text-gray-700 text-sm font-bold">ホーム</a>
              </div>
              <div class="w-1/3 flex justify-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000" class="mx-auto">
                  <title>Send</title>
                  <polygon points="21.368 12.001 3 21.609 3 14 11 12 3 9.794 3 2.394"/>
                </svg>
                <a href="{{ route('nomimatch.request_send') }}" class="flex-1 py-1 px-2 text-center text-gray-700 text-sm font-bold">送った依頼</a>
              </div>
              <div class="w-1/3 flex justify-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000" class="mx-auto">
                  <title>Envelope</title>
                  <rect width="20" height="14" x="2" y="5"/>
                  <path stroke-linecap="round" d="M2 5l10 9 10-9"/>
                </svg>
                <a href="{{ route('nomimatch.request_receive') }}" class="flex-1 py-1 px-2 text-center text-gray-700 text-sm font-bold">受け取った依頼</a>
              </div>
            </div>
          </div>


    </x-app-layout>
</x-layout>
