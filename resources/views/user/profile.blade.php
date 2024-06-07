@extends('layouts.layout')

@section('title', 'profile')

@include('layouts._partials.navbar')

@section('content')

<div class="max-w-2xl mx-4 sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto mt-16 bg-white shadow-xl rounded-lg text-gray-900">
    
    @include('layouts._partials.info-user')

    @if ($user->id != Auth::user()->id)
    <form action="{{ route('follow.store') }}" method="POST">
        @csrf
        <input hidden type="number" name="followed_id" value="{{ $user->id }}">
        <div class="p-4 border-t mx-8 mt-2">
            <button type="submit" class="w-1/2 block mx-auto rounded-full bg-gray-900 hover:shadow-lg font-semibold text-white px-6 py-2">
                @if ($following)
                    followed
                @else
                    follower
                @endif</button>
        </div>
    </form>
    @endif
</div>

@include('layouts._partials.posts')

@endsection