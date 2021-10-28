<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware('auth')->only(['destroy', 'create', 'update', 'store']);
     }

    public function index()
    {
        $cars = Car::latest()->paginate(10);
        return view('cars.index', ['cars' => $cars]);
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
    public function store(Request $request)
    {
        $this->validate($request, [
                'cop'=>'required', 
                'name'=>'required',
                'year'=>'required',
                'price'=>'required',
                'type'=>'required',
                'form'=>'required',
                'image'=>'required'
            ]);

            $fileName = null;
        
            $fileName =  time().'_'.$request->file('image')->getClientOriginalName();
    
            $request->file('image')->storeAs('public/images', $fileName);

            $input = $request->all();

            
            $input = array_merge($input, ["image" => $fileName ]);
            
            

            Car::create($input);

            return redirect()->route('cars.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = car::find($id);
        // 그 놈을 상세보기 뷰로 전달한다.
        return view('cars.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    

        return view('cars.edit', ['car' => Car::find($id)]);
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
        $this->validate($request, [
            'cop'=>'required', 
            'name'=>'required',
            'year'=>'required',
            'price'=>'required',
            'type'=>'required',
            'form'=>'required'
        ]);

        $car = Car::find($id);

        $car -> cop = $request -> cop;
        $car -> name = $request -> name;
        $car -> year = $request -> year;
        $car -> price = $request -> price;
        $car -> type = $request -> type;
        $car -> form = $request -> form;
        
        Storage::delete('public/images/'.$car->image);     
        $fileName = null;
        if($request->file('image')) {
            $fileName =  time().'_'.$request->file('image')->getClientOriginalName();
            $car -> image = $fileName;
            $request->file('image')->storeAs('public/images', $fileName);
        } else {
            $car -> image = $car -> image;
        }
        
        $car->save();
        

        return redirect()->route('cars.show', ['car' => $car->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        
        Storage::delete('public/images/'.$car->image);

        $car ->delete();

        return redirect()->route('cars.index');
    }
}
