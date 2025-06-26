<style>
    #btnCrearSolicitud:disabled {
        background-color: #cccccc !important;
        cursor: not-allowed;
        opacity: 0.7;
    }

    #btnCrearSolicitud {
        background-color: #346BB3;
        color: white;
        border: none;
        padding: 8px 16px;
        font-size: 16px;
        font-weight: 500;
        border-radius: 6px;
        transition: background-color 0.3s ease, opacity 0.3s ease;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Crear Solicitud</h2>

                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('solicitud.store') }}" method="POST" enctype="multipart/form-data"
                        id="formSolicitud">
                        @csrf

                        <div class="mb-4 p-4 bg-gray-100 border rounded shadow-sm text-sm text-gray-600">
                            <p><strong>Estado:</strong> Pendiente</p>
                            <p><strong>Fecha de Registro:</strong> {{ now()->format('Y-m-d') }}</p>
                            <p><strong>Usuario:</strong> {{ auth()->user()->name }} (ID: {{ auth()->user()->id }})</p>
                        </div>

                        <div class="mb-4">
                            <label for="tipo_id" class="block font-medium text-sm text-gray-700">Tipo de
                                Solicitud</label>
                            <select class="form-select w-full rounded-md border-gray-300" name="tipo_id" id="tipo_id"
                                required>
                                <option value="">Seleccione</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="formularioEspecifico" class="space-y-4"></div>

                        <button type="submit" id="btnCrearSolicitud" class="btn" disabled>
                            <i class="bi bi-plus-circle me-2"></i> Crear Solicitud
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

<script>
    const tipoSelect = document.getElementById('tipo_id');
    const formularioEspecifico = document.getElementById('formularioEspecifico');
    const btnCrear = document.getElementById('btnCrearSolicitud');

    tipoSelect.addEventListener('change', async function () {
        const tipoID = this.value;
        btnCrear.disabled = true;
        formularioEspecifico.innerHTML = '<p class="text-gray-500 text-sm">Cargando campos específicos...</p>';

        if (tipoID) {
            try {
                const response = await fetch(`/formularios-solicitud/${tipoID}`);
                const html = await response.text();
                formularioEspecifico.innerHTML = html;
                btnCrear.disabled = false;

                if (html.includes('rol_destinatario')) {
                    inicializarFormularioReunion(); // Se llama después de que el HTML se carga
                }

                setTimeout(() => {
                    const fechaInput = document.getElementById('fecha_reunion');
                    if (fechaInput) {
                        const hoy = new Date();
                        hoy.setDate(hoy.getDate() + 2);
                        const yyyy = hoy.getFullYear();
                        const mm = String(hoy.getMonth() + 1).padStart(2, '0');
                        const dd = String(hoy.getDate()).padStart(2, '0');
                        fechaInput.min = `${yyyy}-${mm}-${dd}`;
                    }
                }, 100);
            } catch (error) {
                formularioEspecifico.innerHTML = '<p class="text-red-500 text-sm">Error al cargar el formulario.</p>';
            }
        } else {
            formularioEspecifico.innerHTML = '';
        }
    });

    function inicializarFormularioReunion() {
            const rolSelect = document.getElementById('rol_destinatario');
            const usuarioSelect = document.getElementById('destinatario_id');

            if (!rolSelect || !usuarioSelect) return;

            let fechasDisponibles = [];

            rolSelect.addEventListener('change', async () => {
                const rolId = rolSelect.value;
                usuarioSelect.innerHTML = '<option>Cargando...</option>';

                if (rolId) {
                    const res = await fetch(`/usuarios-por-rol/${rolId}`);
                    if (!res.ok) {
                        console.error('Error al obtener usuarios por rol');
                        usuarioSelect.innerHTML = '<option value="">Error al cargar</option>';
                        return;
                    }
                    const usuarios = await res.json();

                    usuarioSelect.innerHTML = '<option value="">Seleccione</option>';
                    usuarios.forEach(user => {
                        const opt = document.createElement('option');
                        opt.value = user.id;
                        opt.textContent = `${user.name} (${user.email})`;
                        usuarioSelect.appendChild(opt);
                    });
                }
            });

            usuarioSelect.addEventListener('change', async () => {
                const userId = usuarioSelect.value;
                const fechaInput = document.getElementById('fecha_reunion');
                const horaInput = document.getElementById('hora_reunion');

                if (!fechaInput || !horaInput) return;

                fechaInput.disabled = true;
                horaInput.disabled = true;
                horaInput.innerHTML = '';

                if (userId) {
                    const res = await fetch(`/disponibilidad-fechas/${userId}`);
                    if (!res.ok) {
                        console.error('Error al obtener fechas disponibles');
                        fechaInput.disabled = true;
                        horaInput.disabled = true;
                        usuarioSelect.value = '';
                        return;
                    }
                    fechasDisponibles = await res.json();

                    if (fechasDisponibles.length > 0) {
                        fechaInput.disabled = false;

                        fechaInput.addEventListener('input', async () => {
                            const seleccionada = fechaInput.value;
                            if (fechasDisponibles.includes(seleccionada)) {
                                horaInput.disabled = false;

                                const resHoras = await fetch('/horas-disponibles', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    },
                                    body: JSON.stringify({
                                        usuario_id: userId,
                                        fecha: seleccionada
                                    })
                                });
                                if (!resHoras.ok) {
                                    console.error('Error al obtener horas disponibles');
                                    horaInput.disabled = true;
                                    horaInput.innerHTML = '<option value="">Error</option>';
                                    return;
                                }

                                const horas = await resHoras.json();

                                horaInput.innerHTML = '<option value="">Seleccione</option>';
                                horas.forEach(h => {
                                    const opt = document.createElement('option');
                                    opt.value = h;
                                    opt.textContent = h;
                                    horaInput.appendChild(opt);
                                });
                            } else {
                                horaInput.disabled = true;
                                horaInput.innerHTML = '<option value="">Fuera del rango</option>';
                            }
                        });
                    } else {
                        fechaInput.disabled = true;
                        horaInput.disabled = true;
                        fechaInput.value = '';
                        horaInput.innerHTML = '<option>No hay fechas disponibles</option>';
                    }
                }
            });
        }
    </script>


</x-app-layout>
