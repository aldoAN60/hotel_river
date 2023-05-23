<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sql="create view 
        vista_factura
        as
        select s.id, s.habitacion, s.nombre as huesped, s.telefono,s.RFC, s.razon_social, s.numero_noches, t.nombre,
        m.metodo, s.ult_4_digitos, s.tarifa, s.tarifa_sin_imp, s.status, u.username as usuario_captura,
        u.username as usuario_timbra, s.folio_factura, s.correo, s.created_at as fecha_creacion
        from seguimiento_facturas as s 
        inner join tipo_reservacion as t on t.id = s.id_tipo_reservacion
        inner join metodo_pago as m on m.id = s.id_metodo_pago
        inner join users as u on u.id = s.id_usuario_captura;";
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $sql ="drop view if exists vista_factura;";
        DB::statement($sql);
    }
};
