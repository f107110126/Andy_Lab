@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h1>Contact Us</h1>
                    <form action="{{ url('/contact') }}" method="post" class="bg-white p-6 rounded shadow-md">
                        @csrf
                        <div class="mb-5">
                            <label for="email" class="block text-xs uppercase font-semibold mb-1">Email Address</label>
                            <input type="text" id="email" name="email" class="borer px-2 py-1 text-sm m-full">
                            @error('email')
                                <div class="text-red-500 text-xs">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 py-2 text-white rounded-full text-sm w-full">Email
                            Me</button>
                        @if (session('message'))
                            <p class="text-green-500 text-xs mt-2">
                                {{ session('message') }}
                            </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
