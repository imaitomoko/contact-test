<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-test</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2>内容確認</h2>
        </div>
        <form class="form" action="/contacts" method="post">
            @csrf
            <div class="confirm-table">
                <table class="confirm-table__inner">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前（姓）</th>
                        <td class="confirm-table__text">
                            <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly/>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前（名）</th>
                        <td class="confirm-table__text">
                            <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly/>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            <input type="text" name="gender" value=" {{ $contact['gender'] }}" readonly/>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class="confirm-table__text">
                            <input type="email" name="email" value="{{ $contact['email'] }}" readonly/>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">郵便番号</th>
                        <td class="confirm-table__text">
                            <input type="text" name="zip11" value="{{ $contact['zip11'] }}" readonly/>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td class="confirm-table__text">
                            <input type="text" name="addr11" value="{{ $contact['addr11'] }}" readonly/>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td class="confirm-table__text">
                            <input type="text" name="building" value="{{ $contact['building'] }}" readonly/>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">ご意見</th>
                        <td class="confirm-table__text">
                            <input type="text" name="opinion" value="{{ $contact['opinion'] }}" readonly/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit" name="submit" value="complete">送信</button>
                <button class="form__button-back" type="submit" name="back" value="back">修正する</button>
            </div>
        </form>
    </div>
</body>
</html>