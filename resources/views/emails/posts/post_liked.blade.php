@component('mail::message')
{{-- # Introduction --}}
# Your post was liked

{{-- The body of your message. --}}

{{ $liker->name }} liked one of your posts

@component('mail::button', ['url' => route('posts.show', $post)])
    View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
