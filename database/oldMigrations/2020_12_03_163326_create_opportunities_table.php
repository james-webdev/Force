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
                $table->string('sf_id', 50)->unique();
                $table->string('account_id', 50)->index();
                $table->string('title');
                $table->longtext('description');
                $table->date('close_date');
                $table->integer('value');
                $table->integer('status')->default(0);
                $table->string('stage', 50)->nullable();
                $table->integer('probability')->default(0);
                $table->string('type', 50)->nullable();
                $table->string('next_step', 50)->nullable();
                $table->string('lead_source', 50)->nullable();
                $table->string('owner_id', 50);
                $table->string('contact_id', 50)->nullable();
                $table->string('partner', 100)->nullable();
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
