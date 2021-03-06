<?php

use Illuminate\Database\Seeder;
use SGH\Models\Menu;
use SGH\Models\Permission;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderMenuLeft = 0;
        $orderMenuTop = 0;


        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Admin',
            'MENU_ICON' => 'fa-cogs',
            'MENU_ORDER' => $orderMenuLeft++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Menú',
                'MENU_URL' => 'app/menu',
                'MENU_ICON' => 'fa-bars',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'MENU_ENABLED' => true,
                'PERM_ID' => $this->getPermission('app-menu'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Parametrizaciones generales',
                'MENU_URL' => 'app/parameters',
                'MENU_ICON' => 'fa-cog',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('app-parameters'),
           ]);
            Menu::create([
                'MENU_LABEL' => 'Carga másiva',
                'MENU_URL' => 'app/upload',
                'MENU_ICON' => 'fa-cog',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('app-upload'),
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Usuarios y roles',
            'MENU_ICON' => 'fa-user-circle-o',
            'MENU_ORDER' => $orderMenuLeft++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Usuarios',
                'MENU_URL' => 'auth/usuarios',
                'MENU_ICON' => 'fa-user',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('user-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Roles',
                'MENU_URL' => 'auth/roles',
                'MENU_ICON' => 'fa-male',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('role-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Permisos',
                'MENU_URL' => 'auth/permisos',
                'MENU_ICON' => 'fa-address-card-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('permission-index'),
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Geográficos',
            'MENU_ICON' => 'fa-globe',
            'MENU_ORDER' => $orderMenuLeft++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Países',
                'MENU_URL' => 'cnfg-geograficos/paises',
                'MENU_ICON' => 'fa-circle',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('pais-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Departamentos',
                'MENU_URL' => 'cnfg-geograficos/departamentos',
                'MENU_ICON' => 'fa-circle',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('departamento-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Ciudades',
                'MENU_URL' => 'cnfg-geograficos/ciudades',
                'MENU_ICON' => 'fa-circle-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('ciudad-index'),
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Contratos',
            'MENU_ICON' => 'fa-handshake-o',
            'MENU_ORDER' => $orderMenuLeft++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Clasificación de ocupaciones',
                'MENU_URL' => 'cnfg-contratos/cnos',
                'MENU_ICON' => 'fa-yelp',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('cno-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Cargos',
                'MENU_URL' => 'cnfg-contratos/cargos',
                'MENU_ICON' => 'fa-sign-language',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('cargo-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipos de contratos',
                'MENU_URL' => 'cnfg-contratos/tiposcontratos',
                'MENU_ICON' => 'fa-id-card-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('tipocontrato-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Empresas temporales',
                'MENU_URL' => 'cnfg-contratos/temporales',
                'MENU_ICON' => 'fa-briefcase',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('temporal-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Clases de contratos',
                'MENU_URL' => 'cnfg-contratos/clasescontratos',
                'MENU_ICON' => 'fa-id-card',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('clasecontrato-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Estados de contratos',
                'MENU_URL' => 'cnfg-contratos/estadoscontratos',
                'MENU_ICON' => 'fa-cube',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('estadocontrato-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Motivos de retiro',
                'MENU_URL' => 'cnfg-contratos/motivosretiros',
                'MENU_ICON' => 'fa-hand-o-right',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('motivoretiro-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Negocios',
                'MENU_URL' => 'cnfg-contratos/negocios',
                'MENU_ICON' => 'fa fa-list-ol',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('negocio-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Atributos',
                'MENU_URL' => 'cnfg-contratos/atributos',
                'MENU_ICON' => 'fa fa-linode',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('atributo-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Atributos Empl.',
                'MENU_URL' => 'cnfg-contratos/empleadoatributo',
                'MENU_ICON' => 'fa fa-id-badge',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('empleadoatributo-index'),
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Organizacionales',
            'MENU_ICON' => 'fa-sitemap',
            'MENU_ORDER' => $orderMenuLeft++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Empleadores',
                'MENU_URL' => 'cnfg-organizacionales/empleadores',
                'MENU_ICON' => 'fa-black-tie',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('empleador-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Gerencias',
                'MENU_URL' => 'cnfg-organizacionales/gerencias',
                'MENU_ICON' => 'fa-arrows-alt',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('gerencia-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Procesos',
                'MENU_URL' => 'cnfg-organizacionales/procesos',
                'MENU_ICON' => 'fa-crosshairs',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('proceso-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Centros de costos',
                'MENU_URL' => 'cnfg-organizacionales/centroscostos',
                'MENU_ICON' => 'fa-money',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('centrocosto-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipos de empleadores',
                'MENU_URL' => 'cnfg-organizacionales/tiposempleadores',
                'MENU_ICON' => 'fa-bars',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('tipoempleador-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Riesgos ARL',
                'MENU_URL' => 'cnfg-organizacionales/riesgos',
                'MENU_ICON' => 'fa-fire',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('riesgo-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Grupos de Empleados',
                'MENU_URL' => 'cnfg-organizacionales/grupos',
                'MENU_ICON' => 'fa-user-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('grupo-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Turnos',
                'MENU_URL' => 'cnfg-organizacionales/turnos',
                'MENU_ICON' => 'fa-clock-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('turno-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Plantas Laborales',
                'MENU_URL' => 'cnfg-organizacionales/plantaslaborales',
                'MENU_ICON' => 'fa-area-chart',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('plantalaboral-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Movimientos de Plantas',
                'MENU_URL' => 'cnfg-organizacionales/movimientosplantas',
                'MENU_ICON' => 'fa fa-sort-amount-desc',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('movimientoplanta-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipo Entidades',
                'MENU_URL' => 'cnfg-organizacionales/tipoentidades',
                'MENU_ICON' => 'fa-institution',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('tipoentidad-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Entidades',
                'MENU_URL' => 'cnfg-organizacionales/entidades',
                'MENU_ICON' => 'fa-institution',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('entidad-index'),
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Tickets Disciplinarios',
            'MENU_ICON' => 'fa-ticket',
            'MENU_ORDER' => $orderMenuLeft++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Prioridades',
                'MENU_URL' => 'cnfg-tickets/prioridades',
                'MENU_ICON' => 'fa-first-order',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('prioridad-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Estados de Ticket',
                'MENU_URL' => 'cnfg-tickets/estadostickets',
                'MENU_ICON' => 'fa-empire',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('estadoticket-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Sanciones',
                'MENU_URL' => 'cnfg-tickets/sanciones',
                'MENU_ICON' => 'fa-gavel',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('sancion-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Estados de Aprobaciones',
                'MENU_URL' => 'cnfg-tickets/estadosaprobaciones',
                'MENU_ICON' => 'fa-check-circle-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('estadoaprobacion-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Categorías',
                'MENU_URL' => 'cnfg-tickets/categorias',
                'MENU_ICON' => 'fa-newspaper-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('categoria-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipos de Incidentes',
                'MENU_URL' => 'cnfg-tickets/tiposincidentes',
                'MENU_ICON' => 'fa-exclamation-triangle',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('tipoincidente-index'),
            ]);


        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Ausentismos',
            'MENU_ICON' => 'fa fa-user-times',
            'MENU_ORDER' => $orderMenuLeft++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Diagnósticos',
                'MENU_URL' => 'cnfg-ausentismos/diagnosticos',
                'MENU_ICON' => 'fa-heartbeat',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('diagnostico-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipo Ausentismos',
                'MENU_URL' => 'cnfg-ausentismos/tipoausentismos',
                'MENU_ICON' => 'fa-wrench',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('tipoausentismo-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Concepto Ausencias',
                'MENU_URL' => 'cnfg-ausentismos/conceptoausencias',
                'MENU_ICON' => 'fa-share-square-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('conceptoausencia-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Ausentismo',
                'MENU_URL' => 'cnfg-ausentismos/ausentismos',
                'MENU_ICON' => 'fa-bed',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('ausentismo-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Prorroga Ausentismo',
                'MENU_URL' => 'cnfg-ausentismos/prorrogaausentismos',
                'MENU_ICON' => 'fa fa-arrow-circle-right',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('prorrogaausentismo-index'),
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Casos Médicos',
            'MENU_ICON' => 'fa fa-stethoscope',
            'MENU_ORDER' => $orderMenuLeft++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'DX Generales',
                'MENU_URL' => 'cnfg-casosmedicos/diagnosticosgenerales',
                'MENU_ICON' => 'fa fa-hospital-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('diagnosticogeneral-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Estados de Restricción',
                'MENU_URL' => 'cnfg-casosmedicos/estadosrestriccion',
                'MENU_ICON' => 'fa fa-heart',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('estadorestriccion-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Casos Médicos',
                'MENU_URL' => 'cnfg-casosmedicos/casosmedicos',
                'MENU_ICON' => 'fa fa-user-md',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('casomedico-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Novedades Médicas',
                'MENU_URL' => 'cnfg-casosmedicos/novedadesmedicas',
                'MENU_ICON' => 'fa fa-medkit',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'PERM_ID' => $this->getPermission('novedadmedica-index'),
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Reportes',
            'MENU_ICON' => 'fa fa-filter',
            'MENU_URL' => 'reportes',
            'MENU_ORDER' => $orderMenuLeft++,
            'PERM_ID' => $this->getPermission('reportes'),
        ]);


        //TOP
        Menu::create([
            'MENU_LABEL' => 'Tickets',
            'MENU_URL' => 'cnfg-tickets/tickets',
            'MENU_ICON' => 'fa-id-badge',
            'MENU_ORDER' => $orderMenuTop++,
            'MENU_POSITION' => 'TOP',
            'PERM_ID' => $this->getPermission('ticket-index'),
        ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Gestión Humana',
            'MENU_ICON' => 'fa-users',
            'MENU_ORDER' => $orderMenuTop++,
            'MENU_POSITION' => 'TOP',
        ]);
            Menu::create([
                'MENU_LABEL' => 'Contratos',
                'MENU_URL' => 'gestion-humana/contratos',
                'MENU_ICON' => 'fa-handshake-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderMenuTop++,
                'MENU_POSITION' => 'TOP',
                'PERM_ID' => $this->getPermission('contrato-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Hojas de Vida',
                'MENU_URL' => 'gestion-humana/prospectos',
                'MENU_ICON' => 'fa-drivers-license-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderMenuTop++,
                'MENU_POSITION' => 'TOP',
                'PERM_ID' => $this->getPermission('prospecto-index'),
            ]);
            Menu::create([
                'MENU_LABEL' => 'Validador de TNL',
                'MENU_URL' => 'gestion-humana/helpers/validadorTNL',
                'MENU_ICON' => 'fa-check-square-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'MENU_POSITION' => 'TOP',
                'PERM_ID' => $this->getPermission('tnl'),
            ]);
   
    }

    private function getPermission($namePermission)
    {
        $perm = Permission::where('name', $namePermission)->get()->first();
        if(isset($perm))
            return $perm->id;
        return null;
    }
}
