<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $cats = Category::orderBy('created_at','DESC')->get();
            // For testing error handling $cats->load(['hello']);
            return view('admin.cats.index',compact('cats'));
        }
        catch(RelationNotFoundException $exception){
            return view('error.relationerror');
        }
        catch(\Exception $exception){
            //dd(get_class($exception));
            return view('error.err');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name' => 'required|min:2|max:50|unique:categories'
        ]);
        $cats = new Category();
        $cats->name = $request->name;
        $cats->save();

        flash('Category created successfully')->success();
        return back();
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
        $cat = Category::findOrFail($id);
        return view('admin.cats.edit',compact('cat'));
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
        $this->validate($request,[
            'name' => 'required|min:2|max:50|unique:categories,name,'.$id
        ]);
        $cat = Category::findOrFail($id);
        $cat->name = $request->name;
        $cat->save();

        flash('Category updated successfully')->success();
        return redirect()->route('cats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
        $cat->delete();
        flash('Category deleted successfully')->success();
        return redirect()->route('cats.index');
    }
}
