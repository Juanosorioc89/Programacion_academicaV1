<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Asignaturas') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <h1 class="mb-4">Create Subject</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('subject.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="subject_name" class="form-label">Nombre Asignatura</label>
                <input type="text" name="subject_name" id="subject_name" class="form-control" value="{{ old('subject_name') }}">
            </div>
            <div class="mb-3">
                <label for="subject_credits" class="form-label">Créditos Asignatura</label>
                <input type="text" name="subject_credits" id="subject_credits" class="form-control" value="{{ old('subject_credits') }}">
            </div>
            <div class="mb-3">
                <label for="subject_code" class="form-label">Código Asignatura</label>
                <input type="text" name="subject_code" id="subject_code" class="form-control" value="{{ old('subject_code') }}">
            </div>
            <div class="mb-3">
                <label for="id_area" class="form-label">Area</label>
                <select name="id_area" id="id_area" class="form-control">
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->description_area }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_curriculum_semester" class="form-label">Número de semestre</label>
                <select name="id_curriculum_semester" id="id_curriculum_semester" class="form-control">
                    @foreach($curriculumsSemester as $curriculumSemester)
                        <option value="{{ $curriculumSemester->id }}">{{ $curriculumSemester->semester_number }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="{{url('dashboard/subject')}}" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
