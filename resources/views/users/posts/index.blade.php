@extends('layouts.app')

@section('content')
<div class="flex justify-center">
   <div class="w-8/12 bg-white p-6 rounded-lg">
        @if($posts->count())
            @foreach ($posts as $post) {{-- post models --}}
                <x-post :post="$post" /> {{-- pass down :post="$post" like a prop into the component which is here ( /Users/robertstoelhorst/projects/PHP/posty-web-app/resources/views/components/post.blade.php )--}}
            @endforeach
            
            {{ $posts->links() }} {{-- this is how we set-up and all we have to do for the pagination links controller below the posts, also set the paginate() and amount in the PostController --}}
        @else
            <p>{{ $user->name }} does not have any posts</p>
        @endif
   </div>
</div>

@endsection