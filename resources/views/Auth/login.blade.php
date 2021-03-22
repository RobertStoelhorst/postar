@extends('layouts.app')

@section('content')
<div class="flex justify-center">
   <div class="w-5/12 bg-white p-6 rounded-lg">

    @if (session()->has('status'))
    <div class="bg-red-500 p-1 rounded-md mb-6 text-white text-center">
        {{ session('status') }}
    </div>
    @endif

       <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="email" class="sr-only">Email</label>
            <input type="text" name="email" id="name" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-400 @enderror" value="{{ old('email') }}">
           
            @error('email')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-half p-4 rounded-lg" value="">
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
        </div>
    </form>
   </div>

</div>

@endsection