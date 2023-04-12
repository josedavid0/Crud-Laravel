@extends('layout.template')

@section('title', 'Registrar Alumno | School')

@section('contenido')
<main>
    <div class="container py-4">
        <h2>Registrar Alumno</h2>

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          
        @endif

        <form action="{{ url('alumnos') }}" method="post">
        
            @csrf

            <div class="mb-3 row">
                <label for="matricula" class="col-sm-2 col-form-label">Matricula:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="matricula" id="matricula" value="{{ old('matricula') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha de Nacimiento:</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="grado" class="col-sm-2 col-form-label">Grado:</label>
                <div class="col-sm-5">

                    <select name="grado" id="grado" class="form-select" required>
                        <option value="">Seleccionar Grado:</option>
                        @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>        
                        @endforeach
                    </select>
                </div>
            </div>

            <a href="{{ url('alumnos') }}" class="btn btn-secondary">Regresar</a>

            <button type="submit" class="btn btn-success">Guardar</button>

        </form>

    </div>
</main>
@endsection

