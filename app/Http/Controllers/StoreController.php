<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;


class StoreController extends Controller
{

    public function index()
    {
        $pFeatured = Product::featured()->get();
        $pRecommend = Product::recommend()->get();
        $categories = Category::all();
        $products = Product::all();

        return view('store.index',compact('categories','pFeatured','pRecommend','products'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('store.product', compact('categories', 'product'));
    }


    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::ofCategory($id)->get();
        return view('store.category', compact('categories', 'products', 'category'));
    }


    public function  tag($id)
    {
        $categories = Category::all();
        $tag = tag::find($id);
        $products = $tag->products;

        return view('store.tag', compact('categories', 'products', 'tag'));


    }


}
