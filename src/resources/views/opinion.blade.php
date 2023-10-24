@extends('layouts.app')
<style>
.reset_link {
    font-size: 14px;
    decoration: none;
    border: none;
    background-color: #fff;
    border-bottom: 1px solid #000;
}

li.page-item {
    display: inline-block;
    text-decoration: none;
}

.pagination-form {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
}
</style>

@section('css')
<title>Search Form</title>
<link rel="stylesheet" href="{{ asset('css/manage.css') }}" />
@endsection

@section('content')
<div class="manage-form">
    <h2 class="manage-form__heading">管理システム</h2>
    <form class="search-form" action="/opinions/search" method="get">
    @csrf
        <table class="search-table">
            <tr>
                <th class="search-item">お名前</th>
                <td class="search-body">
                    <input type="text" name="fullname" class="search-name" value=" " />
                </td>
                <div class="search-sex__block">
                    <th class="search-item">性別</th>
                    <td class="search-body">
                        <label class="search-radio-box">
                            <input type="radio" name="radio" class="search-sex" value="all" checked />
                            <span class="search-radio-text">全て</span>
                        </label>
                        <label class="search-radio-box">
                            <input type="radio" name="radio" class="search-sex" value="man" />
                            <span class="search-radio-text">男性</span>
                        </label>
                        <label class="search-radio-box">
                            <input type="radio" name="radio" class="search-sex" value="woman" />
                            <span class="search-radio-text">女性</span>
                        </label>
                    </td>
                </div>
            </tr>

            <tr>
                <th class="search-item">登録日</th>
                <td class="search-body">
                    <input type="date" name="date" class="search-date" value="" />
                </td>
                <td>
                    <p>〜</p>
                </td>
                <td class="search-body">
                    <input type="date" name="date" class="search-date" value="" />
                </td>
            </tr>

            <tr>
                <th class="search-item">メールアドレス</th>
                <td class="search-body">
                    <input type="email" name="email" class="search-email" value="" />
                </td>
            </tr>
        </table>

        <div class="search__button">
            <button class="search__button-submit" type="submit">検索</button>
        </div>
        <input type="reset" name="reset" class="reset_link" value="リセット">
    </form>

    <div class="pagination-form">
        <div class="pagination-form__display">
            @if (count($opinions)>0)
            <p?>全{{ $opinions->total() }}件中{{ ($opinions->currentPage()-1)*$opinions->perPage()+1 }}~{{ (($opinions->currentPage()-1)*$opinions->perPage()+1)+(count($opinions)-1) }}件</p>
            @else
            <p>データがありません</p>
            @endif
        </div>
        <div class="pagination-form__link">
            {{ $opinions->links() }}
        </div>
    </div>

    <div class="search-result">
    @foreach ($opinions as $opinion)
        <table class="result-table">
            <tr class="result-table__row">
                <th class="result-table__header">
                    <span class="result-table__header-span">ID</span>
                    <span class="result-table__header-span">お名前</span>
                    <span class="result-table__header-span">性別</span>
                    <span class="result-table__header-span">メールアドレス</span>
                    <span class="result-table__header-span">ご意見</span>
                </th>
            </tr>
            <tr class="result-table__row">
                <td class="result-table__text">
                    <!--delete処理-->
                    <div class="search-result-form" action="" method="">
                        <div class="search-result-form__item">
                            <input class="search-result-form__item-input" type="id" name="id" value="{{ $opinion['id'] }}">
                        </div>
                        <div class="search-result-form__item">
                            <p class="search-result-form__item-input">{{ $opinion['fullname'] }}</p>
                        </div>
                        <div class="search-result-form__item">
                            <input type="hidden" name="gender" class="confirm-sex-text" value="{{ $opinion['gender'] }}" readonly />
                            @if($opinions['gender'] === 1)<p>男性</p>
                            @else<p>女性</p>
                            @endif
                        </div>
                        <div class="search-result-form__item">
                            <p class="search-result-form__item-input">{{ $opinion['email'] }}</p>
                        </div>
                        <div class="search-result-form__item">
                            <p class="search-result-form__item-input">{{ $opinion['opinion'] }}</p>
                        </div>
                        <div class="search-result-form__item">
                            <form class="search-result-form__delete-button" action="/opinions/delete" method="POST">
                                @method('DELETE')
                                @csrf
                            <input type="hidden" name="id" value="{{ $opinion['id'] }}">
                            <button class="search-result-form__delete-button-submit" type="submit">削除</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    @endforeach
</div>
@endsection