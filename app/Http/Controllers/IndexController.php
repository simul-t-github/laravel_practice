<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class IndexController extends Controller
{
    public function member_list()
    {
        // return view('pages.member');
        return Member::with('getGroup')->get();
    }
}
