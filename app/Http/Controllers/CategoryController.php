<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Datatables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::all();
            return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('options', function($row){
                      $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm" hidden>View</a>';
                      $btn = $btn.
                      '<a href="'.route('categories.edit', $row->id).
                      '" class="edit btn btn-primary btn-sm">Edit</a>';
                      $btn = $btn.
                      "<form action=\"".route("categories.destroy", $row->id)."\" method=\"post\" class=\"d-inline\">
                            <input type=\"hidden\" name=\"_method\" value=\"delete\" >
                            <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\" >

                          <button class=\"btn btn-danger btn-sm\" onclick=\"return confirm('Are you sure?')\">Delete</button> 
                      </form>";
                    return $btn;
                   })
                   ->rawColumns(['options'])
                   ->make(true);
        }
        return view('admin.categories.index',[
            'active' => 'category'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', [
            'active' => 'category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('categories')->with('success', 'Category has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'active' => 'category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        Category::find($category->id)->update($request->all());
        return redirect('categories')->with('success', 'Category hasbeen updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('categories')->with('success','Category has been deleted!');
    }
}
