<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndustryAndTypeToAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'accounts', function (Blueprint $table) {
                $table->bigInteger('type_id')->unsigned()->nullable();
                $table->bigInteger('industry_id')->unsigned()->nullable();
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
        Schema::table(
            'accounts', function (Blueprint $table) {
                $table->dropColumns(['type_id', 'industry_id']);
            }
        );
    }
}
