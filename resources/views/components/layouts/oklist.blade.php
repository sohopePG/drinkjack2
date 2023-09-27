<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="text-xl p-5 w-full mx-auto border-soild border-gray-200 border-b-2 text-center bg-gray-100">いつでも飲みOKユーザー</h1>
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="container mx-auto">
                    <div class="flex flex-wrap -m-4">

                        @props(['alwaysOkUsers'])
                        @if ($alwaysOkUsers->isEmpty())
                        <!-- いつでもOKのユーザーがいない場合のメッセージ -->
                        <div class="w-full p-4 text-center">
                            <p class="text-gray-600 text-lg">いつでもOKのユーザーはいません</p>
                        </div>
                        @else
                        @foreach ($alwaysOkUsers as $user)
                            <div class="p-4 md:w-1/5 sm:1/2">
                                <div
                                    class="md:h-full md:border-2 md:border-gray-200 md:border-opacity-60 rounded-lg overflow-hidden ">
                                    <img class="lg:h-48 md:h-36 w-full object-cover object-center mx-auto userimg"
                                        src="{{ image_url($user->image) }}" alt="User Image">
                                    <div class="p-6 text-center">
                                        <a href="{{ route('nomimatch.user_detail', $user) }}"
                                            class="text-lg font-medium">
                                            {{ $user->user->name }}
                                        </a>
                                    </div>
                                    @if ($user->user->id !== auth()->id())
                                        <div x-data="{ isOpen: false }">
                                            <!-- トリガーボタン -->
                                            <div class="w-full flex justify-center items-center my-5">
                                            <button @click="isOpen = true"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                飲みの依頼を送る
                                            </button>
                                            </div>

                                            <!-- モーダル -->
                                            <div x-show="isOpen" class="fixed inset-0 overflow-y-auto z-50">
                                                <div class="flex items-center justify-center min-h-screen">
                                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                                    </div>
                                                    <div
                                                        class="relative bg-white rounded-lg shadow-xl p-4 max-w-md w-full">
                                                        <section class="text-gray-600 body-font relative">
                                                            <form method="post"
                                                                action="{{ route('nomimatch.request', $user->user) }}" >

                                                                @csrf

                                                                <div class="p-2">
                                                                    <label for="description"
                                                                        class="leading-7 text-sm text-gray-600">メッセージ</label>
                                                                        <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                                                                    <div class="relative">
                                                                        <textarea id="description" name="comment"
                                                                            class="w-4/5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="p-2 w-full flex">
                                                                    <button @click="isOpen = false" type="button"
                                                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mx-3">
                                                                        キャンセル
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" onclick="return confirm('飲みの依頼を送信します。よろしいですか?');">送信</button>
                                                                </div>
                                                            </form>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .userimg {
            height: 50px;
            width: 50px;
        }
    }
</style>
