<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Profesores') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Detalles del Docente</h1>

        <div class="card">
            <div class="card-header">
                <h2>{{ $teacher->name }} {{ $teacher->last_name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Tipo de Documento:</strong> {{ $teacher->document_type }}</p>
                <p><strong>Número de Documento:</strong> {{ $teacher->id_number }}</p>
                <p><strong>Email Personal:</strong> {{ $teacher->personal_email }}</p>
                <p><strong>Email Institucional:</strong> {{ $teacher->institutional_email }}</p>
                <p><strong>Dirección:</strong> {{ $teacher->adress }}</p>
                <p><strong>Teléfono:</strong> {{ $teacher->phone_number }}</p>
                <p><strong>Teléfono Móvil:</strong> {{ $teacher->number_mobile }}</p>
                <p><strong>Título:</strong> {{ $teacher->diplom ? 'Sí' : 'No' }}</p>
                <p><strong>Tipo de Vinculación:</strong> {{ $teacher->type_vinculation->description }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('teacher.index') }}" class="btn btn-primary">Volver a la lista</a>
                <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>