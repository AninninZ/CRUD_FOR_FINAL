<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crudModel;
use Illuminate\Support\Facades\Redirect;
class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user_data'] = crudModel::all();
        return view('home', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request -> input('name');
        $email = $request -> input('email');
        $address = $request -> input('address');
        $phone = $request -> input('phone');

        $user_data = new crudModel();

        $user_data -> user_name = $name;
        $user_data -> email = $email;
        $user_data -> address = $address;
        $user_data -> phone = $phone;
        $user_data -> save();

        return redirect::to('/crud');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request -> input('name');
        $email = $request -> input('email');
        $address = $request -> input('address');
        $phone = $request -> input('phone');

        $user_data = crudModel::find($id);

        $user_data -> user_name = $name;
        $user_data -> email = $email;
        $user_data -> address = $address;
        $user_data -> phone = $phone;
        $user_data -> save();

        return redirect::to('/crud');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_data = crudModel::find($id);

        $user_data -> delete();

        return redirect::to('/crud');
    }
}
