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
    <x-slot:title>{{ $post->title }}</x-slot:title>
    {{-- <h3 class="">Welcome to my blog!</h3> --}}

    {{-- <article class="py-8 max-w-screen-md">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post ['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="#">{{ $post->user->name }}</a> | {{ $post -> created_at -> diffForHumans() }}
        </div>
        <p class="my-4 font-light">
            {{$post ['body']}}
        </p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to Posts</a>
    </article> --}}

    <!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
        <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <a href="/posts" class="font-medium text-sm text-blue-600 hover:underline">&laquo; Back to all posts</a>
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->user->name }}</a>
                            <p class="text-base text-gray-500 dark:text-gray-400">
                                <time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ $post->created_at->diffForHumans() }}</time>
                            </p>

                            <!-- Category badge moved below the created_at time -->
                            <a href="/posts?category={{ $post->category->slug }}">
                                <span class="mt-1 bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    {{ $post->category->name }}
                                </span>
                            </a>
                        </div>
                    </div>
                </address>

                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
            </header>
            <p class="lead">{{ $post->body }}</p>
        </article>
    </div>
</main>


</x-layout>
