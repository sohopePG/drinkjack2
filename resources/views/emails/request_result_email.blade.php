<!DOCTYPE html>
<html>
<head>
    <title>飲みの依頼</title>
</head>
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
<body>
    <div class="container">
    <h1>依頼が{{$drinkRequest->status}}されました</h1>
    <p><img src="{{ Storage::disk('s3')->url($drinkRequest->receiver->profile->image) }}" width="150px" height="150px" ></p>
    <p>{{$drinkRequest->receiver->name}}さんへの飲みの依頼が{{$drinkRequest->status}}されました!</p>
    </div>
    <div class="container">
        <h3>送った依頼</h3>
        <p>{{ $drinkRequest->created_at }}</p>
        <p><strong>メッセージ:</strong> {{ $drinkRequest->comment }}</p>
    </div>
</body>
</html>
