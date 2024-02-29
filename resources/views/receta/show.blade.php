@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <a href="{{url('receta/')}}" class="btn btn-success">Volver</a>
      <div class="card my-4 me-4 bg-rosado" style="width: 100%;">
        <div class="text-center pt-3 bg-rosado">
          <img src="{{ asset('storage') . '/' . $receta->foto }}" class="card-img-top img-fluid" alt="foto receta" style="max-width: 500px;">
        </div>
        <div class="card-body d-flex flex-column justify-content-between  bg-rosado">
          <h5 class="card-title text-center fs-5 fw-bolder p-2 fw-bolder border-azul-linea rounded text-azul">{{ $receta->titulo }}</h5>
          <div class="container">
            <div class="row">
              <div class="col-lg-10 offset-lg-1 mt-3 p-3 border-azul-linea rounded">
                <p class="text-decoration-underline fw-bolder text-azul">Ingredientes</p>
                <ul>
                  @foreach($ingredientes as $indice => $ingrediente)
                  @if($indice < count($ingredientes) - 1) <li class="card-text fs-6 text-azul">{{ $ingrediente }}.</li>
                    @endif
                    @endforeach
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-10 offset-lg-1 mt-3 p-3 border-azul-linea rounded">
                <p class="text-decoration-underline fw-bolder text-azul">Preparación</p>
                <ul>
                  @foreach($pasos as $indice => $paso)
                  @if($indice < count($pasos) - 1) <li class="card-text fs-6 text-azul numerada">{{ $paso }}.</li>
                    @endif
                    @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection