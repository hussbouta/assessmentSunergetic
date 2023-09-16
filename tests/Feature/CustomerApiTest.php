<?php

namespace Tests\Feature;

use Tests\TestCase;

class CustomerApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAll()
    {
        $response = $this->getJson('/customers');

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }

    public function testStore()
    {

        $data = [
            "email" => "email@example.com",
            "firstname" => "John",
            "lastname" => "Doe",
            "address" => "Vermeulenbaan 178 13329VJ Zuidwolde",
            "zipcode" => "1822LB",
            "city" => "Alkmaar",
            "phone" => "+31675399935"
        ];
        $response = $this->postJson('/customers', $data);

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }

    public function testUpdate()
    {
        $response = $this->putJson('/customers', ['id' => $id]);
        $data = [
            "email" => "email@example.com",
            "firstname" => "John",
            "lastname" => "Doe",
            "address" => "Vermeulenbaan 178 13329VJ Zuidwolde",
            "zipcode" => "1822LB",
            "city" => "Alkmaar",
            "phone" => "+31675399935"
        ];

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }

    public function testShow()
    {
        $response = $this->getJson('/customers', ['id' => $id]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }

    public function testDestroy()
    {
        $response = $this->deleteJson('/customers', ['id' => $id]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }
}
