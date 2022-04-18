<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
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
        $data = $request->all();
        //upload image
        $data['image'] = $request->file('image');
        $data['image']->storeAs('public/sliders', $data['image']->hashName());

        Slider::create([
            'image'=> $data['image']->hashName(),
            'user_id'   => auth()->user()->id,
            'title' => $request->title,
            'title2' => $request->title2,
        ]);
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

        //check image update
        if ($request->file('image')) {
            
            //remove old image
            Storage::disk('local')->delete('public/sliders/'.basename($slider->image));
        
            //upload image
            $data['image'] = $request->file('image');
            $data['image']->storeAs('public/sliders', $data['image']->hashName());
            
            $slider->update([
            'image'=> $data['image']->hashName(),
            'user_id'   => auth()->user()->id,
            'title' => $request->title,
            'title2' => $request->title2,
            ]);
        }

         //update category without image
         $slider->update([
            'user_id'   => auth()->user()->id,
            'title' => $request->title,
            'title2' => $request->title2,
        ]);
        return redirect()->route('slider.index')->with('success','Slider Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //remove image
        Storage::disk('local')->delete('public/sliders/'.basename($slider->image));
        $slider -> delete();
        return redirect()->route('slider.index')->with('success','Slider Berhasil dihapus');;
    }
}
