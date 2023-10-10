
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">お知らせを作成</h2>
        <form method="POST" action="{{ route('announcement.store') }}">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
                <input type="text" name="title" id="title" class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">内容</label>
                <textarea name="content" id="content" class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" rows="5" required></textarea>
            </div>

            <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded">作成</button>
        </form>
    </div>

