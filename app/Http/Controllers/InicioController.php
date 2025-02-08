<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        $orders = Order::with('user')
        ->where('estado', 'Pendiente')->orderBy('id', 'desc')->paginate(5);
        return view('welcome', compact('orders'));
    }
}
