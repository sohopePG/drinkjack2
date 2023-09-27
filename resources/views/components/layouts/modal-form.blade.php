<div x-data="{ isOpen: false }">
    <!-- トリガーボタン -->
    <button @click="isOpen = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        飲みの依頼を送る
    </button>

    <!-- モーダル -->
    <div x-show="isOpen" class="fixed inset-0 overflow-y-auto z-50">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="relative bg-white rounded-lg shadow-xl p-4 max-w-md w-full">
                <section class="text-gray-600 body-font relative">
                    <form method="post" :action="formAction">

                        @csrf

                        <div class="p-2">
                            <label for="description" class="leading-7 text-sm text-gray-600">メッセージ</label>
                            <div class="relative">
                                <textarea id="description" name="comment"
                                    class="w-4/5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full flex">
                            <button @click="isOpen = false" type="button"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mx-3">
                                キャンセル
                            </button>
                            <button type="submit"
                                class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
