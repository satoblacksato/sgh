<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporalesTable extends Migration
{
    
    private $nomTabla = 'TEMPORALES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'TEMPORALES: contiene los empleadores de la organización de forma tercerizada (empresas temporales)';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('TEMP_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla empleadores.');

            $table->string('TEMP_RAZONSOCIAL', 100)
                ->comment('Razón social de la temporal');

            $table->string('TEMP_NOMBRECOMERCIAL', 100)
                ->comment('Nombre comercial de la temporal');

            $table->string('TEMP_DIRECCION', 100)
                ->comment('Dirección de la temporal');

            $table->unsignedInteger('PROS_ID')
                ->comment('Persona encargada del manejo de gestión humana de la temporal.');

            $table->string('TEMP_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de contrato')->nullable();
            
            //Traza
            $table->string('TEMP_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('TEMP_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('TEMP_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('TEMP_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('TEMP_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('TEMP_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            //Relaciones
            $table->foreign('PROS_ID')
                ->references('PROS_ID')
                ->on('PROSPECTOS')
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
        echo '- Borrando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::dropIfExists($this->nomTabla);
    }

}
