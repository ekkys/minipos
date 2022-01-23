<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Datatables;
use Illuminate\Http\Request;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Supplier::all();
            return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('options', function($row){
                      $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm" hidden>View</a>';
                      $btn = $btn.
                      '<a href="'.route('suppliers.edit', $row->id).
                      '" class="edit btn btn-primary btn-sm">Edit</a>';
                      $btn = $btn.
                      "<form action=\"".route("suppliers.destroy", $row->id)."\" method=\"post\" class=\"d-inline\">
                            <input type=\"hidden\" name=\"_method\" value=\"delete\" >
                            <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\" >

                          <button class=\"btn btn-danger btn-sm\" onclick=\"return confirm('Are you sure?')\">Delete</button> 
                      </form>";
                    return $btn;
                   })
                   ->rawColumns(['options'])
                   ->make(true);

                  
        }
  
        return view('admin.suppliers.index', [
            'active' => 'suppliers',
            
        ]);
    }

    public function supplierjson(Request $request)
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create',  [
            'active' => 'suppliers'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupplierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request)
    {
        // dd($request->all());
        Supplier::create($request->all());
        return redirect('suppliers')->with('success', 'Supplier has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', [
            'active' => 'suppliers',
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupplierRequest  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        Supplier::find($supplier->id)->update($request->all());
        return redirect('suppliers')->with('success', 'Supplier hasbeen updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        // dd($supplier);
        $supplier->delete();
        return redirect('suppliers')->with('success','Post has been deleted!');
    }
}
