<?php

use Illuminate\Database\Seeder;
use \App\Links;
class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Links::Create(
            [
                'url' => "https://laravel.com/docs/5.7/providers",
                'shortened_url' => "first-short-url"
            ]
        );
    }
}
