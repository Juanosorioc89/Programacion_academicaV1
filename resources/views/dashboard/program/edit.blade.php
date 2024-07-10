<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Programas') }}
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
    <form action="{{ route('program.update', $program->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name_program" class="form-label">Nombre programa</label>
            <input type="text" name="name_program" id="name_program" class="form-control" value="{{ $program->name_program }}">
        </div>
        <div class="mb-3">
            <label for="program_code" class="form-label">Código programa</label>
            <input type="text" name="program_code" id="program_code" class="form-control" value="{{ $program->program_code }}">
        </div>
        <div class="mb-3">
            <label for="id_faculty" class="form-label">Faculty</label>
            <select name="id_faculty" id="id_faculty" class="form-control">
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}" {{ $faculty->id == $program->id_faculty ? 'selected' : '' }}>{{ $faculty->name_program }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_program_type" class="form-label">Program Type</label>
            <select name="id_program_type" id="id_program_type" class="form-control">
                @foreach($programTypes as $programType)
                    <option value="{{ $programType->id }}" {{ $programType->id == $program->id_program_type ? 'selected' : '' }}>{{ $programType->name_program_type }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Registrar</button>
            <a href="{{url('dashboard/program')}}" class="btn btn-secondary">Regresar</a>
        </div>
    </form>
</div>
</x-app-layout>
