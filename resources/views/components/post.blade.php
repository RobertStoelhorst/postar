    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
@props(['post' => $post]) {{-- this is where we define the props that we want to pass in to other components --}}

    <div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a><span 
    class="text-gray-400 text-sm"> {{ $post->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{ $post->body }}</p>

        @can('delete', $post) {{-- Laravel provides the @can - @endcan Blade directive to quickly check if the currently authenticated user has a given ability. --}}
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        @endcan

    <div class="flex items-centre">
        @auth {{-- this and close-out tag simply brings this form in once a user is authenticated --}}
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE') {{-- This is called method spoofing as there is no delete method in the form --}}
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif


        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>