<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable("banners")) {
            Schema::create('banners', function (Blueprint $table) {
                $table->id();
                $table->string("title", 50)->unique("banner_title");
                $table->string("image", 255);
                $table->string("image_location_type_code", 10);
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
        Schema::dropIfExists('banners');
    }
}
