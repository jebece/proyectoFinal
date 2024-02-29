@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 bg-rosado rounded">
            <form action="{{url('/receta')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('receta.form', ['modo' => 'Insertar'])
            </form>
        </div>
    </div>
</div>
@endsection