<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAusentismosTable extends Migration
{
	private $nomTabla = 'AUSENTISMOS';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$commentTabla = 'Contiene el registro de ausencias presentadas por los empleados';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
		Schema::create('AUSENTISMOS', function(Blueprint $table)
		{
			
			$table->increments('AUSE_ID')->comment('Valor autonumérico, llave primaria de la tabla.');
			$table->integer('DIAG_ID')->unsignedInteger('DIAG_ID')->foreign('DIAG_ID')->references('DIAG_ID')->on('DIAGNOSTICOS')->onDelete('cascade')->onUpdate('cascade')->nullable()->comment('Id de la tabla Diagnostico');
			$table->integer('COAU_ID')->unsignedInteger('COAU_ID')->foreign('COAU_ID')->references('COAU_ID')->on('CONCEPTOAUSENTISMOS')->onDelete('cascade')->onUpdate('cascade')->comment('Id de la tabla Concepto Ausentismo');
			$table->integer('CONT_ID')->unsignedInteger('CONT_ID')->foreign('CONT_ID')->references('CONT_ID')->on('CONTRATOS')->onDelete('cascade')->onUpdate('cascade')->comment('Id d ela tabla Contrato');
			$table->datetime('AUSE_FECHAINICIO')->comment('Fecha de Inicio del Ausentismo');
			$table->datetime('AUSE_FECHAFINAL')->comment('Fecha Final del Ausentismo');
			$table->integer('AUSE_DIAS')->unsigned();
			$table->date('AUSE_FECHAACCIDENTE')->nullable()->comment('Fecha del Accidente de Trabajo');
			$table->integer('ENTI_ID')->unsignedInteger('ENTI_ID')->foreign('ENTI_ID')->references('ENTI_ID')->on('ENTIDADES')->onDelete('cascade')->onUpdate('cascade')->comment('Id de la entidad Responsable del Ausentismo');
			$table->integer('AUSE_IBC')->nullable()->comment('Ingreso Base de Cotizacion del Prospecto');
			$table->integer('AUSE_VALOR')->nullable()->comment('Valor Total del Ausentismo');
			$table->string('AUSE_OBSERVACIONES')->nullable()->comment('Observaciones del Ausentismo');


			//Traza
            $table->string('AUSE_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('AUSE_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('AUSE_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('AUSE_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('AUSE_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('AUSE_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');

            //Relaciones

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
		Schema::drop('AUSENTISMOS');
	}

}