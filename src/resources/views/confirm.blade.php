@extends('layouts.app')
<style>
.return_link-back {
    font-size: 14px;
    decoration: none;
    border: none;
    background-color: #fff;
    border-bottom: 1px solid #000;
}
</style>

@section('css')
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm-form">
        <h2 class="confirm-form__heading">内容確認</h2>
        <div class="confirm-form__content">
            <form class="form" action="/contacts" method="POST" >
            @csrf
                <table class="confirm-table">

                    <tr>
                        <th class="confirm-item">お名前</th>
                        <td class="confirm-body">
                            <div class="confirm-fullname">
                            <input type="text" name="fullname" class="confirm-fullname-text" value="{{ $contact['last-name'] }}{{ $contact['first-name'] }}" readonly />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="confirm-item">性別</th>
                        <td class="confirm-body">
                            <input type="hidden" name="gender" class="confirm-sex-text" value="{{ $contact['gender'] }}" readonly />
                            @if($contact['gender'] === 1)<p>男性</p>
                            @else<p>女性</p>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="confirm-item">メールアドレス</th>
                        <td class="confirm-body">
                            <input type="email" name="email" class="confirm-form-text" value="{{ $contact['email'] }}" readonly />
                        </td>
                    </tr>

                    <tr>
                        <th class="confirm-item">郵便番号</th>
                        <td class="confirm-body">
                            <input type="text" name="postcode" class="confirm-form-post" value="{{ $contact['postcode'] }}" readonly />
                        </td>
                    </tr>

                    <tr>
                        <th class="confirm-item">住所</th>
                        <td class="confirm-body">
                            <input type="text" name="address" class="confirm-form-text" value="{{ $contact['address'] }}" readonly />
                        </td>
                    </tr>

                    <tr>
                        <th class="confirm-item">建物名</th>
                        <td class="confirm-body">
                            <input type="text" name="building_name" class="confirm-form-text" value="{{ $contact['building_name'] }}" readonly />
                        </td>
                    </tr>

                    <tr>
                        <th class="confirm-item">ご意見
                        </th>
                        <td class="confirm-body">
                            <input type="text" name="opinion" class="confirm-opinion-text" value="{{ $contact['opinion'] }}" readonly/>
                        </td>
                    </tr>
                </table>
                <div class="confirm__button">
                    <button class="confirm__button-submit" type="submit" value="submit">送信</button>
                </div>
            </form>
            <div class="return__link">
                <input type="button" class="return_link-back" value="修正する" onClick="history.back()" >
            </div>
        </div>
    </div>
@endsection
