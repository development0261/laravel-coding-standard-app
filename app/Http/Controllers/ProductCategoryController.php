<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCategory\StoreProductCategoryRequest;
use App\Http\Requests\ProductCategory\UpdateProductCategoryRequest;
use Session;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategories = ProductCategory::paginate(5);
        return view('products.categories.index',compact('listCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductCategory\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {                    
        $storeCategory = ProductCategory::create($request->safe()->except(['token']));
        if (!$storeCategory) {
            return redirect()->route('categories.index')->with('error', __('modules.comman.messages.error.store'));
        }
        return redirect()->route('categories.index')->with('success', __('modules.comman.messages.success.store'));
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
        try {
            $editCategory = ProductCategory::find(decrypt($id));
        } catch(\DecryptException $e) {
            print_r($e->getMessage());
        }
        if (!$editCategory) {
            return redirect()->route('categories.index')->with('error', __('modules.comman.messages.error.not_found'));
        }
        return view('products.categories.edit',compact('editCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductCategory\UpdateProductCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, $id)
    {
        $updateCategory = ProductCategory::where('id',decrypt($id))->update($request->except(['_token','_method']));
        if (!$updateCategory) {
            return redirect()->route('categories.index')->with('error', __('modules.comman.messages.error.update'));
        }
        return redirect()->route('categories.index')->with('success', __('modules.comman.messages.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyCategory = ProductCategory::find(\Crypt::decrypt($id));
        if (!$destroyCategory) {
            return redirect()->route('categories.index')->with('error', __('modules.comman.messages.error.not_found'));
        }
        $response = $destroyCategory->delete();
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
