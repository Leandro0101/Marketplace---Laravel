<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;
use App\Category;
use App\Traits\UploadTrait;


class ProductController extends Controller
{
    private $product;

    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function _construct(Product $product)
     {
        $this->product = $product;
     }

    public function index()
    {
    $userStore = auth()->user()->store;
     $product = $userStore->products()->paginate(10);
     
     return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Responses
     */
    public function create()
    {
        $category = new Category();
        $categories=$category->all(['id', 'name']);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);
        $product = new Product();
        $store = auth()->user()->store;
        $product = $store->products()->create($data);

        $product->categories()->sync($categories);

        if($request->hasFile('photos')){
            $images = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($images);
        }

        flash ('Produto criado com sucesso')->success();

        return redirect()->Route('admin.products.index');

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
        $product1 = new Product();
        $product = $product1::findOrFail($id);
        $category = new Category();
        $categories=$category->all(['id', 'name']);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);
        $product1 = new Product();
        $product = $product1::find($id);
        $product->update($data);
        $product->categories()->sync($categories);

        if($request->hasFile('photos')){
            $images = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($images);
        }


        flash('Produto Atualizado com sucesso')->success();

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productR)
    {
        $product1 = new Product();
        $product = $product1::find($productR);
        $product->delete($product);

        flash('Produto removido com sucesso')->success();

        return redirect()->route('admin.products.index');
    }


}
