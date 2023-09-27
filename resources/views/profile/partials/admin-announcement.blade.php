<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Drink Jack') }}
        </h2>
    </header>
        <div class="mt-6 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <!-- お知らせのタイトル -->
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{$announcement_admin->title}}
                    </h3>
                    <!-- お知らせの日付 -->
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        {{$announcement_admin->created_at}}
                    </p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                    <!-- お知らせの本文 -->
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dd class="mt-1 ml-3 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$announcement_admin->content}}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </section>

    <div>

    </div>
</section>
