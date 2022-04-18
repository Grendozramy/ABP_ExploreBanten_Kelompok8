<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
      
        return view('pages.admin.category.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        //upload image
        $data['image'] = $request->file('image');
        $data['image']->storeAs('public/categories', $data['image']->hashName());

        Category::create([
            'image'=> $data['image']->hashName(),
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('category.index')->with('success','Category Berhasil dibuat');
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
        $item = Category::findOrFail($id);
        return view('pages.admin.category.edit',  compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'     => 'required', Rule::unique('categories')->withoutTrashed(),
            'title'     => 'required',
            'description'     => 'required',
        ]);
        //check image update
        if ($request->file('image')) {
            
            //remove old image
            Storage::disk('local')->delete('public/categories/'.basename($category->image));
        
            //upload image
            $data['image'] = $request->file('image');
            $data['image']->storeAs('public/categories', $data['image']->hashName());

            $category->update([
                'image'=> $data['image']->hashName(),
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        //update category without image
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('category.index')->with('success','Category Berhasil diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //remove image
        Storage::disk('local')->delete('public/categories/'.basename($category->image));
        $category -> delete();
        return redirect()->route('category.index')->with('success','Category Berhasil dihapus');
    }
}
