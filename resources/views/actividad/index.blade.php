@extends('layouts.master')

@section('content')

<div class="row">

    @for ($i=0; $i<count($arrayActividades); $i++)

    <div classUcol- col-6-medium col-12-small">
        <section class="box">
            <a href="#" title="SleaY, CC BY 4.0 &lt;https://creativecommons.org/licenses/by/4.0&gt;, via Wikimedia Commons"><img width="250" alt="Curriculum-vitae-warning-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png"></a>
            <header>
                <h3>Docente {{ $arrayActividades[$i]['docente_id'] }}</h3>
            </header>
            <p>
                <a href="http://github.com/2DAW-CarlosIII/{{ $arrayActividades[$i]['insignia'] }}">
                    http://github.com/2DAW-CarlosIII/{{ $arrayActividades[$i]['insignia'] }}
                </a>
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\ActividadController::class, 'getShow'], ['id' => $i] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endfor

</div>
@endsection
