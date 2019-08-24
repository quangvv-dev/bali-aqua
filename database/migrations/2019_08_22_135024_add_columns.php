<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setting', function (Blueprint $table) {
            $table->string('banner')->nullable()->after('alt_logo');
            $table->string('alt_banner')->nullable()->after('banner');
            $table->string('hotline')->nullable()->after('phone');
            $table->string('fanpage')->nullable()->after('hotline');
            $table->string('follow_us_at')->nullable()->after('fanpage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
