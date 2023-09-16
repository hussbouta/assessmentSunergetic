<?php

namespace App\Classes;

use Exception;
use Illuminate\Support\Facades\Http;

class CustomerManager
{
    public static function getAll()
    {

        try {

            $url = config('api.url');
            $response = Http::withHeaders([
                'token' => config('api.token'),
            ])->get($url);

            return $response;

        } catch (Exception $e) {

            return $e->getMessage();
        }
    }

    public static function create(array $data)
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

            return $e->getMessage();

        }
    }

    public static function find(int $id)
    {
        try {

            $url = config('api.url') . $id;
            $response = Http::withHeaders([
                'token' => config('api.token'),
            ])->get($url);

            return $response;

        } catch (Exception $e) {

            return $e->getMessage();
        }
    }


    public static function update(array $data)
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

            return $e->getMessage();

        }
    }

    public static function destroy(int $id)
    {
        try {

            $url = config('api.url') . $id;
            $response = Http::withHeaders([
                'token' => config('api.token'),
            ])->delete($url);

            return $response;

        } catch (Exception $e) {

            return $e->getMessage();
        }
    }


}