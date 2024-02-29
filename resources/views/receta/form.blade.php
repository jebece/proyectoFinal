<div class="container">
    <h1 class="fs-4 pt-3 text-center">{{$modo}} receta</h1>

    <div class="form-group">
        <label for="titulo" class="form-label">Nombre de la receta</label>
        <input type="text" name="titulo" id="titulo" value="{{ isset($receta->titulo)?$receta->titulo:''}}" class="form-control">
    </div>
    <div class="form-group mt-3">
        <label for="ingredientes" class="form-label">Ingredientes</label>
        <textarea name="ingredientes" id="ingredientes" value="{{isset($receta->ingredientes)?$receta->ingredientes:''}}" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group mt-3">
        <label for="pasos" class="form-label">Pasos a seguir</label>
        <textarea name="pasos" id="pasos" value="{{isset($receta->pasos)?$receta->pasos:''}}" class="form-control" rows="7"></textarea>
    </div>
    <div class="form-group mt-3">
        <label for="foto" class="form-label">Imagen de la receta</label><br>

        @if(isset($receta->foto))
        <div class="text-center mt-2">
            <img src="{{ asset('storage') . '/' . $receta->foto }}" class="img" alt="foto receta">
        </div>
        @endif
        <div class="d-flex justify-content-center">
            <input type="file" name="foto" id="foto" value="" class="form-control form-control-file mt-3 control">
        </div>
    </div>

    @if(count($errors)>0)
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="d-flex justify-content-center pt-3 pb-3">
        <input type="submit" value="{{$modo}}" class="btn btn-success">
        <a href="{{url('receta/')}}" class="btn btn-secondary ms-3">Volver</a>
    </div>
</div>