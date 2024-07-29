<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyeciones Registradas') }}
        </h2>
    </x-slot>
    <div class="container">
        <a href="{{ route('projection.create') }}" class="btn btn-success mb-3">Agregar Nueva Proyección</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Programa</th>
                    <th>Semestre</th>
                    <th>Estudiantes Proyectados</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projections as $projection)
                    <tr>
                        <td>{{ $projection->curriculum->program->name_program }}</td>
                        <td>{{ $projection->semester }}</td>
                        <td>{{ $projection->projected_students }}</td>
                        <td>{{ $projection->year }}</td>
                        <td>
                            <a href="{{ route('projection.show', $projection->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('projection.edit', $projection->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('projection.destroy', $projection->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de querer eliminar esta proyección?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $projections->links() }} <!-- Paginación -->
    </div>
</x-app-layout>