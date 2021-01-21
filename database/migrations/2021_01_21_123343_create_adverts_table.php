<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable("adverts")) {
            Schema::create('adverts', function (Blueprint $table) {
                $table->id();
                $table->string("title", 50)->unique("advert_title");
                $table->string("description", 255)->nullable();
                $table->string("code", 60)->unique("advert_code");
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
        Schema::dropIfExists('adverts');
    }
}
