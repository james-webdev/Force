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
                $table->foreignId('account_id');
                $table->foreign('account_id')->references('id')->on('accounts');
                $table->foreignId('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->string('name', 100);
                $table->string('email', 50)->nullable();
                $table->string('phone', 50)->nullable();
                $table->string('address', 150)->nullable();
                $table->string('city', 50)->nullable();
                $table->string('state', 2)->nullable();
                $table->string('country', 2)->default('US')->nullable();
                $table->string('zipcode', 25)->nullable();
                $table->string('title', 255)->nullable();
                $table->text('descripiton')->nullable();
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
