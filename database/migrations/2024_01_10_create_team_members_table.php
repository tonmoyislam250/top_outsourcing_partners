<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('modal_image')->nullable();
            $table->string('name');
            $table->string('title');
            $table->text('description');
            $table->json('education');
            $table->json('expertise');
            $table->text('vision');
            $table->boolean('is_principal')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_members');
    }
};
