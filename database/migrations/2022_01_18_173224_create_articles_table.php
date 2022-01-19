<?php

use App\Models\ArticleType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('slug')->nullable();
            $table->text('resources')->nullable();
            $table->string('instagram_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->string('soundcloud_id')->nullable();
            $table->foreignIdFor(ArticleType::class);
            $table->enum('home', ['Yes','No'])->default('No');
            $table->string('image')->nullable();
            $table->timestamp('published_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
