<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\SliderRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(5);
      
        return view('pages.admin.slider.index',compact('sliders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request )
    {

        //create slider
        $slide = Slider::create([
            'user_id'   => auth()->user()->id,
            'title' => $request->title,
            'title2' => $request->title2,
        ]);

        //check request file
        if($request->hasFile('image')) {
            
            //get request file image
            $images = $request->file('image');
            
            //loop file image
            foreach($images as $image) {
                
                //move to storage folder
                $image->storeAs('public/sliders', $image->hashName());

                //insert database
                $slide->images()->create([
                    'image'     => $image->hashName(),
                    'slider_id'  => $slide->id
                ]);

            }
        }
        return redirect()->route('slider.index')->with('success','Slider Berhasil dibuat');
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
        $item = Slider::findOrFail($id);
        return view('pages.admin.slider.edit',  compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {   
        
        $request->validate([
            'title'     => 'required',
            'title2'     => 'required',
            
        ]);
        //update slider
        $slider->update([
            'user_id'   => auth()->user()->id,
            'title' => $request->title,
            'title2' => $request->title2,
        ]);

        //check request file
        if($request->hasFile('image')) {
            
            //get request file image
            $images = $request->file('image');
            
            //loop file image
            foreach($images as $image) {
                
                //move to storage folder
                $image->storeAs('public/sliders', $image->hashName());

                //insert database
                $slider->images()->update([
                    'image'     => $image->hashName(),
                    'slider_id'  => $slider->id
                ]);
            }
        }    
        return redirect()->route('slider.index')->with('success','Slider Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find slider by ID
        $slider = Slider::findOrFail($id);

        //loop image from relationship
        foreach($slider->images()->get() as $image) {
            
            //remove image
            Storage::disk('local')->delete('public/sliders/'.basename($image->image));

            //remove child relation
            $image->delete();

        }
        if($slider->delete()) {
            return redirect()->route('slider.index')->with('success','slider Berhasil dihapus');
        }
        
    }
    //     //remove image
    //     Storage::disk('local')->delete('public/sliders/'.basename($slider->image));
    //     $slider -> delete();
    //     return redirect()->route('slider.index')->with('success','Slider Berhasil dihapus');;
    // }
}
