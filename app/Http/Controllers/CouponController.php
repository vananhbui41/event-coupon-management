<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $coupon = Coupon::all();
        return view('coupon/index',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('coupon/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request) {
        // \dd($request->all());
        $image = $request->file('image');
        $imagePath = $image->move('image', $image->getClientOriginalName());
        
        $storeData = $request->safe()->only('code','title','name','summary','image','public_date','start_time','end_time');
        
        $storeData['image'] = $imagePath;
        $storeData = $request->all();
        Coupon::create($storeData);
        return redirect('/coupons')->with('completed', 'Coupon has been saved!');
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $coupon = Coupon::findOrFail($id);
        return view('coupon/distribute',compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $coupon = Coupon::findOrFail($id);
        return view('coupon/edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $image = $request->file('image');
        $imagePath = $image->move('image', $image->getClientOriginalName());
        
        $updateData = $request->validate([
            'code'=>'required|max:20',
            'ronline_coupon_code'=>'max:20',
            'title'=>'required',
            'name'=>'required',
            'summary'=>'required',
            // 'image'=>'required',
            'public_date'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);

        $updateData['image']=$imagePath;
        $updateData = request()->except(['_token','_method']);
        Coupon::whereId($id)->update($updateData);
        return redirect('/coupons')->with('completed', 'Coupon has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect('/coupons')->with('completed','Coupon has been deleted');
    }
}
