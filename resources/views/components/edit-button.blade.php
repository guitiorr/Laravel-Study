<div>
    @if (auth()->check() && auth()->user()->id === $post->user->id)
        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Edit Post
        </a>
    @endif
</div>
