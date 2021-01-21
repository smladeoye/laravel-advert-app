<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable("advert_settings")) {
            Schema::create('advert_settings', function (Blueprint $table) {
                $table->id();
                $table->integer("advert_id");
                $table->string("setting_code", 50);
                $table->string("value", 50);
                $table->boolean("status")->nullable()->default(1);
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
        Schema::dropIfExists('advert_settings');
    }
}
