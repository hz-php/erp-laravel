<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();
        $paginator = Worker::paginate(10);
        return view('worker.index', compact('workers', 'paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = City::all();
        return view('worker.create', compact('city'));
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
        $middle_name = $request->input('middle_name');
        $surname = $request->input('surname');
        $phone = $request->input('phone');
        $city = $request->input('city');
        $scan_one = $request->file('image')->store('uploads', 'public');
        $scan_two = $request->file('image_2')->store('uploads', 'public');
        $scan_three = $request->file('image_3')->store('uploads', 'public');

        $item = new Worker();
        $item->name = $name;
        $item->middle_name = $middle_name;
        $item->surname = $surname;
        $item->phone = $phone;
        $item->city = $city;
        $item->scan_one = $scan_one;
        $item->scan_two = $scan_two;
        $item->scan_three = $scan_three;
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
        $worker = Worker::findOrFail($id);

        return view('worker.profile', compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::findOrFail($id);
        $cities = City::all();
        return view('worker.edit', compact('worker', 'cities'));
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
        $user = auth()->user();
        $name = $request->input('name');
        $middle_name = $request->input('middle_name');
        $surname = $request->input('surname');
        $phone = $request->input('phone');
        $city = $request->input('city');
        if (!empty($request->file('image'))) {
            $scan_one = $request->file('image')->store('uploads', 'public');
        } else {
            $scan_one = Worker::find($id)->scan_one;
        }
        if (!empty( $request->file('image_2'))) {
            $scan_two = $request->file('image_2')->store('uploads', 'public');
        } else {
            $scan_two = Worker::find($id)->scan_two;
        }
        if (!empty($request->file('image_3'))) {
            $scan_three = $request->file('image_3')->store('uploads', 'public');
        } else {
            $scan_three = Worker::find($id)->scan_three;
        }
        $item =  Worker::find($id);
        $item->name = $name;
        $item->middle_name = $middle_name;
        $item->surname = $surname;
        $item->phone = $phone;
        $item->city = $city;
        $item->scan_one = $scan_one;
        $item->scan_two = $scan_two ;
        $item->scan_three = $scan_three;
        $item->created_by_whom = $user->name;
        $item->update();
        return redirect(route('worker_show'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Worker::destroy($id);
        return redirect(route('worker_show'));
    }
}
