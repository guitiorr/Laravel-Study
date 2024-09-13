<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post{
    public static function all(){
        return [
            [
                'id' => '1',
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Cristiano Budi',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quidem perspiciatis facilis porro, dolorem nemo neque, fugiat sequi dolores nulla delectus, ipsa asperiores culpa! Eveniet labore non perferendis rerum esse?',
                'date' => '1 January 2024'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Cristiano Budi',
                'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio sapiente eligendi harum. Expedita quia, voluptates totam odit distinctio voluptas beatae, nam maiores optio est at, eum impedit dolor velit unde?',
               'date' => '1 February 2024'
            ]
            ];
    }

    public static function find($slug): array{
        // return Arr::first(Post::all(), function($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });
        $post = Arr::first(Post::all(), fn($post) => $post['slug'] == $slug);
        if($post == null){
            abort(404);
        }
        return $post;
    }

}
