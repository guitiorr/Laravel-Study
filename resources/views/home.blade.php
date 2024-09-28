<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @auth
        <h3>Welcome back, {{ auth()->user()->name }}</h3>
    @else
    @endauth
</x-layout>
