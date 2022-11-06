<?php

namespace App\Models;

class pertanyaanPost
{
    private static $pertanyaanPost = [
        [
            "title" => "Pertanyaan 1",
            "slug" => "pertanyaan-1",
            "author" => "Gilang",
            "body" => "apakah masuk ke web?      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat nisi eveniet veritatis voluptates. Aliquam itaque facilis ullam unde nisi in quisquam labore voluptas dolorum vero! Repellendus amet qui nam omnis perferendis, dignissimos dolorum placeat voluptatem voluptate porro, nisi cum voluptas itaque. Quia enim quasi maxime, quibusdam perspiciatis mollitia eligendi non aliquid porro, voluptate numquam, quisquam odio et unde iure quae rem aut quod ipsum quas! Autem recusandae nihil ut delectus, quo fugiat quaerat animi, vero repudiandae accusamus sed rerum sequi?"
        ],
        [
            "title" => "Pertanyaan 2",
            "slug" => "pertanyaan-2",
            "author" => "Septian",
            "body" => "apakah masuk ke web?2      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat nisi eveniet veritatis voluptates. Aliquam itaque facilis ullam unde nisi in quisquam labore voluptas dolorum vero! Repellendus amet qui nam omnis perferendis, dignissimos dolorum placeat voluptatem voluptate porro, nisi cum voluptas itaque. Quia enim quasi maxime, quibusdam perspiciatis mollitia eligendi non aliquid porro, voluptate numquam, quisquam odio et unde iure quae rem aut quod ipsum quas! Autem recusandae nihil ut delectus, quo fugiat quaerat animi, vero repudiandae accusamus sed rerum sequi?"
        ],
    ];

    public static function all()
    {
        return collect(self::$pertanyaanPost);
    }

    public static function find($slug)
    {
        $home = static::all();

        return $home->firstWhere('slug', $slug);
    }
};