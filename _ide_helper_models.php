<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $detalle_id
 * @property int $dispon_id
 * @property string $dia
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Disponibilidad $disponibilidad
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleDisponibilidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleDisponibilidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleDisponibilidad query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleDisponibilidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleDisponibilidad whereDetalleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleDisponibilidad whereDia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleDisponibilidad whereDisponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleDisponibilidad whereHoraFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleDisponibilidad whereHoraInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleDisponibilidad whereUpdatedAt($value)
 */
	class DetalleDisponibilidad extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $dispon_id
 * @property int $user_id
 * @property string|null $fecha_inicio
 * @property string|null $fecha_fin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DetalleDisponibilidad> $detalles
 * @property-read int|null $detalles_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disponibilidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disponibilidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disponibilidad query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disponibilidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disponibilidad whereDisponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disponibilidad whereFechaFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disponibilidad whereFechaInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disponibilidad whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disponibilidad whereUserId($value)
 */
	class Disponibilidad extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $titulo
 * @property string $tipo
 * @property string|null $descripcion
 * @property string|null $fecha_inicio
 * @property string|null $fecha_fin
 * @property string|null $hora
 * @property string|null $modalidad
 * @property string|null $ubicacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereFechaFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereFechaInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereModalidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereUbicacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Evento whereUpdatedAt($value)
 */
	class Evento extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $nombres
 * @property string $apellidos
 * @property string $dni
 * @property string $fecha_nacimiento
 * @property string|null $telefono
 * @property string|null $direccion
 * @property string|null $genero
 * @property string|null $foto
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereApellidos($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereFechaNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereGenero($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereNombres($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perfil whereUserId($value)
 */
	class Perfil extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $titulo
 * @property string|null $descripcion
 * @property string|null $fecha_inicio
 * @property string|null $fecha_fin
 * @property string|null $adjunto
 * @property string|null $nivel_progreso
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereAdjunto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereFechaFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereFechaInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereNivelProgreso($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereUserId($value)
 */
	class Proyecto extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rol query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rol whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rol whereUpdatedAt($value)
 */
	class Rol extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $destinatario_id
 * @property string $motivo
 * @property string $fecha
 * @property string $hora
 * @property string $prioridad
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $destinatario
 * @property-read \App\Models\Solicitud $solicitud
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion whereDestinatarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion whereHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion whereMotivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion wherePrioridad($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SReunion whereUpdatedAt($value)
 */
	class SReunion extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $tipo_id
 * @property string $estado
 * @property string $fecha
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SReunion|null $reunion
 * @property-read \App\Models\TipoSolicitud $tipo
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Solicitud newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Solicitud newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Solicitud query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Solicitud whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Solicitud whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Solicitud whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Solicitud whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Solicitud whereTipoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Solicitud whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Solicitud whereUserId($value)
 */
	class Solicitud extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $tipo
 * @property string|null $definicion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Solicitud> $solicitudes
 * @property-read int|null $solicitudes_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TipoSolicitud newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TipoSolicitud newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TipoSolicitud query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TipoSolicitud whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TipoSolicitud whereDefinicion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TipoSolicitud whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TipoSolicitud whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TipoSolicitud whereUpdatedAt($value)
 */
	class TipoSolicitud extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $rol_id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Perfil|null $perfil
 * @property-read \App\Models\Rol|null $rol
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

