<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDepartamentos extends Migration
{
    
    private $nomTabla = 'DEPARTAMENTOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'DEPARTAMENTOS: contiene los departamentos del territorio nacional';

        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->unsignedInteger('DEPA_ID')->primary()
                ->comment('Valor autonumérico, llave primaria de la tabla departamentos.');

            $table->integer('DEPA_CODIGO', 5)
                ->comment('codigo del departamento de acuerdo a clasificación DANE');

            $table->string('DEPA_DESCRIPCION', 300)
                ->comment('descripcion del motivo de retiro');
            
            //Traza
            $table->string('DEPA_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('DEPA_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('DEPA_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('DEPA_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('DEPA_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('DEPA_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');

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