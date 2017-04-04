<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdDepartmentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function(Blueprint $table) {
            $table->integer('parent_id')->nullable();
            $table->string('disk_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function(Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('disk_path');
        });
    }
}
