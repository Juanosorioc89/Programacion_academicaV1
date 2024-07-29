<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Proyección') }}
        </h2>
    </x-slot>
    <div class="container">
        
    
        <form action="{{ route('projection.update', $projection->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label for="program_id" class="form-label">Seleccione el Programa</label>
                <select id="program_id" name="program_id" class="form-control" >
                    <option value="">Seleccione un programa</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}" {{ $program->id == $projection->curriculum->program->id ? 'selected' : '' }}>{{ $program->name_program }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="year" class="form-label">Año</label>
                <select id="year" name="year" class="form-control" required>
                    @for ($year = 2020; $year <= 2050; $year++)
                        <option value="{{ $year }}" {{ $year == $projection->year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
            </div>
    
            <div class="mb-3">
                <label for="academic_semester" class="form-label">Semestre Académico</label>
                <select id="academic_semester" name="academic_semester" class="form-control" required>
                    <option value="1" {{ $projection->academic_semester == 1 ? 'selected' : '' }}>Primer Semestre</option>
                    <option value="2" {{ $projection->academic_semester == 2 ? 'selected' : '' }}>Segundo Semestre</option>
                </select>
            </div>
    
            <div id="semesterContainer" class="mb-3">
                <div class="mb-3">
                    <label>Semestre {{ $semester->semester_number }}</label>
                    <input type="hidden" name="semesters[{{ $semester->id }}][semester_number]" value="{{ $semester->semester_number }}">
                    <input type="number" name="semesters[{{ $semester->id }}][projected_students]" class="form-control" value="{{ $projection->projected_students }}" placeholder="Estudiantes Proyectados">
                </div>
            </div>
    
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('projection.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

</x-app-layout>