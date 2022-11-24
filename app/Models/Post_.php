<?php

namespace App\Models;

class Post {
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Wahyu Purnomo Ady",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, placeat? Placeat ex quae aspernatur! Vitae minima dolorem culpa cumque qui! Aut eaque a quidem pariatur odit ea est assumenda quam, veritatis impedit nesciunt, minima vero aperiam, ut quis eveniet recusandae blanditiis deleniti? Corporis dolore possimus deleniti, aspernatur nisi ratione ullam fugit ducimus aperiam quasi veritatis harum soluta delectus, quibusdam et cupiditate laborum asperiores nam quia quidem neque. Eos rerum fugit eveniet optio porro, quidem, mollitia explicabo commodi quis, aliquam quaerat."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Kiko Kurniawan",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente fuga itaque nesciunt id assumenda iste error quo! Aliquid quidem sit iste modi tempora dicta ipsam, voluptates necessitatibus atque esse, non numquam voluptatum suscipit. Quia, sit sequi libero aliquam enim maxime repellendus adipisci in vel, neque error quasi ad, doloremque quaerat est corrupti ullam. Accusamus fugit, suscipit repudiandae at a, corrupti ipsa mollitia perferendis adipisci minus alias recusandae quos aperiam veniam culpa. Ad, ipsum. Autem, sunt id libero voluptates, hic ipsam unde iste perspiciatis doloribus ad laboriosam omnis tenetur illum facilis reiciendis! Fugiat hic quibusdam libero natus? Corrupti quaerat quia iusto nisi! Consequatur fugiat quis est dolore ipsum eum voluptas, aspernatur quod ullam sapiente voluptatum quas beatae, eligendi a necessitatibus veniam?"
        ]
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
