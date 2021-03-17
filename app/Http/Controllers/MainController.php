<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function index()
    {
        $products = Product::paginate(10);
        return view('index', compact('products'));
    }



    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function categoriesAdd(){
        if (Auth::user()) {
            return view('categoriesAdd');
        } else {

            return redirect('/login')->withErrors(array('message', 'Необходимо авторизоваться'));
        }
    }

    public function categoriesRemove($id) {
        if (Auth::user()) {
            $categories = Category::find($id);
            $category_id_product = Product::where('category_id', $id)->first();

            $category_id_product->delete();
            $categories->delete();
            $products = Product::paginate(10);
            return redirect()->route('home', compact('products'));
        } else {
            $products = Product::paginate(10);
            return view('index', compact('products'));
        }
    }

    public function categoriesSubmit(Request $req){
        $categories = new Category();
        $categories->name = $req->input('categoryName');
        $categories->description = $req->input('description');
        $categories->code = $categories->name;


        $categories->save();
        return redirect()->route('home')->with('success', 'Товар успешно добавлен');

    }
    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('category', compact('category', 'products'));
    }

    public function categoriesEdit($id){
        $data =  Category::find($id);
        return view('editCategory', compact('data'));
    }


    public function categoriesUpdate(Request $req){

        $data = Category::find($req->id);

        $data->name = $req->name;
        $data->description = $req->description;

        $data->save();
        return redirect('/');

    }

    public function product($product = null)
    {
        return view('product', ['product' => $product]);
    }

//    public function test() {
//        $users = DB::select('select * from users');
//        $products = Product::get();
//        dd($products);
//        return view('test', compact('products'));
//    }

    public function productAdd(){
        if (Auth::user()) {
            $categories = Category::get();
            return view('add', compact('categories'));
        } else {
            return redirect('/login')->withErrors(array('message', 'Необходимо авторизоваться'));
        }


    }

    public function productEdit($id){
        $data =  Product::find($id);
        return view('edit', compact('data'));
    }
    public function productUpdate(Request $req){

        $data = Product::find($req->id);

        $data->name = $req->name;
        $data->description = $req->description;
        $data->price = $req->price;

        $data->save();
        return redirect('/');

    }

    public function productRemove($id) {
        if (Auth::user()) {
            $product = Product::find($id);
            $product->delete();
            $products = Product::paginate(10);
            return redirect()->route('home', compact('products'));
        } else {
            $products = Product::paginate(10);
            return view('index', compact('products'));
        }
    }


    public function submit(Request $req) {
        $products = new Product();
        $categories = new Category();
        $products->name = $req->input('productName');
        $products->price = $req->input('price');
        $categories->name = $req->input('categoryName');
        $products->code = $products->name;
        $categories_id = Category::where('id', $categories->name)->first();

        $products->category_id = $categories_id->id;

//        dd($categories);


        $products->save();

        return redirect()->route('home')->with('success', 'Товар успешно добавлен');
    }


}
