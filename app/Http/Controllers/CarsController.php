<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\CarRequest;

class CarsController extends Controller
{

    private $request;

    public function __construct(CarRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carQuery = Car::query();
        if ($this->request->has('color')) {
            $carQuery->where('color', $this->request->input('color') );
        }
        return view('cars.index')
            ->with('cars',  $carQuery->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $car =  Car::create($this->request->all());

        return redirect('/')
            ->with('status', 'Car Successfully Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Car $car)
    {
        $car->update($this->request->all());

        return redirect('/')
            ->with('status', 'Car Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect('/')->with('status', 'Car Deleted!');
    }
}
