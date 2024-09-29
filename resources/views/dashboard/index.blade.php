<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>

    <x-layout>
        <x-slot:title>Welcome to your dashboard, {{ auth()->user()->name }}</x-slot:title>
        <a class="text-white bg-blue-500 p-1 rounded" href="/dashboard/posts?author={{ auth()->user()->username }}">View Posts</a>
    </x-layout>
</body>
</html>
