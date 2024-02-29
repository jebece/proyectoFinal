@extends('layouts.app')
@section('content')
<div class="container">


  @if(Session::has('mensaje'))
  <div class="alert alert-success text-center">
    {{Session::get('mensaje')}}
  </div>
  @endif


  <a href="{{url('receta/create')}}" class="btn btn-success">Insertar nueva receta</a>
  <div class="d-flex flex-wrap">
    @foreach($recetas as $receta)
    <div class="card mt-4 me-4" style="width: 25rem;">
      <img src="{{ asset('storage') . '/' . $receta->foto }}" class="card-img-top img-fluid" alt="foto receta">
      <div class="card-body d-flex flex-column justify-content-between bg-rosado border-top-azul-linea">
        <a href="{{url('/receta/' . $receta->id . '/show')}}" class="text-decoration-none text-azul">
          <h5 class="card-title text-center fs-5 fw-bolder p-2 border-azul-linea rounded ">{{ $receta->titulo }}</h5>
        </a>
        <div class="w-100 d-flex justify-content-evenly">
          <a href="{{url('/receta/' . $receta->id . '/show')}}" class="btn btn-success"><i class="fa-solid fa-eye"></i> Ver más</a>
          <a href="{{url('/receta/' . $receta->id . '/edit')}}" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i> Modificar</a>
          <form action="{{ url('/receta/'. $receta->id)}}" method="post">
            @csrf
            {{method_field('DELETE')}}
            <button type="submit" onclick="return confirm('¿Quieres borrar la receta?')" value="Borrar" class="btn btn-danger">
              <i class="fas fa-trash"></i> Borrar
            </button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="d-flex justify-content-center mt-3">
    <div>
      {!! $recetas->links() !!}
    </div>
  </div>
</div>
@endsection