@props(['labelText'])
<div class="p-2 w-full">
    <label for="cover-photo"
        class="block text-sm font-medium leading-6 text-gray-900">{{ $labelText }}</label>
    <div
        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
        <div class="text-center">
            <img src="" id="preview" class="img_preview">
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
<script>
    const previewImage = (obj) => {
        let fileReader = new FileReader();
        fileReader.onload = (() => {
            document.getElementById('preview').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
</script>
