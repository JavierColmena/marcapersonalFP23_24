<?php

namespace App\Http\Resources;

use App\Models\UserCompetencia;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return array_merge(parent::toArray($request), [
            'curriculo' => new CurriculoResource($this->curriculo),
            'idiomas' => $this->getIdiomasFromUser(),
            'actividades' => ActividadResource::collection($this->actividades),
            'proyectos' => ProyectoResource::collection($this->proyectos),
            'competencias' => CompetenciaResource::collection($this->competencias),
            'ciclos' => CicloResource::collection($this->ciclos),
        ]);
    }

    public function getIdiomasFromUser() {
      $array_idiomas = IdiomaResource::collection($this->idiomas)->resolve();

        $idiomasTransformados = array_map(function ($idioma) {
          if(array_key_exists('pivot', $idioma)) {
            $idioma['nivel'] = $idioma['pivot']['nivel'];
            $idioma['certificado'] = $idioma['pivot']['certificado'];
            unset($idioma['pivot']);
          }
          return $idioma;
        }, $array_idiomas);

        return $idiomasTransformados;
    }
}
