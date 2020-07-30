<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Subcategory;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items=Item::all();
      // dd($items);
      return view ('backend.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $brands =Brand::all();
      $subcategories=Subcategory::all();

      return view ('backend.items.create',compact('brands','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //print output
        // dd($request);

        //Validation
        $request->validate([
            'codeno' => 'required',
            'name' => 'required',
            'photo' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'subcategory' => 'required',
        ]);

        //File Upload
        $imageName=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backendtemplate/itemimg'),$imageName);
        $myfile='backendtemplate/itemimg/'.$imageName;

        //Store Data
        $item=new Item;
        $item->codeno=$request->codeno; //->name in modeltable =->name in form
        $item->name=$request->name;
        $item->photo=$myfile;
        $item->price=$request->price;
        $item->discount=$request->discount;
        $item->description=$request->description;
        $item->brand_id=$request->brand;
        $item->subcategory_id=$request->subcategory;
        $item->save();

        //Redirect
        return redirect()->route('items.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.items.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $brands =Brand::all();
      $subcategories=Subcategory::all();
      $item=Item::find($id);
      // dd($item);
      return view ('backend.items.edit',compact('brands','subcategories','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //print output
        // dd($request);

        //Validation
        $request->validate([
            'codeno' => 'required',
            'name' => 'required',
            'photo' => 'required',
            //may be present or absent , check validation
            'price' => 'required',
            'discount' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'subcategory' => 'required',
        ]);

        //File Upload
        $imageName=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backendtemplate/itemimg'),$imageName);
        $myfile='backendtemplate/itemimg/'.$imageName;
        //if upload new image, delete old image

        //Update Data
        $item=Item::find($id);
        $item->codeno=$request->codeno; //->name in modeltable =->name in form
        $item->name=$request->name;
        $item->photo=$myfile;
        $item->price=$request->price;
        $item->discount=$request->discount;
        $item->description=$request->description;
        $item->brand_id=$request->brand;
        $item->subcategory_id=$request->subcategory;
        $item->save();

        //Redirect
        return redirect()->route('items.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::find($id);
        //delete related file from storage
        $item->delete();
        return redirect()->route('items.index');
    }
}
