<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// ------------ メモ ------------
// AdminController
// 管理画面（admin/dashboard.blade.php）

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(7); // ページネーションを使用し、7件ごとのデータを表示
        return view('admin.dashboard', compact('contacts'));
    }
}
