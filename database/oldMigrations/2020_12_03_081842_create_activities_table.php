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
                $table->string('sf_id', 50)->unique();
                $table->string('contact_id', 50)->nullable()->index();
                $table->string('subject', 255);
                $table->date('activity_date')->index();
                $table->string('status', 50)->nullable();
                $table->string('priority', 50)->default('normal');
                $table->string('owner_id', 50)->nullable();
                $table->longtext('details')->nullable()
                $table->foreignId('activity_type_id');
                $table->foreign('activity_type_id')->references('id')->on('activity_types');
                $table->string('account_id', 50)->nullable()->index();
                $table->boolean('completed')->default(0);
                $table->boolean('completed')->default(1);
               
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
