<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTickets extends Migration
{
    private $nomTabla = 'TICKETS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'TICKETS: tabla que contiene los tickets generados)';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('TICK_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla tickets.');

            $table->string('TICK_DESCRIPCION', 3000)
                ->comment('descripción del ticket');

            $table->date('TICK_FECHASOLICITUD')
                ->comment('fecha de solicitud de ticket');

            $table->date('TICK_FECHACUMPLIMIENTO')
                ->comment('fecha de cumplimiento de ticket');

            $table->string('TICK_IMAGEN', 500)
                ->comment('imagenes relacionadas con el ticket')->nullable();

            $table->string('TICK_ARCHIVO', 500)
                ->comment('archivos relacionadas con el ticket')->nullable();

            $table->unsignedInteger('CONT_ID')
                ->nullable()
                ->unsigned()
                ->comment('relacion a la tabla contratos');

            $table->unsignedInteger('ESTI_ID')
                ->comment('relacion a la tabla estados tickets');

            $table->unsignedInteger('PRIO_ID')
                ->comment('relacion a la tabla prioridades');

            $table->unsignedInteger('CATE_ID')
                ->comment('relacion a la tabla categorias');
            
            //Traza
            $table->string('TICK_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('TICK_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('TICK_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('TICK_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('TICK_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('TICK_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            //Relación con tabla CONTRATOS
            $table->foreign('CONT_ID')
                ->references('CONT_ID')
                ->on('CONTRATOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Relación con tabla ESTADOSTICKETS
            $table->foreign('ESTI_ID')
                ->references('ESTI_ID')
                ->on('ESTADOSTICKETS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Relación con tabla PRIORIDADES
            $table->foreign('PRIO_ID')
                ->references('PRIO_ID')
                ->on('PRIORIDADES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Relación con tabla CONTRATOS
            $table->foreign('CATE_ID')
                ->references('CATE_ID')
                ->on('CATEGORIAS')
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
        Schema::drop($this->nomTabla);
    }
}
