<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('created by');
            $table->unsignedBigInteger('city_id');
            $table->string('name');
            $table->string('document_value');
            $table->date('birthdate');
            $table->tinyInteger('gender')->comment('1 - Women | 2 - Men');
            $table->string('address');
            $table->timestamps();

            $table->foreign('user_id', 'fk_clients_user_id')->references('id')->on('users');
            $table->foreign('city_id', 'fk_clients_city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table){
            $table->dropForeign('fk_clients_user_id');
            $table->dropColumn('user_id');
            $table->dropForeign('fk_clients_city_id');
            $table->dropColumn('city_id');
        });

        Schema::dropIfExists('clients');
    }
};
