<x-layout>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('募集編集') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class='text-center'>
                        </div>
                        <section class="text-gray-600 body-font relative">
                            <form method='post' action="{{ route('nomimatch.rec_update', $recruitment) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH') <!-- PATCH メソッドを使用 -->
                                <div class="container px-5 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                        <div class="flex flex-wrap -m-2">
                                            <!-- ステータス -->
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="status"
                                                        class="leading-7 text-sm text-gray-600">現在の状況</label>
                                                    <select id="status" name="status"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        <option value="募集中"
                                                            {{ old('status', $recruitment->status) === '募集中' ? 'selected' : '' }}>
                                                            募集中</option>
                                                        <option value="開催中"
                                                            {{ old('status', $recruitment->status) === '開催中' ? 'selected' : '' }}>
                                                            開催中</option>
                                                        <option value="募集締め切り"
                                                            {{ old('status', $recruitment->status) === '募集締め切り' ? 'selected' : '' }}>
                                                            募集締め切り</option>
                                                        <option value="開催終了"
                                                            {{ old('status', $recruitment->status) === '開催終了' ? 'selected' : '' }}>
                                                            開催終了</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- タイトル -->
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="title"
                                                        class="leading-7 text-sm text-gray-600">タイトル</label>
                                                    <input type="text" id="title" name="title"
                                                        value="{{ old('title', $recruitment->title) }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <!-- 場所 -->
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="location"
                                                        class="leading-7 text-sm text-gray-600">場所</label>
                                                    <input type="text" id="location" name="location"
                                                        value="{{ old('location', $recruitment->location) }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <!-- 開催予定日 -->
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="date_time"
                                                        class="leading-7 text-sm text-gray-600">開催予定日</label>
                                                    <input type="date" id="date_time" name="date_time"
                                                        value="{{ old('date_time', $recruitment->date_time) }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <!-- 募集締め切り日 -->
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="deadline"
                                                        class="leading-7 text-sm text-gray-600">募集締め切り日(任意)</label>
                                                    <input type="date" id="deadline" name="deadline"
                                                        value="{{ old('deadline', $recruitment->deadline) }}"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <!-- 募集人数 -->
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="max_participants"
                                                        class="leading-7 text-sm text-gray-600">募集人数</label>
                                                    <select id="max_participants" name="max_participants"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        <option value="2"
                                                            {{ old('max_participants', $recruitment->max_participants) == 2 ? 'selected' : '' }}>
                                                            2人</option>
                                                        <option value="3"
                                                            {{ old('max_participants', $recruitment->max_participants) == 3 ? 'selected' : '' }}>
                                                            3人</option>
                                                        <option value="4"
                                                            {{ old('max_participants', $recruitment->max_participants) == 4 ? 'selected' : '' }}>
                                                            4人</option>
                                                        <option value="5"
                                                            {{ old('max_participants', $recruitment->max_participants) == 5 ? 'selected' : '' }}>
                                                            5人以上</option>
                                                        <option value="0"
                                                            {{ old('max_participants', $recruitment->max_participants) == 0 ? 'selected' : '' }}>
                                                            指定なし</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- サムネイル -->
                                            <div class="p-2 w-full">
                                                <label for="image"
                                                    class="block text-sm font-medium leading-6 text-gray-900">サムネイル(任意)</label>
                                                <div
                                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                                    <div class="text-center">
                                                        <img src="{{ $recruitment->image_url }}" id="preview"
                                                            class="img_preview">
                                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                            <label for="file-upload"
                                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                                <span>画像をアップロード</span>
                                                                <input id="file-upload" name="image" type="file"
                                                                    class="sr-only" onchange="previewImage(this)">
                                                            </label>
                                                        </div>
                                                        <p class="text-xs leading-5 text-gray-600">JPG, JPEG, PNG up to
                                                            10MB</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 概要 -->
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="description"
                                                        class="leading-7 text-sm text-gray-600">概要</label>
                                                    <textarea id="description" name="description"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('description', $recruitment->description) }}</textarea>
                                                </div>
                                            </div>
                                            <!-- 更新ボタン -->
                                            <div class="p-2 w-full">
                                                <button
                                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
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
