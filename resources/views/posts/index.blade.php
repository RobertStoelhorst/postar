 @extends('layouts.app')

 @section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                    @error('body') border-red-400 @enderror" 
                    placeholder="Post something!"></textarea>

                    @error('body')
                    <div class="text-red-400 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 pz-2 rounded font-medium">Post</button>
                </div>
            </form>

            @if($posts->count())
                @foreach ($posts as $post) {{-- post models --}}
                    <div class="mb-4">
                        <a href="" class="font-bold">{{ $post->user->name }}</a><span 
                        class="text-gray-400 text-sm"> {{ $post->created_at->diffForHumans() }}</span>

                        <p class="mb-2">{{ $post->body }}</p>
                    </div>
                @endforeach
                {{ $posts->links() }} {{-- this is how we set-up and all we have to do for the pagination links controller below the posts, also set the paginate() and amount in the PostController --}}
            @else
                <p>There are no posts at the moment</p>
            @endif
        </div>
    </div>
 @endsection 