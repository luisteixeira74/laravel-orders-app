<?php


namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Eager load para evitar N+1 queries
        $orders = Order::with('user')->orderByDesc('id')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        return view('orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'produto' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'valor' => 'required|numeric|min:0',
            'status' => 'required|string|in:pendente,pago,cancelado',
        ]);

        Order::create($data);

        return redirect()->route('orders.index')->with('success', 'Pedido criado com sucesso.');
    }

    public function edit(Order $order)
    {
        $users = User::all();
        return view('orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'produto' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'valor' => 'required|numeric|min:0',
            'status' => 'required|string|in:pendente,pago,cancelado',
        ]);

        $order->update($data);

        return redirect()->route('orders.index')->with('success', 'Pedido atualizado.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido removido.');
    }
}
