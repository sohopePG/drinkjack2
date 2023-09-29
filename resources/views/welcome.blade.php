<x-layout>

    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font">
                <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                        <img class="object-cover object-center rounded" alt="hero" src="{{  Storage::disk('s3')->url('nomicat.png')}}">

                    </div>
                    <div
                        class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">飲みたい社員を救う
                            <br />Drink Jack
                        </h1>
                        <p class="mb-8 leading-relaxed">
                            飲み会を募集したり、飲みに行きたい人に飲み依頼を送ったりすることができます。ステータスを「いつでも飲みOK!」にしておけば飲みの依頼を受けることができます。
                        </p>
                        <div class="flex w-full">
                            <a href="{{ route('login') }}"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 text-white bg-blue-500 hover:bg-blue-600 focus:ring-blue-500 mx-3.5">
                                ログイン
                            </a>
                            <a href="{{ route('register') }}"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 text-white bg-red-500 hover:bg-red-600 focus:ring-blue-500 mx-3.5">
                                新規登録

                            </a>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout>
