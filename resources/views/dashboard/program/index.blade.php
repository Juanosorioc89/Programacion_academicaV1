<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Programas') }}
        </h2>
    </x-slot>
<div class="container mt-5">
    <a href="{{ url('dashboard/program/create')}}">Nuevo programa</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Nivel</th>
                <th>Facultad</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
            <tr>
                <td>{{ $program->id }}</td>
                <td>{{ $program->name_program }}</td>
                <td>{{ $program->program_code }}</td>
                <td>{{ $program->programType->name_program_type }}</td>
                <td>{{ $program->faculty->name_program }}</td>                
                <td>
                    <a href="{{ route('program.show', $program->id) }}" class="btn btn-info btn-sm">Detalle</a>
                    <a href="{{ route('program.edit', $program->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form id="deleteForm" action="{{ route('program.destroy',$program->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete()" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    
                    <script>
                        function confirmDelete() {
                            if (confirm('¿Estás seguro de que deseas eliminar este programa?')) {
                                document.getElementById('deleteForm').submit();
                            }
                        }
                    </script>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

</x-app-layout>

