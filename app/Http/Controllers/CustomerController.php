<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Datatables;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::all();
            return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('options', function($row){
                      $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm" hidden>View</a>';
                      $btn = $btn.
                      '<a href="'.route('customers.edit', $row->id).
                      '" class="edit btn btn-primary btn-sm">Edit</a>';
                      $btn = $btn.
                      "<form action=\"".route("customers.destroy", $row->id)."\" method=\"post\" class=\"d-inline\">
                            <input type=\"hidden\" name=\"_method\" value=\"delete\" >
                            <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\" >

                          <button class=\"btn btn-danger btn-sm\" onclick=\"return confirm('Are you sure?')\">Delete</button> 
                      </form>";
                    return $btn;
                   })
                   ->rawColumns(['options'])
                   ->make(true);
        }
  
        return view('admin.customers.index', [
            'active' => 'customer',
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create',  [
            'active' => 'customer'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->all());
        return redirect('customers')->with('success', 'Customer has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', [
            'active' => 'customer',
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        Customer::find($customer->id)->update($request->all());
        return redirect('customers')->with('success', 'Customer hasbeen updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers')->with('success','Customers has been deleted!');
    }
}
