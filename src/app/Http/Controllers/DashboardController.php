<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // Total de pedidos
        $totalOrders = Order::count();

        // Pedidos por status
        $ordersByStatus = Order::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status'); // retorna Collection [status => total]

        return view('dashboard.index', compact('totalOrders', 'ordersByStatus'));
    }
}
