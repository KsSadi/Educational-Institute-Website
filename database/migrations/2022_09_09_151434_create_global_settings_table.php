<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_settings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('bn_name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('email')->nullable()->default('demo@gmail.com');
            $table->string('phone')->nullable()->default('01700000000');
            $table->string('footer_text')->nullable()->default('©2022 Name. All Rights Reserved.');
            $table->string('address')->nullable()->default('Dhaka,Bangladesh');
            $table->string('logo')->nullable()->default('');
            $table->string('icon')->nullable()->default('');
            $table->string('facebook')->nullable()->default('');
            $table->string('youtube')->nullable()->default('');
            $table->string('twitter')->nullable()->default('');
            $table->integer('theme')->default(1);
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
        Schema::dropIfExists('global_settings');
    }
}
