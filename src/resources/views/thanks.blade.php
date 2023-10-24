@extends('layouts.app')

@section('css')
<title>Contact Form</title>
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
<div class="thanks__content">
    <p class="thanks__content-message">ご意見いただきありがとうございました。</p>
    <div class="thanks__content-button">
        <button class="thanks__content-button-top">トップページへ</button>
    </div>
</div>
@endsection