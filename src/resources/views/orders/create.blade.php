@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Criar Pedido</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <label class="block mb-2 font-medium">Usuário</label>
        <select name="user_id" class="w-full border p-2 rounded mb-4">
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <label class="block mb-2 font-medium">Produto</label>
        <input type="text" name="produto" value="{{ old('produto') }}" class="w-full border p-2 rounded mb-4">

        <label class="block mb-2 font-medium">Quantidade</label>
        <input type="number" name="quantidade" value="{{ old('quantidade') }}" class="w-full border p-2 rounded mb-4">

        <label class="block mb-2 font-medium">Valor</label>
        <input type="number" step="0.01" name="valor" value="{{ old('valor') }}" class="w-full border p-2 rounded mb-4">

        <label class="block mb-2 font-medium">Status</label>
        <select name="status" class="w-full border p-2 rounded mb-4">
            <option value="pendente" {{ old('status')=='pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="pago" {{ old('status')=='pago' ? 'selected' : '' }}>Pago</option>
            <option value="cancelado" {{ old('status')=='cancelado' ? 'selected' : '' }}>Cancelado</option>
        </select>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Criar Pedido</button>
        <a href="{{ route('orders.index') }}" class="ml-2 text-gray-700 hover:underline">Cancelar</a>
    </form>
</div>
@endsection
