<div id="message-box" class="absolute top-0 left-0 right-0 p-4 bg-green-200 border-dashed border-green-500 text-green-700 transform transition-transform duration-500 translate-y-full">
    {{ $slot }}
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const messageBox = document.getElementById("message-box");

        // ページ読み込み後に一定時間後にメッセージボックスを表示
        setTimeout(function() {
            messageBox.style.transform = "translateY(-100px)";
        }, 4000); // 1000ミリ秒（1秒）後に表示

        // メッセージボックスをクリックしたときに非表示にする
        messageBox.addEventListener("click", function() {
            messageBox.style.transform = "translateY(-100%)";
        });
    });
</script>
