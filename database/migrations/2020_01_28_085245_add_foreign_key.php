<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned()->index();
            $table -> foreign('post_id', 'post_tag_post') -> references('id')->on('posts');

            $table->bigInteger('tag_id')->unsigned()->index();
            $table->foreign('tag_id', 'tag_post_tag')->references('id')->on('tags');
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropForeign('post_tag_post');
            $table->dropForeign('tag_post_tag');

            $table->dropColumn('post_id');
            $table->dropColumn('tag_id');
        });

    }
}
