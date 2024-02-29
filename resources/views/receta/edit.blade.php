@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 bg-rosado rounded">
            <form action="{{ url('/receta/' . $receta->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                @include('receta.form', ['modo' => 'Modificar'])
            </form>
        </div>
    </div>
</div>
@endsection