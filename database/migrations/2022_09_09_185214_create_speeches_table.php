<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeechesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speeches', function (Blueprint $table) {
            $table->id();
            $table->string('head_teacher_name')->nullable()->default('Demo Name');
            $table->string('president_name')->nullable()->default('Demo Name');
            $table->string('head_teacher_designation')->nullable()->default('Demo Name');
            $table->string('president_designation')->nullable()->default('Demo Name');
            $table->string('head_teacher_institute')->nullable()->default('Demo Name');
            $table->string('president_institute')->nullable()->default('Demo Name');
            $table->string('head_teacher_image')->nullable()->default('Demo Name');
            $table->string('president_image')->nullable()->default('Demo Name');
            $table->text('head_teacher_massage')->nullable()->default('Demo Name');
            $table->text('president_massage')->nullable()->default('Demo Name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speeches');
    }
}
