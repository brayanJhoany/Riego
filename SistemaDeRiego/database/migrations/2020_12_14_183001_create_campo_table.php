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
        Schema::create('textura_de_suelos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->float('da');
            $table->float('cc');
            $table->float('pmp');
            $table->timestamps();
        });

        Schema::create('campos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('texturaDeSuelo_id');
            $table->foreign("texturaDeSuelo_id")
            ->references("id")->on("textura_de_suelos")
            ->onDelete('cascade');

            $table->unsignedBigInteger("user_id");//referencia al usuario
            $table->foreign("user_id")
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
        Schema::dropIfExists('textura_de_suelos');
        Schema::dropIfExists('campo');
    }
}
