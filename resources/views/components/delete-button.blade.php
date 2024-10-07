<div>
    @if (auth()->check() && auth()->user()->id === $post->user->id)
    <form action="/posts/{{ $post->slug }}" method="POST" class="mb-4">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('Are you sure?')" type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            Delete Post
        </button>
    </form>
    @endif
</div>
