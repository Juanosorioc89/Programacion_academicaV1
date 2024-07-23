<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de semestres por asignatura') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <h1>Crear semestre por asignatura</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('semesterSubject.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_subject" class="form-label">subject</label>
                <select name="id_subject" id="id_subject" class="form-control">
                    @foreach($subject as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name_subject }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_block" class="form-label">bloque</label>
                <select name="id_block" id="id_block" class="form-control">
                    @foreach($block as $block)
                        <option value="{{ $block->id }}">{{ $block->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="students_number" class="form-label">Código Asignatura</label>
                <input type="text" name="students_number" id="students_number" class="form-control" value="{{ old('students_number') }}">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
</x-app-layout>