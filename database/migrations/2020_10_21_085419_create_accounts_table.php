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
                $table->foreignId('user_id');
                $table->string('name', 100);
                $table->string('email', 50)->nullable();
                $table->string('phone', 50)->nullable();
                $table->string('address', 150)->nullable();
                $table->string('city', 50)->nullable();
                $table->string('state', 2)->nullable();
                $table->string('country', 2)->default('US')->nullable();
                $table->string('zipcode', 25)->nullable();
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
