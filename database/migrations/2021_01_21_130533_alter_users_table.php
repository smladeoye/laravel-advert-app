<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable("users")) {
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn("users", "created_by")) {
                    $table->integer("created_by")->nullable();
                }
                if (!Schema::hasColumn("users", "updated_by")) {
                    $table->integer("updated_by")->nullable();
                }
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable("users")) {
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn("users", "created_by")) {
                    $table->removeColumn("created_by");
                }

                if (Schema::hasColumn("users", "updated_by")) {
                    $table->removeColumn("updated_by");
                }
            });
        }
    }
}
