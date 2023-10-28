<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
    <div class="admin__content">
        <div class="section__title">
            <h2>管理システム</h2>
        </div>
        <form class="search-form" action="/search" method="get">
            @csrf
            <div class="search-form__group">
                <label class="search-form__heading" for="name">お名前</label>
                <input class="search-form__text" type="text" name="last_name" value="{{ old('last_name') }}">
            </div>
            <div class="search-form__group-gender">
                <label class="search-form__heading" for="gender">性別</label>
                <div class="form-check">
                    <input class="form-check_input" type="radio" name="gender" id="all" value="all" checked>
                    <label class="form-check_label" for="all">全て</label>
                </div>
                <div class="form-check">
                    <input class="form-check_input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check_label" for="male">男性</label>
                </div>
                <div class="form-check">
                    <input class="form-check_input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check_label" for="female">女性</label>
                </div>
            </div>
            <div class="search-form__group-date">
                <label class="search-form__heading" for="created_at">登録日</label>
                    <input class="form-control" type="date" name="start_date" id="start_date">
                    <p class="between">〜</p>
                    <input class="form-control"  type="date" name="end_date" id="end_date">
            </div>
            <div class="search-form__group">
                <label class="search-form__heading">メールアドレス</label>
                <input class="search-form__text" type="email" name="email" id="email">
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
                <button class="search-form__reset-submit" type="submit">リセット</button>
            </div>
        </form>

        <div class="search-table">
            <table class="search-table__inner">
                @foreach ($contacts as $contact)
                <tr class="search-table__row">
                    <th class="search-table__header">
                        <span class="search-table__header-id">ID</span>
                        <span class="search-table__header-name">お名前</span>
                        <span class="search-table__header-sex">性別</span>
                        <span class="search-table__header-email">メールアドレス</span>
                        <span class="search-table__header-opinion">ご意見</span>
                    </th>
                </tr>
                @endforeach
                @foreach ($contacts ad $contact)
                <tr class="search-table__row">
                    <td class="search-table__item">
                        {{$contact->getDetail()}}
                        @if(strlen($contact) > 25)
                            <span class="abbreviate">{{ substr($contact, 0, 25) }}...</span>
                            <span class="full-text" style="display: none;">{{ $data }}</span>
                        @else
                            {{ $contact }}
                        @endif

                        <form class="delete-form" action="/delete" method="post">
                            @method('delete') @csrf
                            <div class="delete-form__button">
                                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                                <button class="delete-form_button-submit" type="submit">削除</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $contacts ->links() } }
        </div>
    </div>
</body>
</html>