<x-layout>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('新規募集作成') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class='text-center'>
                        </div>
                        <section class="text-gray-600 body-font relative">
                            <form method='post' action="{{ route('nomimatch.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="container px-5 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                        <div class="flex flex-wrap -m-2">
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="title"
                                                        class="leading-7 text-sm text-gray-600">タイトル</label>
                                                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                                    <input type="text" id="title" name="title" value=""
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="url"
                                                        class="leading-7 text-sm text-gray-600">開催場所</label>
                                                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                                                    <input type="text" id="url" name="location" value=""
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <!-- 募集開始日 -->
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="start_date"
                                                        class="leading-7 text-sm text-gray-600">開催予定日</label>
                                                        <x-input-error :messages="$errors->get('date_time')" class="mt-2" />
                                                    <input type="date" id="start_date" name="date_time"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>

                                            <!-- 募集締め切り日 -->
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="deadline"
                                                        class="leading-7 text-sm text-gray-600">募集締め切り日(任意)</label>
                                                    <input type="date" id="deadline" name="deadline"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>

                                            <!-- 参加募集人数 -->
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="max_participants"
                                                        class="leading-7 text-sm text-gray-600">募集人数</label>

                                                    <select id="max_participants" name="max_participants"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        <option value="2">2人</option>
                                                        <option value="3">3人</option>
                                                        <option value="4">4人</option>
                                                        <option value="5">5人以上</option>
                                                        <option value="0">指定なし</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <x-image-form name="image" labelText="サムネイル(任意)"></x-imege-form>
                                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="description"
                                                        class="leading-7 text-sm text-gray-600">概要</label>
                                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                                    <textarea id="description" name="description"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <button
                                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規作成</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const previewImage = (obj) => {
                let fileReader = new FileReader();
                fileReader.onload = (() => {
                    document.getElementById('preview').src = fileReader.result;
                });
                fileReader.readAsDataURL(obj.files[0]);
            }
        </script>
    </x-app-layout>
</x-layout>
