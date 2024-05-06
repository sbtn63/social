@extends('layouts.layout')

@section('title', 'Login')

@section('content')


<div class="w-full min-h-screen bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
  <div class="w-full sm:max-w-md p-5 mx-auto">
    <h2 class="mb-12 text-center text-5xl font-extrabold">Login</h2>
    @if (session()->has('error')) <p class="text-red-500 text-center mb-3">{{ session()->get('error')}}</p>  @endif
    <form action="{{ route('auth') }}" method="post">
      @csrf
      <div class="mb-4">
        <label class="block mb-1" for="email">Email-Address</label>
        @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
        <input id="email" type="text" name="email" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
      </div>
      <div class="mb-4">
        <label class="block mb-1" for="password">Password</label>
        @error('password') <p class="text-red-500">{{ $message }}</p> @enderror
        <input id="password" type="password" name="password" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
      </div>
      <div class="mt-6">
        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">Sign In</button>
      </div>
      <div class="mt-6 text-center">
        <a href="{{ route('register') }}" class="underline">Sign up for an account</a>
      </div>
    </form>
  </div>
</div>

@endsection