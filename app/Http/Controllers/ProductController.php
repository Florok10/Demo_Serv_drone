<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\ProductFunction;
use App\Models\ProductDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;


class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('pages.products', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                          => "required|string|max:255|regex:^\s*[a-zA-Z0-9éèàê'.,]+\s*$^",
            'title'                         => "required|string|max:255|regex:^\s*[a-zA-Z0-9éèàê\s'.,]+\s*$^",
            'image'                         => "required|image",
            'price'                         => "required|integer|min:1",
            'available_product_amount'      => "required|integer|min:1",
            'first_title'                   => "required|string|max:30|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'first_function'                => "required|string|max:120|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'second_title'                  => "nullable|string|max:30|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'second_function'               => "nullable|string|max:120|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'third_title'                   => "nullable|string|max:30|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'third_function'                => "nullable|string|max:120|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'first_description'             => "required|string|max:300|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'second_description'            => "nullable|string|max:300|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'third_description'             => "nullable|string|max:300|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'fourth_description'            => "nullable|string|max:300|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'characteristics'               => "required|string|max:300|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
        ]);

        if($request->image->extension() === 'png' || 'jpg' || 'jpeg')
        {
            $filename = time() . '.' . $request->image->extension();
        } else {
            return redirect()->back()->with('msg', "Invalid file format, only png, jpg, jpeg files are allowed");
        }

        $path = $request->image->storeAs(
            'product_images',
            $filename,
            'public'
        );

        $product = new Product();
        $product->name = addslashes($request->name);
        $product->title = addslashes($request->title);
        $product->picture_path = $path;
        $product->price = $request->price;

        $stock = new Stock();
        $stock->available_product_amount = $request->available_product_amount;

        $product_description = new ProductDescription();
        $product_description->first_description     = addslashes($request->first_description);
        $product_description->second_description    = addslashes($request->second_description);
        $product_description->third_description     = addslashes($request->third_description);
        $product_description->fourth_description    = addslashes($request->fourth_description);

        $product_function = new ProductFunction();

        $product_function->first_title      = addslashes($request->first_title);
        $product_function->first_function   = addslashes($request->first_function);
        $product_function->second_title     = addslashes($request->second_title);
        $product_function->second_function  = addslashes($request->second_function);
        $product_function->third_title      = addslashes($request->third_title);
        $product_function->third_function   = addslashes($request->third_function);
        $product_function->characteristics  = addslashes($request->characteristics);


        $product->save();
        $product->stock()->save($stock);
        $product->productFunction()->save($product_function);
        $product->productDescription()->save($product_description);

        return redirect('/products');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages/product_detail', [
            'product' => Product::findOrFail($id),
            'cart' => Cart::content(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/product_edit', [
            'product' => Product::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $request->validate([
            'name'                      => "required|string|max:255|regex:^\s*[a-zA-Z0-9éèàê'.,]+\s*$^",
            'title'                     => "required|string|max:255|regex:^\s*[a-zA-Z0-9éèàê'.,]+\s*$^",
            'image'                     => "image",
            'price'                     => "required|integer|min:1",
            'available_product_amount'  => "required|integer|min:1",
            'first_title'               => "required|string|max:30|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'first_function'            => "required|string|max:120|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'second_title'              => "nullable|string|max:30|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'second_function'           => "nullable|string|max:120|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'third_title'               => "nullable|string|max:30|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'third_function'            => "nullable|string|max:120|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'first_description'         => "required|string|max:300|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'second_description'        => "nullable|string|max:300|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'third_description'         => "nullable|string|max:300|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'fourth_description'        => "nullable|string|max:300|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'characteristics'           => "required|string|max:300|regex:^\s*[a-zA-Zéèàê'.,]+\s*$^",
            'id'                        => "required|integer",
        ]);

        $id = $request->id;

        $product = Product::findOrFail($id);

        if($request->image != NULL)
        {
            if($request->image->extension() === 'png' || 'jpg' || 'jpeg')
            {
                Storage::disk('public')->delete($product->picture_path);
                $filename = time() . '.' . $request->image->extension();
            } else {
                return "Invalid file format, only png, jpg, jpeg files are allowed";
            }

            $path = $request->image->storeAs(
                'product_images',
                $filename,
                'public'
            );
        }

        if($request->image != NULL)
        {
            $productData = [
                'name'              => addslashes($request->name),
                'title'             => addslashes($request->title),
                'picture_path'      => $path,
                'price'             => $request->price,
            ];
        } else {
            $productData = [
                'name'              => $request->name,
                'title'             => $request->title,
                'price'             => $request->price,
            ];
        }

        $stock = [
            'available_product_amount' => $request->available_product_amount,
        ];

        $product_description = [
            'first_description'     => addslashes($request->first_description),
            'second_description'    => addslashes($request->second_description),
            'third_description'     => addslashes($request->third_description),
            'fourth_description'    => addslashes($request->fourth_description),
        ];

        $product_function = [
            'first_title'           => addslashes($request->first_title),
            'first_function'        => addslashes($request->first_function),
            'second_title'          => addslashes($request->second_title),
            'second_function'       => addslashes($request->second_function),
            'third_title'           => addslashes($request->third_title),
            'third_function'        => addslashes($request->third_function),
        ];

        $product->update($productData);
        $product->stock()->update($stock);
        $product->productFunction()->update($product_function);
        $product->productDescription()->update($product_description);

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Storage::disk('public')->delete(Product::findOrFail($id)->picture_path);

        Product::findOrFail($id)->delete();

        return redirect('/products');
    }

}
