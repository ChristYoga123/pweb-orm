<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.admin.transaction.index")->with([
            "transactions" => Transaction::with("User", "Venue")->get()
        ]);
    }
}
