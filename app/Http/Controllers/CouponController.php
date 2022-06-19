<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCouponRequest;
use Carbon\Carbon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // $coupon = Coupon::all();
        // return view('coupon/index',compact('coupon'));

        $coupons = Coupon::latest()->paginate(10);

        return view('coupon/index',compact('coupons'));
    }

    public function filter(Request $request) {
        $coupons = Coupon::query();

        $code = $request->code;
        $memo = $request->memo;
        $public_date_from = $request->public_date_from;
        $public_date_to = $request->public_date_to;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $type = $request->type;


        if ($code) {
            $coupons->where('code','LIKE','%'.$code.'%');
        }
        if ($memo) {
            $coupons->where('memo','LIKE','%'.$memo.'%');
        }

        if ($public_date_from && $public_date_to) {
            $start = Carbon::parse($public_date_from);
            $end = Carbon::parse($public_date_to);
            $public_date = Coupon::whereDate('public_date','<=',$end)
            ->whereDate('public_date','>=',$start)
            ->get();
        }

        if ($start_time) {
            $coupons->where('start_time','LIKE','%'.$start_time.'%');
        }

        if ($end_time) {
            $coupons->where('end_time','LIKE','%'.$end_time.'%');
        }

        $data = [
            'code' => $code,
            'memo' => $memo,
            'public_date' => $public_date_from,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'type' => $type,
            'coupons' => $coupons->latest()->paginate(10),
        ];

        return view('coupon/index',$data);
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
        $image = $request->file('image');
        $imagePath = $image->move('image', $image->getClientOriginalName());
        
        $storeData = $request->safe()->only(
            'code',
            'title',
            'name',
            'summary',
            'image',
            'public_date',
            'start_time',
            'end_time',
        );
        
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
    public function update(StoreCouponRequest $request, $id) {
        
        $image = $request->file('image');
        $imagePath = $image->move('image', $image->getClientOriginalName());
        
        $updateData = $request->safe()->only('code','title','name','summary','image','public_date','start_time','end_time');

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
