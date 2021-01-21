<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable("settings")) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->string("title", 30);
                $table->string("code", 50);
                $table->string("description", 255)->nullable();
                $table->string("default_value", 100);
                $table->boolean("status")->default(1)->nullable();
                $table->integer("created_by")->nullable();
                $table->integer("updated_by")->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('settings');
    }
}
