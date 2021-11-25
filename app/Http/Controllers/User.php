<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\balance;


class User extends Controller
{
    function list()
    {
        return balance::select('email','balance')->get();
    }
}
