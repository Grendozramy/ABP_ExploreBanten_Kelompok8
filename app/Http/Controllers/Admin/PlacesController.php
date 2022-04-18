<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PlaceRequest;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::with('category')->get();
        $places = Place::latest()->paginate(5);
      
        return view('pages.admin.place.index',compact('places'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.place.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaceRequest $request)
    {
        //create place
        $place = Place::create([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title, '-'),
            'user_id'       => auth()->user()->id,
            'category_id'   => $request->category_id,
            'excerpt'       => Str::limit(strip_tags($request->description), 150),
            'description'   => $request->description,
            'phone'         => $request->phone,
            'website'       => $request->website,
            'office_hours'  => $request->office_hours,
            'address'       => $request->address,
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
            'location'     =>  $request->location,
        ]);

        //check request file
        if($request->hasFile('image')) {
            
            //get request file image
            $images = $request->file('image');
            
            //loop file image
            foreach($images as $image) {
                
                //move to storage folder
                $image->storeAs('public/places', $image->hashName());

                //insert database
                $place->images()->create([
                    'image'     => $image->hashName(),
                    'place_id'  => $place->id
                ]);

            }
        }

        return redirect()->route('place.index')->with('success','Places Berhasil dibuat');
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
        $item = Place::findOrFail($id);
        $categories = Category::all();
        return view('pages.admin.place.edit',  compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {   
        // Rule::unique('places')->withoutTrashed()
        $request->validate([
            'title'     => 'required', Rule::unique('places,title')->withoutTrashed(),
            'category_id'   => 'required',
            'description'   => 'required',
            'phone'         => 'required',
            'website'       => 'required',
            'office_hours'  => 'required',
            'address'       => 'required',
            'latitude'      => 'required',
            'longitude'     => 'required',
            'location'     =>  'required',
            
        ]);
        //update place
        $place->update([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title, '-'),
            'user_id'       => auth()->user()->id,
            'category_id'   => $request->category_id,
            'excerpt'       => Str::limit($request->description, 150),
            'description'   => $request->description,
            'phone'         => $request->phone,
            'website'       => $request->website,
            'office_hours'  => $request->office_hours,
            'address'       => $request->address,
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
            'location'     =>  $request->location,
        ]);

        //check request file
        if($request->hasFile('image')) {
            
            //get request file image
            $images = $request->file('image');
            
            //loop file image
            foreach($images as $image) {
                
                //move to storage folder
                $image->storeAs('public/places', $image->hashName());

                //insert database
                $place->images()->create([
                    'image'     => $image->hashName(),
                    'place_id'  => $place->id
                ]);
            }
        }    

        return redirect()->route('place.index')->with('success','Places Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find place by ID
        $place = Place::findOrFail($id);

        //loop image from relationship
        foreach($place->images()->get() as $image) {
            
            //remove image
            Storage::disk('local')->delete('public/places/'.basename($image->image));

            //remove child relation
            $image->delete();

        }
        if($place->delete()) {
            return redirect()->route('place.index')->with('success','Places Berhasil dihapus');
        }
        
    }
}
