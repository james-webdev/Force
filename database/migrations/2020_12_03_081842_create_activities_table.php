<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'activities', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignId('contact_id');
                $table->foreign('contact_id')->references('id')->on('contacts');
                $table->foreignId('activity_type_id');
                $table->foreign('activity_type_id')->references('id')->on('activity_types');
                $table->foreignId('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->date('activity_date')->index();
                $table->boolean('completed')->default(1);
                $table->text('comments')->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
