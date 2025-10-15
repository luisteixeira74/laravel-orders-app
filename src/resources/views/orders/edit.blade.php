@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Editar Pedido #{{ $order->id }}</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block mb-2 font-medium">Usuário</label>
        <select name="user_id" class="w-full border p-2 rounded mb-4">
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <label class="block mb-2 font-medium">Produto</label>
        <input type="text" name="produto" value="{{ old('produto', $order->produto) }}" class="w-full border p-2 rounded mb-4">

        <label class="block mb-2 font-medium">Quantidade</label>
        <input type="number" name="quantidade" value="{{ old('quantidade', $order->quantidade) }}" class="w-full border p-2 rounded mb-4">

        <label class="block mb-2 font-medium">Valor</label>
        <input type="number" step="0.01" name="valor" value="{{ old('valor', $order->valor) }}" class="w-full border p-2 rounded mb-4">

        <label class="block mb-2 font-medium">Status</label>
        <select name="status" class="w-full border p-2 rounded mb-4">
            <option value="pendente" {{ old('status', $order->status)=='pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="pago" {{ old('status', $order->status)=='pago' ? 'selected' : '' }}>Pago</option>
            <option value="cancelado" {{ old('status', $order->status)=='cancelado' ? 'selected' : '' }}>Cancelado</option>
        </select>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Atualizar Pedido</button>
        <a href="{{ route('orders.index') }}" class="ml-2 text-gray-700 hover:underline">Cancelar</a>
    </form>
</div>
@endsection
