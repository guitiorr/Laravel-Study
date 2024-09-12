{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About page</title>
    <link rel="stylesheet" href="css/stylehomeabout.css">
</head>
<body>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/blog">Blog</a>
    <a href="/contact" class="">Contact</a>
    <h1 style="color: white">About page</h1>
    <h3 class="" style="color: white">Owner: @php
        echo $nama
    @endphp </h3>
    <img src="img/jem.png" alt="Gambar jem" class="">
</body>
</html> --}}

<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="">This is the about page</h3>
</x-layout>
