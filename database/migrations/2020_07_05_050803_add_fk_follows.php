<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkFollows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('follows', function (Blueprint $table) {
            $table->bigInteger('folower_id')->unsigned()->nullable();
            $table->foreign('folower_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('followed_id')->unsigned()->nullable();
            $table->foreign('followed_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('follows', function (Blueprint $table) {
            $table->dropForeign('follows_followed_id_foreign');
            $table->dropColumn('followed_id');
            $table->dropForeign('follows_folower_id_foreign');
            $table->dropColumn('folower_id');
        });
    }
}
