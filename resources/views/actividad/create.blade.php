@extends('layouts.master')

@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Añadir actividad
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{ url('/actividad/create') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="docente_id">Docente</label>
                            <input type="number" name="docente_id" id="docente_id">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="insignia">Insignia</label>
                            https://marcapersonalFP.es/badge?v=u54uern
                            <input type="text" name="insignia" id="insignia" class="form-control">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Añadir actividad
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
