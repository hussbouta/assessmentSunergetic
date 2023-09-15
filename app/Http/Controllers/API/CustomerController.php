<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Classes\CustomerManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerPostRequest;

class CustomerController extends Controller
{

    /**
     * Resturn list of all customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomerManager::getAll();
    }


    /**
     * Store new customer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerPostRequest $request)
    {
        return CustomerManager::create($request->all());
    }


        /**
     * Update  customer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerPostRequest $request)
    {
        return CustomerManager::update($request->all());
    }


    /**
     * Display a specified customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return CustomerManager::find($id);
    }


    /**
     * Remove specified customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        return CustomerManager::destroy($id);
    }
}
