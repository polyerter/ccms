<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sitename');
            $table->string('siteurl')->default('mail.ru');
            $table->string('sitedescription');
            $table->text('sitekeywords');
            $table->string('sitelogo')->nullable();
            $table->integer('amountnews');
            $table->integer('offsite')->default(0);
            $table->text('textoffsite')->nullable();
            $table->string('bankname')->nullable();
            $table->string('bankbik')->nullable();
            $table->string('bankrs')->nullable();
            $table->integer('bankkbe')->nullable();
            $table->integer('offpays')->default(1);
            $table->integer('offrow')->default(1);
            $table->integer('rowdec')->default(15);
            $table->integer('rowam')->default(60);
            $table->integer('userampass')->default(8);
            $table->integer('userampay')->default(6);
            $table->integer('userampays')->default(80);
            $table->integer('daysoffpays')->default(6);
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
        Schema::dropIfExists('settings');
    }
}
