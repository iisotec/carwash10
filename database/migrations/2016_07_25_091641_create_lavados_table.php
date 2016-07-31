<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatelavadosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lavados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('vehiculo_id')->unsigned();
            $table->integer('precio');
            $table->timestamp('fecha_lavado');
            $table->string('estado_lavado', 20);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');

            $table->foreign('vehiculo_id')
                ->references('id')->on('vehiculos')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lavados');
    }
}
