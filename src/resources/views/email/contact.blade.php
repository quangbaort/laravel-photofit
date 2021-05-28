<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        名前：{{ $name }}
    </div>
    <div>
        ふりがな：{{ $nameKana }}
    </div>
    <div>
        メールアドレス：{{ $email }}
    </div>
    <div>
        お問い合わせの種類：{{ $type }}
    </div>
    <div>
        お問い合わせの内容：<br/>
        {{ $content }}
    </div>
</body>
</html>