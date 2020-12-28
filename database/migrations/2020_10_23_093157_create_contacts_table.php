<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'contacts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('sf_id'. 50)->unique();
                $table->string('account_id', 50);
                $table->string('owner_id', 50);
                $table->string('salutation', 100);
                $table->string('firstName', 100);
                $table->string('lastName', 100);
                $table->string('email', 50)->nullable();
                $table->string('phone', 50)->nullable();
                $table->string('street', 150)->nullable();
                $table->string('city', 50)->nullable();
                $table->string('state', 2)->nullable();
                $table->string('country', 2)->default('US')->nullable();
                $table->string('postalcode', 25)->nullable();
                $table->string('reports_to', 50)->nullable();
                $table->string('department', 100)->nullable();
                $table->string('title', 255)->nullable();
                $table->string('mobile_phone', 50)->nullable();;
                $table->string('home_phone', 50)->nullable();
                $table->string('other_phone', 50)->nullable();
                $table->string('assistant', 100)->nullable();
                $table->string('assistant_phone', 100)->nullable();
                $table->text('descripiton')->nullable();
                $table->boolean('optOut')->nullable();
                $table->string('leadsource', 100)->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
