<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders=Order::where('user_id',Auth::id())->get();
        return view('frontEnd.orders',compact('featured_products'));
    }
}
