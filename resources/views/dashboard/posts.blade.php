<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - My Posts</title>
</head>
<body>

    <x-layout>
        <x-slot:title>Posts by, {{ auth()->user()->name }}</x-slot:title>

        @if (session()->has('success'))

        <div class="text-red-500">
            {{ session('success') }}
        </div>
        @endif

        <a class="text-white bg-blue-500 p-1 rounded" href="/dashboard/posts/create">Add Post</a>

        <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-0">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($posts as $post)
                <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <a href="/posts?category={{ $post->category->slug }}" class="">
                            <span
                                class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                {{ $post->category->name }}
                            </span>
                        </a>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <a href="/posts/{{ $post->slug }}" class="hover:underline">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $post->title }}
                        </h2>
                    </a>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                        {{ Str::limit($post->body, 150) }}
                    </p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                alt="Jese Leos avatar" />
                            <a href="/posts?author={{ $post->user->username }}" class="hover:underline">
                                <span class="font-medium text-sm dark:text-white">
                                    {{ $post->user->name }}
                                </span>
                            </a>
                        </div>
                        <div class="flex items-center space-x-4">
                            <form action="/posts/{{ $post->slug }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center font-medium text-red-600 dark:text-red-500 hover:underline text-sm">
                                    Delete
                                </button>
                            </form>
                            <a href="/posts/{{ $post->slug }}"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline text-sm">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

                @endforeach
            </div>
        </div>
    </x-layout>
</body>
</html>
