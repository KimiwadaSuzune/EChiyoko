<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = User::find(Auth::id())->product_history;

        return view('history.index', compact('products'));
    }

}
