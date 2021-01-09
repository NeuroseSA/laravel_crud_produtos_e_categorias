<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cli = Client::all();
        return view("client.index", compact('cli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("client.newclient");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'age' => 'required',
            'address' => 'required|min:4',
            'email' => 'required|unique:Clients'
        ],[
            'name.required' => 'Nome do cliente é obrigatório',
            'age.required' => 'Idade do cliente é obrigatório',
            'address.required' => 'Endereço do cliente é obrigatório',
            'email.required' => 'E-mail do cliente é obrigatório',
            'email.unique' => 'E-mail já cadastrado',
        ]); 

        try {
            $cli = new Client();
            $cli->name = $request->input("name");
            $cli->age = $request->input("age");
            $cli->address = $request->input("address");
            $cli->email = $request->input("email");
            $cli->save();
            return redirect(route('client'));
        } catch (\Throwable $th) {
            return redirect(route('client'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cli = Client::find($id);
        if (isset($cli)) {
            return view('client.editclient', compact('cli'));
        } else {
            return redirect(route('client'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cli = Client::find($id);
        if ($cli->email == $request->email) {
            $request->validate([
                'name' => 'required|min:4',
                'age' => 'required',
                'address' => 'required|min:4'
            ],[
                'name.required' => 'Nome do cliente é obrigatório',
                'age.required' => 'Idade do cliente é obrigatório',
                'address.required' => 'Endereço do cliente é obrigatório',
                'email.required' => 'E-mail do cliente é obrigatório',
                'email.unique' => 'E-mail já cadastrado',
            ]); 
        } else {
            $request->validate([
                'name' => 'required|min:4',
                'age' => 'required',
                'address' => 'required|min:4',
                'email' => 'required|unique:Clients'
            ],[
                'name.required' => 'Nome do cliente é obrigatório',
                'age.required' => 'Idade do cliente é obrigatório',
                'address.required' => 'Endereço do cliente é obrigatório',
                'email.required' => 'E-mail do cliente é obrigatório',
                'email.unique' => 'E-mail já cadastrado',
            ]); 
        }
        try {
            if (isset($cli)) {
                $cli->name = $request->input("name");
                $cli->age = $request->input("age");
                $cli->address = $request->input("address");
                $cli->email = $request->input("email");
                $cli->save();
            }
            return redirect(route('client'));
        } catch (\Throwable $th) {
            return redirect(route('client'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cli = Client::find($id);
        if (isset($cli)) {
            $cli->delete();
        }
        return redirect(route('client'));
    }
}
