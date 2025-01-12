@extends('admin.layout.master')
@include('admin.dashboard.sidebar')
@section('title', 'User Management')
@include('admin.user.edit')
@include('admin.user.add')
@include('admin.user.delete')
@section('content')
<div class="p-4 mt-7 sm:ml-64">
    <div class="p-4 mt-14">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <button data-modal-target="addmodal" data-modal-toggle="addmodal" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Add User
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">nama</th>
                                    <th scope="col" class="px-6 py-3">email</th>
                                    <th scope="col" class="px-6 py-3">role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $user->name }}</td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">{{ $user->role }}</td>
                                    <td class="px-6 py-4">
                                        <button data-modal-target="editmodal" data-modal-toggle="editmodal" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" class="text-blue-600 dark:text-blue-500 hover:underline edit-button">Edit</button>
                                        <button data-modal-target="deletemodal" data-modal-toggle="deletemodal" data-id="{{ $user->id }}" class="text-red-600 dark:text-red-500 hover:underline delete-button">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalToggleButtons = document.querySelectorAll('[data-modal-toggle]');
        modalToggleButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const modal = document.getElementById(button.getAttribute('data-modal-target'));
                modal.classList.toggle('hidden');
            });
        });

        const closeModalButtons = document.querySelectorAll('.close-modal');
        closeModalButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const modal = button.closest('.modal');
                modal.classList.toggle('hidden');
            });
        });

        const editButtons = document.querySelectorAll('.edit-button');
        const deleteButtons = document.querySelectorAll('.delete-button');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');

                document.getElementById('editId').value = id;
                document.getElementById('editName').value = name;
                document.getElementById('editEmail').value = email;

                const form = document.getElementById('editForm');
                form.action = '{{ route("user.update", ":id") }}'.replace(':id', id);
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                document.getElementById('deleteId').value = id;

                const form = document.getElementById('deleteForm');
                form.action = '{{ route("user.destroy", ":id") }}'.replace(':id', id);
            });
        });
    });
</script>
@endsection
