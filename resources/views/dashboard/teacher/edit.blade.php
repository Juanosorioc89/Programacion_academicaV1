<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Profesores') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Editar Docente</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $teacher->name) }}" required>
            </div>

            <div class="form-group">
                <label for="last_name">Apellido</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $teacher->last_name) }}" required>
            </div>

            <div class="form-group">
                <label for="document_type">Tipo de Documento</label>
                <select name="document_type" id="document_type" class="form-control">
                    <option value="Cédula de Ciudadanía" {{ old('document_type', $teacher->document_type) == 'Cédula de Ciudadanía' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                    <option value="Cédula de Extranjería" {{ old('document_type', $teacher->document_type) == 'Cédula de Extranjería' ? 'selected' : '' }}>Cédula de Extranjería</option>
                    <option value="Pasaporte" {{ old('document_type', $teacher->document_type) == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                    <option value="Tarjeta de Identidad" {{ old('document_type', $teacher->document_type) == 'Tarjeta de Identidad' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id_number">Número de Documento</label>
                <input type="text" name="id_number" id="id_number" class="form-control" value="{{ old('id_number', $teacher->id_number) }}" required>
            </div>

            <div class="form-group">
                <label for="personal_email">Email Personal</label>
                <input type="email" name="personal_email" id="personal_email" class="form-control" value="{{ old('personal_email', $teacher->personal_email) }}" required>
            </div>

            <div class="form-group">
                <label for="institutional_email">Email Institucional</label>
                <input type="email" name="institutional_email" id="institutional_email" class="form-control" value="{{ old('institutional_email', $teacher->institutional_email) }}" required>
            </div>

            <div class="form-group">
                <label for="adress">Dirección</label>
                <input type="text" name="adress" id="adress" class="form-control" value="{{ old('adress', $teacher->adress) }}" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Teléfono</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $teacher->phone_number) }}" required>
            </div>

            <div class="form-group">
                <label for="number_mobile">Teléfono Móvil</label>
                <input type="text" name="number_mobile" id="number_mobile" class="form-control" value="{{ old('number_mobile', $teacher->number_mobile) }}" required>
            </div>

            <div class="form-group">
                <label for="diplom">¿Tiene Diplomado?</label>
                <select name="diplom" id="diplom" class="form-control">
                    <option value="1" {{ old('diplom', $teacher->diplom) == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('diplom', $teacher->diplom) == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id_vinculation_type">Tipo de Vinculación</label>
                <select name="id_vinculation_type" id="id_vinculation_type" class="form-control">
                    @foreach($Type_Vinculation as $type)
                        <option value="{{ $type->id }}" {{ old('id_vinculation_type', $teacher->id_vinculation_type) == $type->id ? 'selected' : '' }}>{{ $type->description }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</x-app-layout>