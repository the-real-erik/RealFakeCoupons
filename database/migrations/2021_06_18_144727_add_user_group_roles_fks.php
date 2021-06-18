<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserGroupRolesFks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_group_roles', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('group_id')->references('group_id')->on('groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('roles')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_group_roles', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'group_id', 'role_id']);
        });
    }
}
