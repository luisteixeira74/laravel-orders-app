@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded p-6 max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4">Detalhes do Pedido #{{ $order->id }}</h2>

    <div class="mb-2"><strong>Usuário:</strong> {{ $order->user->name }}</div>
    <div class="mb-2"><strong>Produto:</strong> {{ $order->produto }}</div>
    <div class="mb-2"><strong>Quantidade:</strong> {{ $order->quantidade }}</div>
    <div class="mb-2"><strong>Valor:</strong> R$ {{ number_format($order->valor, 2, ',', '.') }}</div>
    <div class="mb-2"><strong>Status:</strong>
        <span class="px-2 py-1 rounded text-white text-sm
            @if($order->status == 'pendente') bg-yellow-500
            @elseif($order->status == 'pago') bg-green-500
            @elseif($order->status == 'cancelado') bg-red-500
            @endif">
            {{ ucfirst($order->status) }}
        </span>
    </div>

    <a href="{{ route('orders.index') }}" class="mt-4 inline-block bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Voltar</a>
</div>
@endsection
