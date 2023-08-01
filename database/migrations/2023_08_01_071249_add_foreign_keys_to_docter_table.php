<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docter', function (Blueprint $table) {
            //
            $table->foreign('specialist_id', 'fk_docter_to_specialist')->references('id')->on('specialist')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('docter', function (Blueprint $table) {
            //
            $table->dropForeign('fk_docter_to_specialist');
        });
    }
}
