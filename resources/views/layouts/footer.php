<!DOCTYPE html><html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/DBscreen.css">
</head>
<body>
<div class="">
    <div class="">
        <div class="">
            <a href="{{ route('ticket.purchase') }}" class="">
                チケット購入
            </a>
            <a href="{{ route('ticket.list') }}" class="">
                チケット一覧
            </a>
        </div>
        <div>
            <a href="{{ route('first.time') }}" class="">
                初めての方へ
            </a>
            <a href="{{ route('qa') }}" class="">
                Q＆A
            </a>
            <a href="{{ route('faq') }}" class="">
                よくある質問
            </a>
        </div>
        <div>
            <a href="{{ route('privacy.policy') }}" class="">
                プライバシーポリシー
            </a>
            <a href="{{ route('terms.and.conditions') }}" class="">
                会員規約
            </a>
            <a href="{{ route('company.info') }}" class="">
                会社案内
            </a>
        </div>
    </div>
</div>

</body>
</html>

