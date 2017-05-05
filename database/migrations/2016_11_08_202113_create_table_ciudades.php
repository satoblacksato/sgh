<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCiudades extends Migration
{
    
    private $nomTabla = 'CIUDADES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'CIUDRTAMENTOS: contiene los departamentos del territorio nacional';

        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->unsignedInteger('CIUD_ID')->primary()
                ->comment('Valor autonumérico, llave primaria de la tabla departamentos.');

            $table->integer('CIUD_CODIGO', 5)
                ->comment('codigo del departamento de acuerdo a clasificación DANE');

            $table->integer('DEPA_ID')->unsigned();

            $table->string('CIUD_DESCRIPCION', 300)
                ->comment('descripcion del motivo de retiro');
            
            //Traza
            $table->string('CIUD_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('CIUD_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('CIUD_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('CIUD_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('CIUD_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('CIUD_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');

            //Relación con tabla DEPARTAMENTOS
            $table->foreign('DEPA_ID')
                ->references('DEPA_ID')
                ->on('DEPARTAMENTOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
        
        if(env('DB_CONNECTION') == 'pgsql')
            DB::statement("COMMENT ON TABLE ".env('DB_SCHEMA').".\"".$this->nomTabla."\" IS '".$commentTabla."'");
        elseif(env('DB_CONNECTION') == 'mysql')
            DB::statement("ALTER TABLE ".$this->nomTabla." COMMENT = '".$commentTabla."'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->nomTabla);
    }

}