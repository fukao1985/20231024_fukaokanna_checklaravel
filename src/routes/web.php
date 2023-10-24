<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OpinionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//'/'にアクセスして入力フォーム用ページが表示される
Route::get('/', [ContactController::class, 'index']);

//フォーム入力ページの送信ボタンがクリックされた時にconfirmアクションが実行される
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);

//confirm画面の表示

//入力内容確認ページの送信ボタンを押した時の処理
Route::post('/contacts', [ContactController::class, 'store']);


//管理データ画面を表示する
Route::get('/opinions', [OpinionController::class, 'index']);

//管理画面で検索する
Route::get('/opinions/search', [OpinionController::class, 'search']);

//管理画面で削除する
Route::delete('/opinions/delete', [OpinionController::class, 'destroy']);