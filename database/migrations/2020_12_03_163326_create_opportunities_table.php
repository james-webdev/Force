<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'opportunities', function (Blueprint $table) {
                $table->id();
                $table->integer('account_id')->index();
                $table->string('title');
                $table->text('description');
                $table->date('expected_close');
                $table->date('actual_close');
                $table->integer('value');
                $table->integer('status')->nullable();
                $table->integer('user_id')->index();
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
        Schema::dropIfExists('opportunities');
    }
}
