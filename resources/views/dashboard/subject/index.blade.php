<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Asignaturas') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <a href="{{ route('subject.create')}}" class="btn btn-primary">Nueva asignatura</a>
        <h1 class="mt-5">Lista de Asignaturas</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Asignatura</th>
                    <th>Créditos asignatura</th>
                    <th>Numero de semestre</th>
                    <th>Código Asignatura</th>
                    <th>Area</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name_subject }}</td>
                    <td>{{ $subject->subject_credit }}</td>
                    <td>{{ $subject->curriculumSemester->semester_number }}</td>
                    <td>{{ $subject->subject_code }}</td> 
                    <td>{{ $subject->area->description_area }}</td>
                    <td>
                        <a href="{{ route('subject.show', $subject->id) }}" class="btn btn-info btn-sm">Detalle</a>
                        <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" style="display:inline-block;">
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