@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h2 class="text-2xl font-bold mb-4">Pedidos</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2 text-left">ID</th>
                <th class="border p-2 text-left">Usuário</th>
                <th class="border p-2 text-left">Produto</th>
                <th class="border p-2 text-left">Quantidade</th>
                <th class="border p-2 text-left">Valor</th>
                <th class="border p-2 text-left">Status</th>
                <th class="border p-2 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr class="hover:bg-gray-50">
                <td class="border p-2">{{ $order->id }}</td>
                <td class="border p-2">{{ $order->user->name }}</td>
                <td class="border p-2">{{ $order->produto }}</td>
                <td class="border p-2">{{ $order->quantidade }}</td>
                <td class="border p-2">R$ {{ number_format($order->valor, 2, ',', '.') }}</td>
                <td class="border p-2">
                    <span class="px-2 py-1 rounded text-white text-sm
                        @if($order->status == 'pendente') bg-yellow-500
                        @elseif($order->status == 'pago') bg-green-500
                        @elseif($order->status == 'cancelado') bg-red-500
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td class="border p-2 space-x-2">
                    <a href="{{ route('orders.show', $order) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Ver</a>
                    <a href="{{ route('orders.edit', $order) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja remover este pedido?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center p-4">Nenhum pedido encontrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection
