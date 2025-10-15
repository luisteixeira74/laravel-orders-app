<!-- resources/views/dashboard/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Total de Pedidos -->
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold">Total de Pedidos</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalOrders ?? 0 }}</p>
        </div>

        <!-- Pedidos por Status -->
        <div class="bg-green-100 p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold">Pedidos por Status</h3>
            <ul class="mt-2 space-y-1">
                @forelse($ordersByStatus ?? [] as $status => $total)
                    <li class="flex justify-between">
                        <span class="capitalize">{{ $status }}</span>
                        <span class="font-bold">{{ $total }}</span>
                    </li>
                @empty
                    <li>Nenhum pedido registrado</li>
                @endforelse
            </ul>
        </div>
    </div>

    @if(!empty($ordersByStatus))
        <div class="mt-6 bg-white p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Gráfico de Status</h3>
            <div class="flex items-end gap-2 h-48">
                @php
                    $max = $ordersByStatus->max();
                @endphp
                @foreach($ordersByStatus as $status => $total)
                    @php
                        $heightPercent = ($max > 0) ? ($total / $max) * 100 : 0;
                        $bgColor = match($status) {
                            'pendente' => '#FACC15',
                            'pago' => '#22C55E',
                            'cancelado' => '#EF4444',
                            default => '#9CA3AF'
                        };
                    @endphp
                    <div class="flex-1 text-white text-center rounded-t"
                         style="background-color: {{ $bgColor }}; height: {{ $heightPercent }}%">
                        <span class="block text-xs py-1">{{ $total }}</span>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-between mt-2 text-sm">
                @foreach($ordersByStatus as $status => $total)
                    <span class="capitalize">{{ $status }}</span>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
