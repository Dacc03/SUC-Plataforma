@php
    $usuario = auth()->user();
@endphp

<div class="mb-4">
    <label for="motivo" class="block font-medium text-sm text-gray-700">Motivo</label>
    <textarea name="motivo" id="motivo" class="form-textarea w-full rounded-md border-gray-300" rows="3" required></textarea>
</div>

<div class="mb-4">
    <label for="rol_destinatario" class="block font-medium text-sm text-gray-700">Seleccionar Rol del Destinatario</label>
    <select id="rol_destinatario" class="form-select w-full rounded-md border-gray-300" required>
        <option value="">Seleccione un rol</option>
        <option value="5">Colaborador</option>
        <option value="6">Director</option>
        <option value="7">Director General</option>
    </select>
</div>

<div class="mb-4">
    <label for="destinatario_id" class="block font-medium text-sm text-gray-700">Seleccionar Usuario Destinatario</label>
    <select name="destinatario_id" id="destinatario_id" class="form-select w-full rounded-md border-gray-300" required>
        <option value="">Seleccione primero un rol</option>
    </select>
</div>

<div class="mb-4">
    <label for="calendario" class="block font-medium text-sm text-gray-700">Calendario</label>
    <textarea name="calendario" id="calendario" class="form-textarea w-full rounded-md border-gray-300" rows="2" required></textarea>
</div>

<div class="mb-4">
    <label for="prioridad" class="block font-medium text-sm text-gray-700">Prioridad</label>
    <select name="prioridad" id="prioridad" class="form-select w-full rounded-md border-gray-300" required>
        <option value="">Seleccione</option>
        <option value="Alta">Alta</option>
        <option value="Media">Media</option>
        <option value="Baja">Baja</option>
    </select>
</div>

<div class="mb-4">
    <label for="fecha_reunion" class="block font-medium text-sm text-gray-700">Fecha de la Reunión</label>
    <input type="date" name="fecha_reunion" id="fecha_reunion" class="form-input w-full rounded-md border-gray-300" required disabled>
</div>

<div class="mb-4">
    <label for="hora_reunion" class="block font-medium text-sm text-gray-700">Hora de la Reunión</label>
    <select name="hora_reunion" id="hora_reunion" class="form-select w-full rounded-md border-gray-300" required disabled>
        <option value="">Seleccione una fecha primero</option>
    </select>
</div>

<div class="mb-4">
    <label for="duracion_minutos" class="block font-medium text-sm text-gray-700">Duración (en minutos)</label>
    <input type="number" name="duracion_minutos" id="duracion_minutos" class="form-input w-full rounded-md border-gray-300" min="15" step="15" required>
</div>
