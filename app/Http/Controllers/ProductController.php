<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Datatables;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::all();
            return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('options', function($row){
                      $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm" hidden>View</a>';
                      $btn = $btn.
                      '<a href="'.route('products.edit', $row->id).
                      '" class="edit btn btn-primary btn-sm">Edit</a>';
                      $btn = $btn.
                      "<form action=\"".route("products.destroy", $row->id)."\" method=\"post\" class=\"d-inline\">
                            <input type=\"hidden\" name=\"_method\" value=\"delete\" >
                            <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\" >

                          <button class=\"btn btn-danger btn-sm\" onclick=\"return confirm('Are you sure?')\">Delete</button> 
                      </form>";
                    return $btn;
                   })
                   ->rawColumns(['options'])
                   ->make(true);
        }
  
        return view('admin.products.index', [
            'active' => 'product',
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.products.create',  [
            'active' => 'products',
            'categories' => $categories,
            'suppliers' => $suppliers

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        
        Product::create($request->all());
        return redirect('products')->with('success', 'Products has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.products.edit',  [
            'active' => 'products',
            'product' => $product,
            'categories' => $categories,
            'suppliers' => $suppliers,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        Product::find($product->id)->update($request->all());
        return redirect('products')->with('success', 'Products hasbeen updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('products')->with('success','Products has been deleted!');
    }
}
