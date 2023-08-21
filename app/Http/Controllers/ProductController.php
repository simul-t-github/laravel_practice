<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product_add()
    {
        return view('pages/product_add');
    }

    public function product_create(Request $request)
    {
        $product = new Products();
        $image = '';
        if (isset($request->image)) {
            $image = $request->file('image')->store('public/uploads');
        }
        $product->image = $image;
        $product->product_name = $request['product_name'];
        $product->quantity = $request['quantity'];
        $product->price = $request['price'];
        $product->save();
        session()->flash('status', 'Product Added Successfull!');
        return redirect()->route('product.view');
    }


    public function product_view(Request $request)
    {
        $search = $request->search ?? '';
        if ($search != '') {
            $products = Products::where('product_name', 'LIKE', "%$search%")->orWhere('price', 'LIKE', "%$search%")
                ->orWhere('quantity', 'like', "$search")
                ->orderByDesc('created_at')
                ->get();
        } else {
            $products = Products::orderBy('created_at', 'desc')->paginate(5);
        }
        $data = compact('search');
        return view('pages/product_view', ['products' => $products])->with($data);
    }

    public function product_trash()
    {
        $products = Products::onlyTrashed()->get();
        return view('pages/product_trash', ['products' => $products]);
    }

    public function product_restore($id)
    {
        $product = Products::withTrashed()->find($id);
        if (!is_null($product)) {
            $product->restore();
        }

        return redirect()->route('product.view');
    }

    public function product_edit($id)
    {
        $data = Products::find($id);
        return view('pages.product_edit', ['data' => $data]);
    }

    public function product_update(Request $request, $id)
    {
        $product = Products::find($id);
        $image = '';
        if (isset($request->image)) {
            $image = $request->file('image')->store('public/uploads');
        }
        $product->image = $image;
        $product->product_name = $request->product_name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();
        session()->flash('status', 'Product Updated Successfull!');
        return redirect()->route('product.view');
    }


    public function product_delete($id)
    {
        $product = Products::find($id);
        if (!is_null($product)) {
            $product->delete();
        }

        return redirect()->route('product.view');
    }

    public function product_force_delete($id)
    {
        $product = Products::withTrashed()->find($id);
        if (!is_null($product)) {
            $product->forceDelete();
        }

        return redirect()->route('product.trash');
    }
}
