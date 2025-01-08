@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')
@include('admin.dashboard.sidebar')
<div class="p-4 mt-8 sm:ml-64">
    <div class="p-4 mt-14">
      <div class="grid grid-cols-3 gap-4 mb-4">
         <div class="flex items-center justify-center h-28 bg-gray-50 dark:bg-gray-800 rounded">
             <div class="flex flex-col items-center justify-center">
                 <p class="text-dark mb-0 font-semibold">Pengguna Terdaftar</p>
                 <h3 class="my-1 font-bold text-lg">100</h3> 
                 <div class="bg-light-alt rounded-full p-3">
                     <i class="ti ti-users text-muted text-xl"></i>
                 </div>
             </div>
         </div>
         <div class="flex items-center justify-center h-28 bg-gray-50 dark:bg-gray-800 rounded">
             <div class="flex flex-col items-center justify-center">
                 <p class="text-dark mb-0 font-semibold">Total Transaksi Bulan Ini</p>
                 <h3 class="my-1 font-bold text-lg">50</h3> 
                 <div class="bg-light-alt rounded-full p-3">
                     <i class="ti ti-clock text-muted text-xl"></i>
                 </div>
             </div>
         </div>
         <div class="flex items-center justify-center h-28 bg-gray-50 dark:bg-gray-800 rounded">
             <div class="flex flex-col items-center justify-center">
                 <p class="text-dark mb-0 font-semibold">Total Pendapatan</p>
                 <h3 class="my-1 font-bold text-lg">Rp. 1,000,000</h3> <!-- Example static value for total revenue -->
                 <div class="bg-light-alt rounded-full p-3">
                     <i class="ti ti-clock text-muted text-xl"></i>
                 </div>
             </div>
         </div>
     </div>
     
     
       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">
             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
             </svg>
          </p>
       </div>
       <div class="grid grid-cols-2 gap-4">
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
       </div>
    </div>
 </div>
 @endsection