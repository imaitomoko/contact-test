<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-test</title>
    <link rel=stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
</head>

<body>
    <div class="form__content">
        <div class="content__heading">
            <h2>お問い合わせ</h2>
        </div>
        <form class="form" action="/contacts/confirm" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group--title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group--name">
                    <div class="form__last-name">
                        <div class="form__input--text_name">
                            <input type="text" name="last_name" value="{{ old('last_name') }}" />
                        </div>
                        <div class="form__error">
                            @error('last_name')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="form__group--sample">
                            <p>例）山田</p>
                        </div>
                    </div>
                    <div class="form__first-name">
                        <div class="form__input--text_name">
                            <input type="text" name="first_name" value="{{ old('first_name') }}"/>
                        </div>
                        <div class="form__error">
                            @error('first_name')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="form__group--sample">
                            <p>例）太郎</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group--content">
                    <div class="form__gender">
                        <div class="form__gender--radio">
                            <input class="form__gender--radio is-invalid" type="radio" name="gender" id="男性" value="男性" {{ old('gender','男性') == '男性' ? 'checked' : ''}} style="width:50px" >
                            <label class="form__gender-label" for="男性">男性</label>
                        </div>
                        <div class="form__gender--radio">
                            <input class="form__gender--radio is-invalid" type="radio" name="gender" id="女性" value="女性"{{ old('gender') == '女性' ? 'checked' : ''}} style="width:50px" >
                            <label class="form__gender-label" for="女性">女性</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group--content">
                    <div class="form__input--text">
                        <input type="email" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                    </div>
                    <div class="form__group--sample">
                        <p>例）test@example.com</p>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="form__label--item">郵便番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group--content">
                    <div class="form__zip">
                        <div class="form__zip--sign">
                            <p>〒</p>
                        </div>
                        <div class="form__input--text-zip">
                            <span class="p-country-name" style="display:none;">Japan</span>
                            <input type="text" name="zip11" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');" value="{{ old('zip11') }}"/>
                        </div>
                    </div>
                    <div class="form__error">
                            @error('zip11')
                            {{ $message }}
                            @enderror
                    </div>
                    <div class="form__group--sample">
                        <p>例）123-4567</p>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group--content">
                    <div class="form__input--text">
                        <input type="text" name="addr11" value="{{ old('addr11') }}"/>
                    </div>
                    <div class="form__error">
                            @error('addr11')
                            {{ $message }}
                            @enderror
                    </div>
                    <div class="form__group--sample">
                        <p>例）東京都渋谷区千駄ヶ谷1-2-3</p>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group--content">
                    <div class="form__input--text">
                        <input type="text" name="building" value="{{ old('building') }}"/>
                    </div>
                    <div class="form__group--sample">
                        <p>例）千駄ヶマンション101</p>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="form__label--item">ご意見</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group--content">
                    <div class="form__input--textarea">
                        <textarea name="opinion">{{ old('opinion') }}</textarea>
                    </div>
                    <div class="form__error">
                            @error('opinion')
                            {{ $message }}
                            @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button--submit" type="submit">確認</button>
            </div>
        </form>
    </div>
</body>
</html>