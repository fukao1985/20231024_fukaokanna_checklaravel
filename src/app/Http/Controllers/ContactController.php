<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    //'/'にアクセスして入力フォーム用ページが表示される
    public function index() {
        return view('index');
    }

    //フォーム入力ページの確認ボタンを押した時の処理
    //フォームに入力された値を controller に渡す処理
    public function confirm(ContactRequest $request) {

        $contact = $request->only(['last-name', 'first-name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);

            return view('confirm', compact('contact'));
        }

    //入力内容確認ページの送信ボタンを押した時の処理
    //confirm.blade.php の formタグから送信された値を受け取る
    //Contactモデルを使ってデータを保存する処理
    //保存処理が終わったら、お問合せ完了ページに遷移
    public function store(Request $request) {
        $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);

        Contact::create($contact);

        return view('thanks');

    }
}





