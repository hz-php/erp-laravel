<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::all();
        $paginator = Clients::paginate(10);

        return view('clients.index', compact('clients', 'paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = City::all();
        return view('clients.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $name = $request->input('name');
        $adress = $request->input('adress');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = $request->input('city');

        $item = new Clients();
        $item->name = $name;
        $item->adress = $adress;
        $item->email = $email;
        $item->phone = $phone;
        $item->city = $city;
        $item->created_by_whom = $user->name;
        if ($item->save()) {
            $result = redirect(route('worker_show'));
        } else {
            $result = back()
                ->withErrors(['msg' => 'Что то пошло не так'])
                ->withInput();
        }
        return $result;
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
        $client = Clients::findOrFail($id);
        $cities = City::all();

        return view('clients.edit', compact('client', 'cities'));
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
        $client = Clients::find($id);
        $clientr->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->role = $request->role;

        $user->update();
        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
