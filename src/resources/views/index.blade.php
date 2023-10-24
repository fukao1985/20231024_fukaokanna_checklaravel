@extends('layouts.app')

@section('css')
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="contact-form">
        <h2 class="contact-form__heading">お問い合わせ</h2>
        <div class="contact-form__content">
            <form class="form" action="/contacts/confirm" method="POST" >
            @csrf
                <table class="contact-table">
                    <tr>
                        <th class="form-item">お名前<span class="form-item-required">※</span>
                        </th>
                        <td class="form-body">
                            <div class="last-name">
                            <input type="text" name="last-name" class="last-name-text" value="{{ old('last-name') }}">
                            <div class="form__error">
                            @error('last-name')
                            <p class="validation">{{ $message }}</p>
                            @enderror
                            </div>
                            <p class="form-body-last-name">例）山田</p>
                            </div>
                            <div class="first-name">
                            <input type="text" name="first-name" class="first-name-text" value="{{ old('first-name') }}">
                            <div class="form__error">
                            @error('first-name')
                            <p class="validation">{{ $message }}</p>
                            @enderror
                            </div>
                            <p class="form-body-first-name">例）太郎</p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="form-item">性別<span class="form-item-required">※</span>
                        </th>
                        <td class="form-body">
                            <label class="radio-box">
                            <input type="radio" name="gender"  class="sex-text" value="1" checked />
                            <span class="radio-text">男性</span>
                            </label>
                            <label class="radio-box">
                            <input type="radio" name="gender" class="sex-text"  value="2" />
                            <span class="radio-text">女性</span>
                            </label>
                            <div class="form__error">
                            @error('gender')
                            <p class="validation">{{ $message }}</p>
                            @enderror
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="form-item">メールアドレス<span class="form-item-required">※</span>
                        </th>
                        <td class="form-body">
                            <input type="email" name="email" class="form-text" value="{{ old('email') }}">
                            <div class="form__error">
                            @error('email')
                            <p class="validation">{{ $message }}</p>
                            @enderror
                            </div>
                            <p class="form-body-email">例）test@example.com</p>
                        </td>
                    </tr>

                    <tr>
                        <th class="form-item">郵便番号<span class="form-item-required">※</span>
                        </th>
                        <td class="form-body">
                            <p class="form-body-mark">〒</p>
                            <input type="text" name="postcode" class="form-post"  value="{{ old('postcode') }}"  >
                            <div class="form__error">
                            @error('postcode')
                            <p class="validation">{{ $message }}</p>
                            @enderror
                            </div>
                            <p class="form-body-post">例）123-4567</p>
                        </td>
                    </tr>

                    <tr>
                        <th class="form-item">住所<span class="form-item-required">※</span>
                        </th>
                        <td class="form-body">
                            <input type="text" name="address" class="form-text" value="{{ old('address') }}">
                            <div class="form__error">
                            @error('address')
                            <p class="validation">{{ $message }}</p>
                            @enderror
                            </div>
                            <p class="form-body-address">例）東京都渋谷区千駄ヶ谷1-2-3</p>
                        </td>
                    </tr>

                    <tr>
                        <th class="form-item">建物名</th>
                        <td class="form-body">
                            <input type="text" name="building_name" class="form-text" value="{{ old('building_name') }}">
                            <div class="form__error">
                            @error('building_name')
                            <p class="validation">{{ $message }}</p>
                            @enderror
                            </div>
                            <p class="form-body-build">例）千駄ヶ谷マンション101</p>
                        </td>
                    </tr>

                    <tr>
                        <th class="form-item">ご意見<span class="form-item-required">※</span>
                        </th>
                        <td class="form-body">
                            <textarea type="textarea" name="opinion" class="opinion-text" value="{{ old('opinion') }}"></textarea>
                            <div class="form__error">
                            @error('opinion')
                            <p class="validation">{{ $message }}</p>
                            @enderror
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認</button>
                </div>
            </form>
        </div>
    </div>
@endsection