@extends('layouts.master')

@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Actualizar actividad
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{ action([App\Http\Controllers\ActividadController::class, 'getEdit'], ['id' => $id]) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="docente_id">Docente</label>
                            <input type="number" name="docente_id" id="docente_id" value={{$arrayActividades['docente_id']}}>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="insignia">Insignia</label>
                            https://marcapersonalFP.es/badge?v=u54uern
                            <input type="text" name="insignia" id="insignia" class="form-control" value={{$arrayActividades['insignia']}}>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar Actividad
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
