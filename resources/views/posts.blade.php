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
    {{-- <h3 class="">Welcome to my blog!</h3> --}}

    @foreach($posts as $post)

    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post ['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="#">{{ $post ['author'] }}</a> | {{ $post ['date'] }}
        </div>
        <p class="my-4 font-light">
            {{ $post ['body'] }}
        </p>
        <a href="" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
    </article>

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

    @endforeach

</x-layout>
