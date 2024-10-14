<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Create New Post</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
</head>

<body>

    <x-layout>
        <x-slot:title>Create new post for user {{ auth()->user()->name }}</x-slot:title>

        <form method="POST" action="/dashboard/posts" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Post Title -->
            <div>
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Post Title</label>
                <div class="mt-2">
                    <input type="text" name="title" id="title" value="{{ old('title') }}" @error('title') is-invalid @enderror class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('title')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Post Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                <div class="mt-2">
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" @error('slug') is-invalid @enderror class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('slug')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Post Category -->
            <div>
                <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                <div class="mt-2">
                    <select name="category_id" id="category_id" value="{{ old('category_id') }}" required @error('category') is-invalid @enderror class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Post Image Upload -->
            <div>
                <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Post Image</label>
                <img class="img-preview img-fluid">
                <div class="mt-2">
                    <input onchange="previewImage()" type="file" name="image" id="image" accept="image/*" @error('image') is-invalid @enderror class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('image')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Post Body -->
            <div>
                <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                <div class="mt-2">
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}" required @error('body') is-invalid @enderror>
                    <trix-editor input="body" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></trix-editor>
                    @error('body')
                        <div class="invalid-feedback text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>



            <!-- Submit Button -->
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Post</button>
            </div>
        </form>
    </x-layout>


    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + encodeURIComponent(title.value)) // GET request
                .then(response => response.json())
                .then(data => slug.value = data.slug)
                .catch(error => console.error('Error:', error));
        });

        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();

            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>

</body>

</html>
