<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupRolePermissionsFks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_role_permissions', function (Blueprint $table) {
            $table->foreign('group_id')->references('group_id')->on('groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('roles')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('permission_id')->references('permission_id')->on('permissions')
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
        Schema::table('group_role_permissions', function (Blueprint $table) {
            $table->dropForeign(['group_id', 'role_id', 'permission_id']);
        });
    }
}
