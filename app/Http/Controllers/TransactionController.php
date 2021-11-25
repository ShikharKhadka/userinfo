<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;

class TransactionController extends Controller
{
    function userTransaction(){
        return transaction::select('email','phonenumber','amount','payment','created_at')->get();
    }
}
