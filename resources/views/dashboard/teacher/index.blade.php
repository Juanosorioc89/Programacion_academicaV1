<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Profesores') }}
        </h2>
    </x-slot>
    <div class="container">
        <a href="{{ route('teacher.create')}}" class="btn btn-primary">Nuevo Docente</a>
        <h1 class="mt-5">Lista de Profesores</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Identificación</th>
                    <th>Diplomado</th>
                    <th>Tipo de Vinculación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->last_name }}</td>
                    <td>{{ $teacher->document_type }}</td>
                    <td>{{ $teacher->id_number }}</td>
                    <td>{{ $teacher->diplom ? 'Sí' : 'No' }}</td>
                    <td>{{ $teacher->type_vinculation->description }}</td>
                    <td>
                        <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-info btn-sm">Detalle</a>
                        <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este profesor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>