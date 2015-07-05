<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('database_instances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organism_id')->unsigned();
            $table->string('name', 255);
            $table->timestamps();


            $table->foreign('organism_id')
                  ->references('id')
                  ->on('organisms')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('database_instances');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
