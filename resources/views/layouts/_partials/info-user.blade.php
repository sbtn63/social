<div class="rounded-t-lg h-44 overflow-hidden">
    <div>
    <a href="{{ route('cover.edit') }}" class="">
        <img class="object-cover object-top w-full overflow-hidden" src='@if ($user->cover_url)
        {{ asset('cover/'.$user->cover_url) }}
        @else
        https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ
        @endif' alt='Mountain'>
    </a>
    </div>
</div>
       
<div class="text-center mt-2">
        <h2 class="font-semibold">{{ '@'.$user->username }}</h2>
</div>
<ul class="py-4 mt-2 text-gray-700 flex items-center justify-around">
    <li class="flex flex-col items-center justify-around">
        <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
        </svg>
        <div>{{ $my_likes }}</div>
    </li>
    <li class="flex flex-col items-center justify-between">
        <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z" />
        </svg>
        <div>{{ $followers->count() }}</div>
    </li>
    <li class="flex flex-col items-center justify-around">
        <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
        </svg>
        <div>{{ $posts->count() }}</div>
    </li>
</ul>