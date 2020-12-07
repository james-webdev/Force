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
                $table->bigIncrements('id');
                $table->foreignId('account_id');
                $table->foreign('account_id')->references('id')->on('accounts');
                $table->foreignId('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->string('title');
                $table->text('description');
                $table->date('close_date');
                $table->integer('value');
                $table->integer('status')->default(0);
                $table->foreignId('stage_id');
                $table->foreign('stage_id')->references('id')->on('sales_stages');
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
