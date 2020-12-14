<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampoTable extends Migration
{
    /**
     * datos:
     * nombre: indica el nombre del campo.
     * ref_tipoDeSuelo: nos indica el tipo  de suelo que tiene el campo(Franco, Arenoso ....)
     * ref_idUsuario: hace referencia al usuario que se asocia el campo
     * 
     * ******Campos Extras*******
     * Ubicacion:Indicara la ubicacion especifica del campo
     * Imagen: Imagen reprecentativa del campo
     * @return void
     */
    public function up()
    {
        Schema::create('campos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('ref_tipoDeSuelo');
            $table->foreign("ref_tipoDeSuelo")
            ->references("id")->on("textura_del_suelos")
            ->onDelete('cascade');

            $table->unsignedBigInteger("ref_idUsuario");//referencia al usuario
            $table->foreign("ref_idUsuario")
            ->references("id")->on("users")
            ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campo');
    }
}
