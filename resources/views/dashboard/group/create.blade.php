<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Grupo Manualmente') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Crear Grupo Manualmente</h1>
    
        <form action="{{ route('group.store') }}" method="POST">
            @csrf
    
            <div class="mb-3">
                <label for="group_code" class="form-label">Código del Grupo</label>
                <input type="text" name="group_code" id="group_code" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="id_semester_subject" class="form-label">Materia</label>
                <select id="id_semester_subject" name="id_semester_subject" class="form-control" required>
                    <option value="">Seleccione una materia</option>
                    @foreach ($semesterSubjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject->name_subject }} ({{ $subject->id_block }})</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="id_teacher" class="form-label">Docente</label>
                <select id="id_teacher" name="id_teacher" class="form-control">
                    <option value="">Seleccione un docente</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->last_name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Crear Grupo</button>
                <a href="{{ route('group.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>