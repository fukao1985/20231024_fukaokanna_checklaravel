<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\Models\Opinion;
use Illuminate\Http\Request;



class OpinionController extends Controller
{
    //管理システム画面に全データを表示する処理
    public function index() {

        $opinions = Opinion::Paginate(10);

        return view('opinion', compact('opinions'));
    }

    //管理システム画面にて検索する場合の処理
    public function search(Request $request)
    {
        $opinions = Opinion::with('contact')->CategorySearch($request->contacts_id)->KeywordSearch($request->keyword)->get();
        // $contacts = Contact::all();

        return view('opinions', compact('opinions', 'contacts'));
}
        // $search = $request->only(['fullname', 'gender', 'created_at', 'email']);
        // $query = Opinion::query();

        // return view('opinions', compact('opinions'));


    //管理システム画面にて削除する場合の処理
    public function destroy(Request $request) {

    Opinion::find($request->id)->delete();

    return redirect('/opinions')->with('message', 'データを削除しました');
    }
}

