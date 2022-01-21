<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleType;
use App\Models\Evaluation;
use App\Models\Meme;
use App\Models\Page;
use App\Models\Social;
use App\Models\Tag;
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
        Meme::query()->delete();
        Tag::query()->delete();

        // Remove any files from previous seeding
        Storage::deleteDirectory('articles');
        Storage::deleteDirectory('socials');
        Storage::deleteDirectory('tools');
        Storage::deleteDirectory('topics');
        Storage::deleteDirectory('memes');
        
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

            $r = new Tool();

            if($record->photo)
            {
                $base64_image = $record->photo;
                @list($type, $file_data) = explode(';', $base64_image);
                @list(, $file_data) = explode(',', $file_data);
                Storage::put('image.tmp', base64_decode($file_data));
                $path = Storage::putFile('tools', new File('storage/app/public/image.tmp'));
                $r->image = $path;
            }

            $r->title = $record->name;
            $r->url = $record->url;
            $r->tool_type_id = $typeId;            
            $r->save(); 

        }    
        
        // **************************************************
        // Evaluations
        $result = DB::connection('mysql2')->table("evaluations")->get();

        foreach($result as $record)
        {

            $r = new Evaluation();
            $r->title = 'New Evaluation';
            $r->content = $record->text;
            $r->save(); 

        }  

        // **************************************************
        // Social
        $result = DB::connection('mysql2')->table("social")->get();

        foreach($result as $record)
        {

            $r = new Social();
            
            if($record->photo)
            {
                $base64_image = $record->photo;
                @list($type, $file_data) = explode(';', $base64_image);
                @list(, $file_data) = explode(',', $file_data);
                Storage::put('image.tmp', base64_decode($file_data));                        
                $path = Storage::putFile('socials', new File('storage/app/public/image.tmp'));
                $r->image = $path;
            }

            $r->title = $record->name;
            $r->url = $record->url;
            $r->home = $record->home;
            $r->header = $record->header;
            $r->save(); 

        } 

        // **************************************************
        // Topics
        $result = DB::connection('mysql2')->table("topics")->get();

        foreach($result as $record)
        {

            $r = new Topic();
            
            if($record->photo)
            {
                $base64_image = $record->photo;
                @list($type, $file_data) = explode(';', $base64_image);
                @list(, $file_data) = explode(',', $file_data);
                Storage::put('image.tmp', base64_decode($file_data));                        
                $path = Storage::putFile('topics', new File('storage/app/public/image.tmp'));
                $r->image = $path;
            }
            
            $r->id = $record->id;
            $r->title = $record->name;
            $r->slug = $record->tag;
            $r->url = $record->url;
            $r->icon = $record->icon;
            $r->teaching = $record->teaching;
            $r->background = $record->background;
            $r->save(); 

        } 

        // **************************************************
        // Users
        $result = DB::connection('mysql2')->table("users")->get();

        foreach($result as $record)
        {

            $r = new User();
            $r->first = $record->first;
            $r->last = $record->last;
            $r->email = $record->email;
            $r->password = 'password';
            $r->save(); 

        } 

        // **************************************************
        // Articles
        $result = DB::connection('mysql2')->table("articles")->get();

        foreach($result as $record)
        {

            $article = ArticleType::where('title', $record->type)->get();

            if($article->count() == 0)
            {
                $articleType = new ArticleType();
                $articleType->title = $record->type;
                $articleId = $articleType->save();
            }
            else
            {
                $articleId = $article[0]->id;
            }

            $r = new Article();

            if($record->photo)
            {
                $base64_image = $record->photo;
                @list($type, $file_data) = explode(';', $base64_image);
                @list(, $file_data) = explode(',', $file_data);
                Storage::put('image.tmp', base64_decode($file_data));
                $path = Storage::putFile('articles', new File('storage/app/public/image.tmp'));
                $r->image = $path;
            }
            
            $r->title = $record->title;
            $r->content = $record->content;
            $r->instagram_id = $record->instagramId;
            $r->twitter_id = $record->twitterId;
            $r->soundcloud_id = $record->soundcloudId;
            $r->resources = $record->resources;
            $r->url = $record->url;
            $r->article_type_id = $articleId;
            $r->published_at = date('Y-m-j', strtotime($record->date));
            $r->home = $record->home;
            $r->save(); 

        }  

        // **************************************************
        // Pages
        $result = DB::connection('mysql2')->table("pages")->get();

        foreach($result as $record)
        {

            $r = new Page();

            if($record->photo)
            {
                $base64_image = $record->photo;
                @list($type, $file_data) = explode(';', $base64_image);
                @list(, $file_data) = explode(',', $file_data);
                Storage::put('image.tmp', base64_decode($file_data));
                $path = Storage::putFile('pages', new File('storage/app/public/image.tmp'));
                $r->image = $path;
            }
            
            $r->id = $record->id;
            $r->title = $record->title;
            $r->content = $record->content;
            $r->slug = $record->url;
            $r->tinkercad_id = $record->tinkercadId;
            $r->arduino_id = $record->arduinoId;
            $r->github_id = $record->githubId;
            $r->youtube_id = $record->youtubeId;
            $r->topic_id = $record->topicId;
            $r->published_at = date('Y-m-j', strtotime($record->date));
            $r->save(); 

        }  

        // **************************************************
        // Topic Pages
        $result = DB::connection('mysql2')->table("pageTopicLinks")->get();

        foreach($result as $record)
        {

            $r = Page::find($record->pageId);
            $r->topics()->attach($record->topicId);

        }

        // **************************************************
        // Tags
        $tags = ['php', 'stackoverflow', 'html', 'javascript', 'coding', 'css', 'debugging', 'design', 'uiux', 'ai'];

        foreach($tags as $tag)
        {
            $r = new Tag();
            $r->title = $tag;
            $r->save();
        }

        // **************************************************
        // Memes
        $memes =[
            [
                'title' => 'Baby Mobile',
                'image' => 'https://preview.redd.it/gq3r9np0v1d81.jpg?width=640&crop=smart&auto=webp&s=a7c9fc4697f6dbbb6d1004b5b8dda48254fec75b',
                'tags' => ['uiux', 'design', 'debugging']
            ],[
                'title' => 'Sims AI',
                'image' => 'https://external-preview.redd.it/lCd6J51RxAciVjLu62FGMKLWmULhtgGJnHzUyrnkAvI.jpg?width=640&crop=smart&auto=webp&s=6ad95257e47597a7e4126fd4a228733df5e9c9c6',
                'tags' => ['coding', 'ai']
            ]
        ];

        foreach($memes as $meme)
        {
            $r = new Meme();
            $r->title = $meme['title'];

            Storage::put('image.tmp', file_get_contents($meme['image']));
            $path = Storage::putFile('memes', new File('storage/app/public/image.tmp'));
            $r->image = $path;

            $r->save();

            $mid = $r->id;

            foreach($meme['tags'] as $tag)
            {
                $tid = Tag::where('title', $tag)->first()->id;

                $r = Meme::find($mid);
                $r->tags()->attach($tid);
            }



        }

    }
   
}
