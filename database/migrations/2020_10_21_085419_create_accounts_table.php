<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'accounts', function (Blueprint $table) {

                $table->bigIncrements('id');
                $table->string('sf_id', 100)->unique();
                $table->foreignId('ownerid');
                $table->foreignId('parent_id')->nullable();
                $table->string('name', 100);
                $table->string('type', 100);
                $table->string('email', 250)->nullable();
                $table->string('phone', 250)->nullable();
                $table->string('fax', 250)->nullable();
                $table->string('website', 250)->nullable();
                $table->string('industry', 100)->nullable();
                $table->text('description')->nullable();
                $table->string('billingstreet', 150)->nullable();
                $table->string('billingcity', 50)->nullable();
                $table->string('billingstate', 2)->nullable();
                $table->string('billingcountry', 2)->default('US')->nullable();
                $table->string('billingpostalcode', 25)->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
