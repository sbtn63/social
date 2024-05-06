@extends('layouts.layout')

@section('title', 'home')

@include('layouts._partials.navbar')

@section('content')


<form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data" class="w-11/12  m-auto mt-2">
    @csrf
    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50">
        <div class="flex px-4 py-2 bg-white rounded-t-lg">
            <img src="#" style="display:none;" class="h-auto w-28 rounded-lg mr-2" alt="" id="previewImage">
            <textarea class="w-full px-0 text-sm text-gray-900 bg-white border-0 focus:ring-0" name="content" id="content"  required placeholder="Write a comment..." rows="4"></textarea>
        </div>
        
        <div class="flex items-center justify-between px-3 py-2 border-t">
            <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                Post comment
            </button>
            <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
                <label for="id_image" class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                </svg>
                <div style="display:none;">
                    <input id="id_image" name="image" type="file">
                </div>
                </label>
            </div>
        </div>
    </div>
</form>


@forelse ($posts as $post)
<div class="text-gray-800 mb-10">
	<div class="container max-w-4xl px-10 py-6 mx-auto mt-4 rounded-lg shadow-sm bg-gray-50">
        @if (!empty($post->image))
                <img src="{{ asset('images/'.$post->image) }}" alt="{{ $post->username }}" class="w-full rounded-lg mb-4">
        @endif
		<div class="flex items-center justify-between">
            <span class="">{{ '@'.$post->user->username }}</span>
			<span class="text-sm dark:text-gray-600">{{ $post->created_at_for_humans }} ago</span>
		</div>
		<div class="mt-3">
			<p class="mt-2">{{ $post->content }}</p>
		</div>
		<div class="flex items-center justify-between mt-4">
        <form action="{{ route('like.store') }}" method="post">
            @csrf
            <input hidden type="number" name="post_id" value="{{ $post->id }}">
                
            <button type="submit" class="flex">
            @if ($post->liked)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>
            @endif
            {{ $post->likes->count() }}
            </button>
        </form>
		</div>
	</div>
</div>
@empty
        <p>Post Not Exists!</p>
@endforelse

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        //Muestra la vista previa de la imagen al seleccionar un archivo
        $("#id_image").change(function() {
        readURL(this);
        })
    })

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader()

            reader.onload = function (e) {
                $('#previewImage').attr('src', e.target.result).show()
            }

            reader.readAsDataURL(input.files[0])
        }
    }
</script>



@endsection