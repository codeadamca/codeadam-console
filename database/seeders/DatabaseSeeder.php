<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleType;
use App\Models\Evaluation;
use App\Models\Page;
use App\Models\Social;
use App\Models\Tool;
use App\Models\ToolType;
use App\Models\Topic;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;


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

        // Schema::disableForeignKeyConstraints();
        // -Schema::enableForeignKeyConstraints();

        // Delete all existing records
        Article::query()->delete();
        ArticleType::query()->delete();
        Evaluation::query()->delete();
        Page::query()->delete();
        Social::query()->delete();
        Tool::query()->delete();
        ToolType::query()->delete();
        Topic::query()->delete();
        User::query()->delete();

        // Remove any files from previous seeding
        Storage::deleteDirectory('articles');
        Storage::deleteDirectory('socials');
        Storage::deleteDirectory('tools');
        Storage::deleteDirectory('topics');
        
        // Seeing this database will import previous codeadam.ca content from the codeadam1 database

        // **************************************************
        // Tools
        $result = DB::connection('mysql2')->table("tools")->get();

        foreach($result as $record)
        {

            $type = ToolType::where('title', $record->category)->get();

            if($type->count() == 0)
            {
                $toolType = new ToolType();
                $toolType->title = $record->category;
                $typeId = $toolType->save();
            }
            else
            {
                $typeId = $type[0]->id;
            }

            $base64_image = $record->photo;
            @list($type, $file_data) = explode(';', $base64_image);
            @list(, $file_data) = explode(',', $file_data);

            Storage::put('image.tmp', base64_decode($file_data));
                        
            $path = Storage::putFile('tools', new File('storage/app/public/image.tmp'));

            $r = new Tool();
            $r->title = $record->name;
            $r->url = $record->url;
            $r->tool_type_id = $typeId;
            if($path) $r->image = $path;
            $r->save(); 

        }        

    }
}
