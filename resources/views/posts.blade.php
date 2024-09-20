{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Page</title>
    <link rel="stylesheet" href="css/styleblog.css">
</head>
<body>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/blog">Blog</a>
    <a href="/contact" class="">Contact</a>
    <div id="head">
        <h1 class="">CHON</h1>
        <img src="img/vroh.png" alt="" class="">
    </div>
    <div id="content">
        <p class="">
            Chon (sometimes stylized as CHON) was an American progressive rock band from Oceanside, California. Their music is largely instrumental with only a few songs containing vocal performances. The final line up of the band consisted of Mario Camarena (guitar), Erick Hansel (guitar), Esiah Camarena (bass) and Nathan Camarena (drums).
        </p>
    </div>
</body>
</html> --}}



<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-search></x-search>
    {{-- <h3 class="">Welcome to my blog!</h3> --}}

        <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-0">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">


                @foreach ($posts as $post)
                    {{-- <article class="py-8 max-w-screen-md border-b border-gray-300">
                        <a href="/posts/{{ $post ['slug'] }}" class="hover:underline">
                            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post ['title'] }}</h2>
                        </a>
                        <div class="text-base text-black">
                            By <a class="hover:underline text-gray-500"href="/authors/{{ $post->user->username }}">{{ $post->user->name }}</a> in <a class="hover:underline text-gray-500"href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> | {{ $post->created_at->diffForHumans() }}
                        </div>
                        <p class="my-4 font-light">
                            {{ Str::limit($post ['body'], 150) }}
                        </p>
                        <a href="/posts/{{ $post ['slug'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
                    </article> --}}

                                    {{-- <article class="py-8 max-w-screen-md border-b border-gray-300">
                        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">Judul Artikel 2</h2>
                        <div class="text-base text-gray-500">
                            <a href="#">Cristiano Budi</a> | 2 February 2024
                        </div>
                        <p class="my-4 font-light">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quidem perspiciatis facilis porro, dolorem nemo neque, fugiat sequi dolores nulla delectus, ipsa asperiores culpa! Eveniet labore non perferendis rerum esse?
                        </p>
                        <a href="" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
                    </article> --}}



                        <article
                            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-between items-center mb-5 text-gray-500">
                                <a href="/categories/{{ $post->category->slug }}" class="">
                                    <span
                                        class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        {{ $post->category->name }}
                                    </span>
                                </a>
                                <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <a href="/posts/{{ $post->slug }}" class="hover:underline">
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $post->title }}</h2>
                            </a>
                            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                                {{ Str::limit($post->body, 150) }}
                            </p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-3">
                                    <img class="w-7 h-7 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                        alt="Jese Leos avatar" />
                                    <a href="/authors/{{ $post->user->username }}" class="hover:underline">
                                        <span class="font-medium text-sm dark:text-white">
                                            {{ $post->user->name }}
                                        </span>
                                    </a>
                                </div>
                                <a href="/posts/{{ $post->slug }}"
                                    class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline text-sm">
                                    Read more
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                @endforeach
            </div>
        </div>

</x-layout>
