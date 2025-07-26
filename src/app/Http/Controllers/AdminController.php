<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

// Contactsテーブル（データベースから取得・Eloquentのallメソッド）
    public function getContacts()
    {
        $contacts = Contact::all();

        dd($contacts);

        $contacts = Contact::paginate(7);
        return view('admin.dashboard', ['contacts' => $contacts]);

    }

}