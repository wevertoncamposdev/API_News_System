<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id('id');
            $table->string('uuid')->unique();
            $table->string('author');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });

        DB::statement("ALTER TABLE images ADD dataURL MEDIUMBLOB AFTER uuid");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
};
