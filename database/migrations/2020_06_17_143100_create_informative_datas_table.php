<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformativeDatasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informative_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_email');
            $table->string('phone_number');
            $table->text('about_en');
            $table->text('about_ar');
            $table->text('privecy_en');
            $table->text('privecy_ar');
            $table->string('terms_conditions_en');
            $table->string('terms_conditions_ar');
            $table->string('facebook_link');
            $table->string('instagram_link');
            $table->string('twitter_link');
            $table->string('snapchat_link');
            $table->integer('default_fee');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('informative_datas');
    }
}
