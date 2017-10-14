<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //campaigns->users
        //campaigns->templates
        //campaigns->bunches
        Schema::table('campaigns', function($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('template_id')->references('id')->on('templates');
            $table->foreign('bunch_id')->references('id')->on('bunches');
        });

        //subscribers->users
        Schema::table('subscribers', function($table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        //templates->users
        Schema::table('templates', function($table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        //bunches->users
        Schema::table('bunches', function($table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        //subscriber_bunches->bunches
        //subscriber_bunches->subscribers
        Schema::table('subscriber_bunches', function($table){
            $table->foreign('bunch_id')->references('id')->on('bunches');
            $table->foreign('subscriber_id')->references('id')->on('subscribers');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //campaigns->users
        //campaigns->templates
        //campaigns->bunches
        Schema::table('campaigns', function($table) {
            $table->dropForeign('campaigns_user_id_foreign');
            $table->dropForeign('campaigns_template_id_foreign');
            $table->dropForeign('campaigns_bunch_id_foreign');
        });

        //subscribers->users
        Schema::table('subscribers', function($table){
            $table->dropForeign('subscribers_user_id_foreign');
        });

        //templates->users
        Schema::table('templates', function($table){
            $table->dropForeign('templates_user_id_foreign');
        });

        //bunches->users
        Schema::table('bunches', function($table){
            $table->dropForeign('bunches_user_id_foreign');
        });

        //subscriber_bunches->bunches
        //subscriber_bunches->subscribers
        Schema::table('subscriber_bunches', function($table){
            $table->dropForeign('subscriber_bunches_bunch_id_foreign');
            $table->dropForeign('subscriber_bunches_subscriber_id_foreign');
        });

    }
}
