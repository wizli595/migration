@extends('layout.master')
@section('content')
    <div class="m-2 text-center">
        <h1 class=" text-2xl">create USER</h1>
    </div>
    <form action="{{ route('user.addUser') }}" class=" text-center" method="POST">
        @csrf
        <div class=" mb-4">
            <label for="name">name</label>
            <input type="text" name="name" value="">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class=" mb-4">
            <label for="email">email</label>
            <input type="text" name="email" value="">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class=" mb-4">
            <label for="password">password</label>
            <input type="text" name="password" value="">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button
                class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-100 my-2">
                Create
            </button>
        </div>
    </form>
@endsection
