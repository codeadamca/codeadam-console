<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Evaluation;
use App\Models\Page;
use App\Models\Social;
use App\Models\Tool;
use App\Models\Topic;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Schema::disableForeignKeyConstraints();

        Article::truncate();
        Evaluation::truncate();
        Page::truncate();
        Social::truncate();
        Tool::truncate();
        Topic::truncate();
        Type::truncate();
        User::truncate();

        Schema::enableForeignKeyConstraints();

        

    }
}
