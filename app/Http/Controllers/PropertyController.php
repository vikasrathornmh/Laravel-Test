<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Image;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $property = Property::with('PropertyType')->paginate(20); 
       return view('properties.index', ["property" => $property]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property_types = PropertyType::all();

        return view('properties.form', ["property"=> [], 'property_types' => $property_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        
        
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        if($files=$request->file('image_full')){  
            $name=time().$files->getClientOriginalName();  
            $files->move('propertyImages',$name);  
            $data['image_full']=asset('propertyImages/'.$name); 
            $destinationPath = public_path('/thumbnail');
            $imgFile = Image::make(public_path('propertyImages/'.$name));
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath .'/'.$name);
            $data['image_thumbnail']=asset('thumbnail/'.$name); 
            
        }
   
        Property::insert($data);
        return redirect()->route('property.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        if(!$property){
            abort(404);
        }
        $property_types = PropertyType::all();
        return view('properties.form', ["property"=> $property, 'property_types' => $property_types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        if($files=$request->file('image_full')){  
            $name=time().$files->getClientOriginalName();  
            $files->move('propertyImages',$name);  
            $data['image_full']=asset('propertyImages/'.$name); 
            $destinationPath = public_path('/thumbnail');
            $imgFile = Image::make(public_path('propertyImages/'.$name));
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath .'/'.$name);
            $data['image_thumbnail']=asset('thumbnail/'.$name); 
            
        } else {
            unset($data['image_full']);
        }
   
        $property->update($data);
        
        return redirect()->route('property.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        if(!$property){
            abort(404);
        }
        $property->delete();
        return redirect()->back();
    }
}
