@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-start justify-center bg-gray-100 pt-16">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Registrar</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-medium mb-1 text-gray-700">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
            </div>

            <div>
                <label for="email" class="block font-medium mb-1 text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
            </div>

            <div>
                <label for="password" class="block font-medium mb-1 text-gray-700">Senha</label>
                <input type="password" name="password" id="password"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
            </div>

            <div>
                <label for="password_confirmation" class="block font-medium mb-1 text-gray-700">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline text-sm">
                    Já tem conta? Entrar
                </a>
                <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Registrar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
