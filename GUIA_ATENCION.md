# Guía del modelo Atencion

Esta guía describe el modelo `Atencion` mostrado en el editor. En la copia guardada del proyecto no aparecen todavía el archivo del modelo, su migración ni las clases relacionadas; las consultas de ejemplo requieren que esos elementos existan.

## Qué representa

`Atencion` usa la tabla `atenciones` y permite asignación masiva únicamente de estos campos:

| Campo | Uso según el modelo |
| --- | --- |
| `paciente_id` | Paciente asociado |
| `fecha` | Fecha de la atención; se convierte a fecha y hora (`datetime`) |
| `total` | Importe; se serializa con dos decimales |
| `metodo_pago` | Método de pago |
| `estado` | Estado de la atención |
| `observaciones` | Notas adicionales |

La lista `fillable` protege los demás atributos frente a asignación masiva. La validación de datos debe definirse en la capa que recibe la solicitud; el modelo no la implementa.

## Relaciones

- `paciente()` devuelve el paciente asociado (`BelongsTo`). Por convención, Laravel espera `paciente_id` como clave foránea.
- `detalles()` devuelve los registros relacionados en `AtencionServicio` (`HasMany`). Laravel espera que esos registros tengan `atencion_id`.

Las clases `Paciente` y `AtencionServicio` deben estar disponibles en `App\\Models` para que estas relaciones funcionen.

## Consultas de ejemplo

```php
use App\Models\Atencion;

$atencion = Atencion::with(['paciente', 'detalles'])->findOrFail($id);

$paciente = $atencion->paciente;
$detalles = $atencion->detalles;
$total = $atencion->total; // Decimal con dos posiciones
```

Para crear registros mediante asignación masiva, utiliza solo atributos incluidos en `fillable` y valida los valores antes de guardarlos:

```php
$atencion = Atencion::create([
    'paciente_id' => $pacienteId,
    'fecha' => $fecha,
    'total' => $total,
    'metodo_pago' => $metodoPago,
    'estado' => $estado,
    'observaciones' => $observaciones,
]);
```

Los campos obligatorios y sus restricciones dependen de la migración, que no está presente en la copia revisada.

## Borrado lógico

El modelo usa `SoftDeletes`: al llamar a `delete()`, Laravel marca la atención como eliminada en lugar de borrar inmediatamente su fila. Las consultas Eloquent normales omiten esos registros; `withTrashed()` permite incluirlos y `restore()` restaura uno. La tabla necesita la columna `deleted_at`, normalmente añadida con `$table->softDeletes()` en la migración.

## Archivos que faltan para completar la integración

- Migración de `atenciones`, con `deleted_at`, `paciente_id` y los campos del modelo.
- Modelo `Paciente` y tabla correspondiente.
- Modelo `AtencionServicio`, tabla con `atencion_id` y sus campos.
- `AtencionFactory`, referenciada por el trait `HasFactory`.