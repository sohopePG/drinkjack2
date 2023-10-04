<!DOCTYPE html>
<html>
<head>
    <title>飲みの依頼</title>
    <style>
        /* 共通のスタイル */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 10px;
        }
        .container {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 600px;
        }
        h1 {
            color: #333333;
        }
        strong {
            font-weight: bold;
        }
        p {
            margin-bottom: 10px;
        }

        /* スマートフォン用のスタイル */
        @media only screen and (max-width: 600px) {
            .container {
                margin: 10px;
                border: none;
                border-radius: 0;
                padding: 10px;
            }
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>飲みの依頼が届きました</h1>
        <p><img src="{{ Storage::disk('s3')->url($drinkRequest->requester->profile->image) }}" width="150px" height="150px" ></p>
        <p><strong>{{ $drinkRequest->requester->name }} さん</strong>から飲みの依頼が届きました!</p>
        <p><strong>メッセージ:</strong> {{ $drinkRequest->comment }}</p>
    </div>
</body>
</html>
