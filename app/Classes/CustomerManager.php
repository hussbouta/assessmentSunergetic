<?php

namespace App\Classes;

use Exception;
use Illuminate\Support\Facades\Http;

class CustomerManager
{
    public static function getAll(): object
    {

        try {

            $url = config('api.url');
            $response = Http::withHeaders([
                'token' => config('api.token'),
            ])->get($url);
            
            return $response;
        } catch (Exception $e) {

            return (object) $e->getMessage();
        }
    }

    public static function create(array $data): object
    {
        $data = (object) $data;
        try {

            $url = config('api.url');
            $response = Http::withHeaders([
                'token' => config('api.token'),
            ])->post($url, [
                        'email' => $data->email,
                        'firstname' => $data->firstname,
                        'lastname' => $data->lastname,
                        'address' => $data->address,
                        'zipcode' => $data->zipcode,
                        'city' => $data->city,
                        'phone' => $data->phone,
                    ]);


            return $response;

        } catch (Exception $e) {

            return (object) $e->getMessage();

        }
    }

    public static function find(int $id): object
    {
        try {

            $url = config('api.url') . $id;
            $response = Http::withHeaders([
                'token' => config('api.token'),
            ])->get($url);

            return $response;

        } catch (Exception $e) {

            return (object) $e->getMessage();
        }
    }


    public static function update(array $data): object
    {
        $data = (object) $data;

        try {

            $url = config('api.url') . $data->id;
            $response = Http::withHeaders([
                'token' => config('api.token'),
            ])->put($url, [
                        'email' => $data->email,
                        'firstname' => $data->firstname,
                        'lastname' => $data->lastname,
                        'address' => $data->address,
                        'zipcode' => $data->zipcode,
                        'city' => $data->city,
                        'phone' => $data->phone,
                    ]);


            return $response;

        } catch (Exception $e) {

            return (object) $e->getMessage();

        }
    }

    public static function destroy(int $id): object
    {
        try {

            $url = config('api.url') . $id;
            $response = Http::withHeaders([
                'token' => config('api.token'),
            ])->delete($url);

            return $response;

        } catch (Exception $e) {

            return (object) $e->getMessage();
        }
    }


}