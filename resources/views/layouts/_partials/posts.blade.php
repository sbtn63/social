@forelse ($posts as $post)
<div class="text-gray-800 mb-10">
	<div class="container max-w-4xl px-10 py-6 mx-auto mt-4 rounded-lg shadow-sm bg-gray-50">
        @if (!empty($post->image))
                <img src="{{ asset('images/'.$post->image) }}" alt="{{ $post->user->username }}" class="w-full rounded-lg mb-4">
        @endif
		<div class="flex items-center justify-between">
            <a href="{{ route('profile' , $post->user->id) }}">
            <span class="">{{ '@'.$post->user->username }}</span>
            </a>
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