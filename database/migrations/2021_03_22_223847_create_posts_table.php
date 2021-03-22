<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // creates an autoincrementing id key
            //  $table->integer('user_id')->unsigned()->index(); // give index for speed to reference it in th DB

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); /* or reference the users table. this is how laravel will work out how to reference and link the users table and the id column
                                                    have a look at constrained() and onDelete() for foreign key constraignt and onDelete will cascade and delet all the users posts */
            $table->text('body');
            $table->timestamps();  // created_at  && updated_at colom comes with timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
