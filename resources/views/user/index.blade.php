@extends('layout.master')
<div>
    @section('content')
        <button
            class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-100 my-2">
            <a href="{{ route('user.create') }}">
                Create User
            </a>

        </button>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            updated at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->updated_at }}
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <div class=" rounded-md border border-dashed border-slate-300 p-8">
                            <div class=" text-center font-medium">
                                No User Found
                            </div>

                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endsection


</div>
