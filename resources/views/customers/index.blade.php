@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/index.css">
@endpush

@section('content')

    <div class="p-6">

        <h1 class="text-2xl mb-4">Clientes</h1>
        
        <div class="flex justify-between items-center mb-4">

        <div class="flex items-center">
                <input
                    type="text"
                    id="searchInput"
                    onkeyup="searchTable()"
                    placeholder="Pesquisar"
                    class="px-4 py-2 border border-gray-100 rounded-lg mr-2"
                />

                <button
                    onclick="filterTable()"
                    class="filter-button"
                >
                    <img src="{{ asset('icons/filter.svg') }}" alt="Filter Icon">
                    Filtrar
                </button>

            </div>

            <a
                href="{{ route('customers.create') }}"
                class="add-button"
            >
                <img src="{{ asset('icons/plus.svg') }}" alt="Add Icon" >
                Cadastrar Cliente
            </a>

        </div>

        @include('components.table', [
            'header' => ['ID', 'Nome', 'CPF', 'Celular', 'E-mail', 'Endereço'],
            'content' => $customers->map(function($customer) {
                return [
                    $customer->id, 
                    $customer->user->name,
                    $customer->user->cpf, 
                    $customer->phone_number, 
                    $customer->user->email, 
                    $customer->user->address, 
                ];
            }),
            'editRoute' => 'customers.edit',
            'deleteRoute' => 'customers.destroy',
        ])

    </div>

@endsection
