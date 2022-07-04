@extends('theme.base')

@section('content')

   <div class="container py-5 text-center">
        @if (isset($client))
            <h1>Editar clientes</h1>
        @else
            <h1>Crear clientes</h1>
        @endif
        
            @if (isset($client))
                <form action={{ route('client.update', $client) }} method="POST">
                @method('PUT')
            @else
                <form action="{{ route('client.store') }}" method="POST">
            @endif

            @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre del cliente" value={{ old('name') ?? @$client->name }}>
                    <p class="form-text">Escriba el nombre del cliente</p>
                    @error('name')
                    <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="due" class="form-label">Nombre</label>
                    <input type="number" name="due" class="form-control" placeholder="Deuda" step="0.001" value={{ old('due') ?? @$client->due }}>
                    <p class="form-text">Escriba la deuda</p>
                    @error('due')
                    <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="comments" class="form-label">Comentario</label>
                    <textarea name="comments" cols="30" rows="4" class="form-control" >{{ old('comments') ?? @$client->comments }}</textarea>
                    <p class="form-text">Escriba algunos comentarios</p>
                </div>
                
                @if (isset($client))
                    <button type="submit" class="btn btn-success">Editar Cliente</button>
                @else
                    <button type="submit" class="btn btn-success">Guardar Cliente</button>
                @endif
                
            </form>
   </div>
    
@endsection