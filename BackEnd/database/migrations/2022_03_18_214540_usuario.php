<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("usuario",function(Blueprint $table) {
            $table->string("codusr")->primary();
            $table->unsignedInteger("idrol");
            $table->string("password");
            $table->rememberToken();;
            $table->timestamps();
        });

        Schema::table("usuario",function(Blueprint $table){
            $table->foreign("idrol")->references("id")->on("rol");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("usuario");
    }
}
