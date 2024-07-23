<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de asignaturas por semestres') }}
        </h2>
    </x-slot>
    <div class="container">
        <a href="{{ route('semesterSubject.create')}}" class="btn btn-primary">Nuevo semestre</a>
        <h1 class="mt-5">Lista de semestres</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id Asignatura</th>
                    <th>Id bloque</th>
                    <th>Cantidad de estudiantes</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($semestersSubject as $semesterSubject)
                <tr>
                    <td>{{ $semesterSubject->id}}</td>
                    <td>{{ $semesterSubject->subject->id }}</td>
                    <td>{{ $semesterSubject->block->id }}</td>
                    <td>{{ $semesterSubject->students_number }}</td>
                    <td>
                        <a href="{{ route('semesterSubject.show', $semesterSubject->id) }}" class="btn btn-info btn-sm">Detalle</a>
                        <a href="{{ route('semesterSubject.edit', $semesterSubject->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('semesterSubject.destroy', $semesterSubject->id) }}" method="POST" style="display:inline-block;">
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

