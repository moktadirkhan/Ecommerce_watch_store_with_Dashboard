<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Product;
use App\Category;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Product\CreateProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;



class ProductController extends Controller
{
  public function __construct()
  {
    $this->middleware('verifycategoriescount')->only(['create','store']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
    /*   $search=$request()->query('search');
       if($search){
         $product=Product::where('title','LIKE',"%($search)");

       }
       else{
         $product=Product::all();
       }*/

       return view("products.index")->with('products',Product::all());//products variable should be different from edit method's product variable
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
       return view("products.create")->with('categories',Category::all());
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(CreateProductRequest $request)
     {

         $image=$request->image->store('products');//db_name
          $creator=Auth::user()->name;

         Product::create([
           'title'=>$request->title,
           'description'=>$request->description,
           'content'=>$request->content,
           'image'=>$image,
           'published_at'=>$request->published_at,
           'category_id'=>$request->category_id,
          'price'=>$request->price,
          'status'=>1,
          'hot_news'=>0,
          'created_by'=>$creator,
          'view_count'=>0
         ]);
         session()->flash('success','Product created successfully');

         return redirect (route('products.create'));
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
     public function edit(Product $product)
     {
         return view('products.create')->with('product',$product)->with('categories',Category::all());
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(UpdateProductRequest $request, Product $product)
     {

       $data=$request->only(['title','description','published_at','price','category_id','content']);
          if ($request->hasFile('image')){
            //check if new image
            $image=$request->image->store('products');
            //upload it
           Storage::delete($product->image);
           //delete old one

           $data['image']=$image;
          }
        $product->update($data);


          session()->flash('success','Product updated successfully');

          return redirect(route('products.index'));
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       $product=Product::withTrashed()->where('id',$id)->firstOrfail();

       if($product->trashed()){
         Storage::delete($product->image);
         $product->forceDelete();
       }else{
         $product->delete();
       }


         session()->flash('success','Product deleted successfully');

         return redirect (route('products.index'));
     }



     public function trashed()
     {
         $trashed= Product::withTrashed()->get();


         return view ('products.index')->withProducts($trashed);//with('posts',$trashed);
     }

     public function status(Product $products){
       if ($products->status == false){
             $products->status=true;
           }else{
               $products->status=false;
           }

       $products->save();
       return redirect(route('products.index'))->with('success','Products status changed successfully');

        }

        public function hot_news(Product $products){

    if ($products->hot_news == false){
          $products->hot_news=true;
        }else{
            $products->hot_news=false;
        }

    $products->save();


         return redirect(route('products.index'))->with('success','Products hot news changed successfully');
   }

 }
