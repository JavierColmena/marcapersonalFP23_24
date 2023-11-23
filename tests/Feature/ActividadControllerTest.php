<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActividadControllerTest extends TestCase
{
    public function test_controladores(): void
    {

            $response = $this->get('/actividad');
            $arrayActividades = [
                [
                    1,2,3,4,5,6,7,8,9
                ]
            ];

            $response
            ->assertStatus(200)
            ->assertViewIs('actividad.index')
            ->assertSeeTextInOrder($arrayActividades, $escaped = true);

        /**
         * proyectos show test.
         */
            $response = $this->get("/actividad/show/1");

            $response
            ->assertStatus(200)
            ->assertViewIs('actividad.show')
            ->assertSeeText('2', $escaped = true);

            $response = $this->get("/catalog/show/2");

            $response
            ->assertSeeText('3', $escaped = true);

            $response = $this->get("/actividad/show/A");
            $response->assertNotFound();

        /**
         * proyectos create test.
         */
            $value = 'Añadir actividad';
            $response = $this->get('/actividad/create');

            $response
            ->assertStatus(200)
            ->assertViewIs('actividad.create')
            ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */
            $id = rand(0, 9);
            $value = "Modificar actividad";
            $response = $this->get("/actividad/edit/$id");

            $response
            ->assertStatus(200)
            ->assertViewIs('actividad.edit')
            ->assertSeeText($value, $escaped = true);

            $response = $this->get("/actividad/edit/A");
            $response->assertNotFound();

        /**
         * perfil test.
         */
            $id = rand(1, 10);
            $value = "Visualizar el currículo de $id";
            $response = $this->get("/perfil/$id");

            $response->assertStatus(200)->assertSeeText($value, $escaped = true);

            $value = "Visualizar el currículo propio";
            $response = $this->get("/perfil");

            $response->assertStatus(200)->assertSeeText($value, $escaped = true);

            $response = $this->get("/perfil/" . chr($id));
            $response->assertNotFound();
    }
}
