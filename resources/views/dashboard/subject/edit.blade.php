<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Asignaturas') }}
        </h2>
    </x-slot>
<div class="container mt-5">
    <h1 class="mb-4">Editar Programa</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('subject.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="subject_name" class="form-label">Nombre Asignatura</label>
            <input type="text" name="name_subject" id="name_subject" class="form-control" value="{{ $subject->name_subject }}">
        </div>
        <div class="mb-3">
            <label for="subject_credit" class="form-label">Créditos Asignatura</label>
            <input type="text" name="subject_credit" id="subject_credit" class="form-control" value="{{ $subject->subject_credit }}">
        </div>
        <div class="mb-3">
            <label for="subject_code" class="form-label">Código Asigntaura</label>
            <input type="text" name="subject_code" id="subject_code" class="form-control" value="{{ $subject->subject_code }}">
        </div>
        <div class="mb-3">
            <label for="id_area" class="form-label">Area</label>
            <select name="id_area" id="id_area" class="form-control">
                @foreach($area as $area)
                    <option value="{{ $area->id }}" {{ $area->id == $subject->id_area ? 'selected' : '' }}>{{ $area->description_area }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_curriculum_semester" class="form-label">Numero de semestres</label>
            <select name="id_curriculum_semester" id="id_curriculum_semester" class="form-control">
                @foreach($curriculumSemester as $curriculumSemester)
                    <option value="{{ $curriculumSemester->id }}" {{ $curriculumSemester->id == $subject->curriculumSemester->id ? 'selected' : '' }}>{{ $curriculumSemester->semester_number }}</option>
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
