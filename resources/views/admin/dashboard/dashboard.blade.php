<!-- filepath: /c:/laragon/www/lads-app/resources/views/admin/dashboard/dashboard.blade.php -->
@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')
@include('admin.dashboard.sidebar')
<div class="p-4 mt-8 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div class="flex col-start-2 items-center justify-center h-28 bg-gray-50 dark:bg-gray-800 rounded">
                <div class="flex flex-col items-center justify-center">
                    <p class="text-dark mb-0 font-semibold">Pengguna Terdaftar</p>
                    <h3 class="my-1 font-bold text-lg">{{ $totalUsers }}</h3> 
                    <div class="bg-light-alt rounded-full p-3">
                        <i class="ti ti-users text-muted text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center h-28 bg-gray-50 dark:bg-gray-800 rounded">
                <div class="flex flex-col items-center justify-center">
                    <p class="text-dark mb-0 font-semibold">Total Transaksi Bulan Ini</p>
                    <h3 class="my-1 font-bold text-lg">{{ $totalTransactions }}</h3> 
                    <div class="bg-light-alt rounded-full p-3">
                        <i class="ti ti-clock text-muted text-xl"></i>
                    </div>
                </div>
            </div>
            <!-- Tambahkan widget lainnya sesuai kebutuhan -->
        </div>
    </div>
</div>
@endsection