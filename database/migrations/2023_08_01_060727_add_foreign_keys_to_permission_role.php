<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPermissionRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            //
            $table->foreign('permission_id', 'fk_permission_role_to_permission')->references('id')->on('permission')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('role_id', 'fk_permission_role_to_role')->references('id')->on('role')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            //
            $table->dropForeign('fk_permission_role_to_permission');
            $table->dropForeign('fk_permission_role_to_role');
        });
    }
}
