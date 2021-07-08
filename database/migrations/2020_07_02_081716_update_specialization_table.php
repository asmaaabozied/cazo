<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSpecializationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specializations', function(Blueprint $table) {
            $table->integer('category_id')->before('active');
            $table->integer('subcategory_id')->before('active');
            $table->string('doc_name_en')->before('active');
            $table->string('doc_name_ar')->before('active');
            $table->string('doc_title_en')->before('active');
            $table->string('doc_title_ar')->before('active');
            $table->text('description_en')->before('active');
            $table->text('description_ar')->before('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
