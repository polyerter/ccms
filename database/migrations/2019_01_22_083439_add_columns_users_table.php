<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('familiya')->nullable(false);
            $table->string('imya')->nullable(false);
            $table->string('otchestvo')->nullable(false);
            $table->string('phone')->nullable();
            $table->date('birthday');
            $table->integer('housing')->nullable(false);
            $table->string('city')->nullable();
            $table->string('numberdoc')->nullable();
            $table->date('datesoc')->nullable();
            $table->date('datepayhous')->nullable();
            $table->integer('role');
            $table->integer('inhabited')->default(0);
            $table->integer('archive')->default(0);
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('familiya');
            $table->dropColumn('imya');
            $table->dropColumn('otchestvo');
            $table->dropColumn('phone');
            $table->dropColumn('birthday');
            $table->dropColumn('housing');
            $table->dropColumn('city');
            $table->dropColumn('numberdoc');
            $table->dropColumn('datesoc');
            $table->dropColumn('datepayhous');
            $table->dropColumn('role');
            $table->dropColumn('inhabited');
            $table->dropColumn('archive');
            $table->dropColumn('status');
        });
    }
}
