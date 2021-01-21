<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable("advert_banners")) {
            Schema::create('advert_banners', function (Blueprint $table) {
                $table->id();
                $table->string("advert_code", 50);
                $table->integer("banner_id", 255);
                $table->integer("max_total_impression");
                $table->integer("max_total_display_per_impression");
                $table->boolean("status")->default(1)->nullable();
                $table->integer("created_by")->nullable();
                $table->integer("updated_by")->nullable();
                $table->timestamps();

                $table->unique(['advert_code', 'banner_id'], "unique_advert_banner");
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
        Schema::dropIfExists('advert_banners');
    }
}
