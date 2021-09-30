<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProducts = Product::join('product_categories','product_categories.id','=','products.category_id')
                                ->select('product_categories.category_name','products.*')->paginate(5);
        return view('products.index',compact('allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = ProductCategory::all();
        return view('products.add',compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Product\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {        
        $requestData = $request->safe()->except(['token']);
        $requestData['category_id'] = $requestData['category'];
        unset($requestData['category']);
        $storeProduct = Product::create($requestData);
        if (!$storeProduct) {
            return redirect()->route('products')->with('error', __('modules.comman.messages.error.store'));
        }
        return redirect()->route('products')->with('success', __('modules.comman.messages.success.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $showProduct = Product::find(decrypt($id));
        return view('products.show',compact('showProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {        
        $allCategories = ProductCategory::all();
        try {
            $editProduct = Product::find(decrypt($request->id));
        } catch(\DecryptException $e) {
            print_r($e->getMessage());
        }
        if (!$editProduct) {
            return redirect()->route('products')->with('error', __('modules.comman.messages.error.not_found'));
        }
        return view('products.edit',compact('editProduct','allCategories'));
    }

    /**
     * Update the specified resource in storage.
     *     
     * @param  \App\Http\Requests\Product\UpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {        
        $requestData = $request->safe()->except(['token']);
        $requestData['category_id'] = $requestData['category'];
        unset($requestData['category']);        
        $updateProduct = Product::where('id',decrypt($id))->update($requestData);        
        if (!$updateProduct) {
            return redirect()->route('products')->with('error', __('modules.comman.messages.error.update'));
        }
        return redirect()->route('products')->with('success', __('modules.comman.messages.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {        
        $product = Product::find(\Crypt::decrypt($request->id));
        if (!$product) {
            return redirect()->route('products')->with('error', __('modules.comman.messages.error.not_found'));
        }
        $response = $product->delete();
        if ($response) {
            $data = array(
                'status' => 200,
                'message' => 'success',
            );
            Session::flash('success', __('modules.comman.messages.success.delete'));
        } else {
            $data = array(
                'status' => 419,
                'message' => 'error',
            );
            Session::flash('error', __('modules.comman.messages.error.delete'));
        }
        return response()->json($data);
    }
}
