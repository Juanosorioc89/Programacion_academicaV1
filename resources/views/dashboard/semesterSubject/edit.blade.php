<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Programas') }}
        </h2>
    </x-slot>
<div class="container mt-5">
    <h1 class="mb-4">Editar Asignatura por semestre</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('semesterSubject.update', $semestersSubject->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_subject" class="form-label">Id Asignatura</label>
            <select name="id_subject" id="id_subject" class="form-control">
                @foreach($subject as $subject)
                    <option value="{{ $subject->id }}" {{ $subject->id == $semestersSubject->id_subject ? 'selected' : '' }}>{{ $subject->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_block" class="form-label">Id bloque</label>
            <select name="id_block" id="id_block" class="form-control">
                @foreach($block as $block)
                    <option value="{{ $block->id }}" {{ $block->id == $semestersSubject->id_block ? 'selected' : '' }}>{{ $block->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="students_number" class="form-label">Número de estudiantes</label>
            <input type="text" name="students_number" id="students_number" class="form-control" value="{{ $semestersSubject->students_number }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Registrar</button>
            <a href="{{url('dashboard/semesterSubject')}}" class="btn btn-secondary">Regresar</a>
        </div>
    </form>
</div>
</x-app-layout>
