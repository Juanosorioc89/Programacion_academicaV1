<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Profesores') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <h1>Crear Profesor</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('teacher.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="last_name">Apellido</label>
                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
            </div>
            <div class="mb-3">
                <label for="document_type" class="form-label">Tipo de Documento</label>
                <select class="form-control" id="document_type" name="document_type" required>
                    <option value="">Selecciona un tipo de documento</option>
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CE">Cédula de Extranjería</option>
                    <option value="PS">Pasaporte</option>
                    <option value="RC">Registro Civil</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_number">Número de Identificación</label>
                <input type="text" name="id_number" class="form-control" value="{{ old('id_number') }}" required>
            </div>
            <div class="form-group">
                <label for="personal_email">Correo Personal</label>
                <input type="email" name="personal_email" class="form-control" value="{{ old('personal_email') }}" required>
            </div>
            <div class="form-group">
                <label for="institutional_email">Correo Institucional</label>
                <input type="email" name="institutional_email" class="form-control" value="{{ old('institutional_email') }}" required>
            </div>
            <div class="form-group">
                <label for="adress">Dirección</label>
                <input type="text" name="adress" class="form-control" value="{{ old('adress') }}" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Teléfono</label>
                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
            </div>
            <div class="form-group">
                <label for="number_mobile">Móvil</label>
                <input type="text" name="number_mobile" class="form-control" value="{{ old('number_mobile') }}" required>
            </div>
            <div class="form-group">
                <label for="diplom">¿Tiene Diplomado?</label>
                <select name="diplom" class="form-control" required>
                    <option value="1" {{ old('diplom') == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('diplom') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_vinculation_type">Tipo de Vinculación</label>
                <select name="id_vinculation_type" class="form-control" required>
                    @foreach($TypeVinculation as $type)
                        <option value="{{ $type->id }}" {{ old('id_vinculation_type') == $type->id ? 'selected' : '' }}>
                            {{ $type->description }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
</x-app-layout>