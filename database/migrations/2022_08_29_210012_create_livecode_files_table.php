<?php

use App\Models\LivecodeUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivecodeFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livecode_files', function (Blueprint $table) {
            $table->id();
            $table->string('path')->nullable();
            $table->text('content')->nullable();
            $table->foreignIdFor(LivecodeUser::class);
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
        Schema::dropIfExists('livecode_files');
    }
}
