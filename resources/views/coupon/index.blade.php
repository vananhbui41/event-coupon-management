@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Coupon Code</td>
          <td>Title</td>
          <td>Public Day</td>
          <td>Start From</td>
          <td>End at</td>
          <td>Type</td>
          <td></td>
          <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($coupon as $coupons)
        <tr>
            <td>{{$coupons->code}}</td>
            <td>{{$coupons->title}}</td>
            <td>{{$coupons->public_date}}</td>
            <td>{{$coupons->start_time}}</td>
            <td>{{$coupons->end_time}}</td>
            <td>
            @if($coupons->type == 0)
              1回のみ
            @else
              無制限
            @endif
            </td>
            <td class="text-center">
                <a href="{{ route('coupons.show', $coupons->id)}}" class="btn btn-primary btn-sm">Distribute</a>
            </td>
            <td class="text-center">
                <a href="{{ route('coupons.edit', $coupons->id)}}" class="btn btn-primary btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection