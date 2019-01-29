<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTableSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table){
            $table->string('bankbik', 8)->change();
            $table->string('bankrs', 20)->change();
            $table->string('bankkbe', 2)->change();
            $table->string('nameorg')->nullable();
            $table->string('binorg', 12)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table){
            $table->dropColumn('nameorg');
            $table->dropColumn('binorg');
        });
    }
}
