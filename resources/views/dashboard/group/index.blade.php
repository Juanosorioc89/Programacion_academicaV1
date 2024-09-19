<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Grupos') }}
        </h2>
    </x-slot>
    <div class="container">
        
        <a href="{{ route('group.create') }}" class="btn btn-primary mb-3">Crear Grupo Manualmente</a>
        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#autoGenerateModal">Generar Grupos Automáticamente</button>
    
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <table class="table">
            <thead>
                <tr>
                    <th>Código del Grupo</th>
                    <th>Materia</th>
                    <th>Docente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $group->group_code }}</td>
                        
                        <!-- Verificar si semesterSubject y subject existen -->
                        <td>
                            @if ($group->semesterSubject && $group->semesterSubject->subject)
                                {{ $group->semesterSubject->subject->name_subject }}
                            @else
                                No asignado
                            @endif
                        </td>
        
                        <!-- Verificar si el teacher existe -->
                        <td>{{ $group->teacher ? $group->teacher->name : 'No asignado' }}</td>
                        
                        <td>
                            <a href="{{ route('group.edit', $group->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('group.destroy', $group->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        {{ $groups->links() }}
    
        <!-- Modal -->
        <div class="modal fade" id="autoGenerateModal" tabindex="-1" role="dialog" aria-labelledby="autoGenerateModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="autoGenerateModalLabel">Generar Grupos Automáticamente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('group.autoGenerate') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="program_id">Seleccione el Programa</label>
                                <select id="program_id" name="program_id" class="form-control" required>
                                    <option value="">Seleccione un programa</option>
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id }}">{{ $program->name_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="year">Año</label>
                                <select id="year" name="year" class="form-control" required>
                                    @for ($year = 2020; $year <= 2050; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="academic_semester">Semestre Académico</label>
                                <select id="academic_semester" name="academic_semester" class="form-control" required>
                                    <option value="1">Primer Semestre</option>
                                    <option value="2">Segundo Semestre</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Generar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>