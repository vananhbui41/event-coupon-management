@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="card push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="card-header">
    Coupon List
  </div>
  <div class="card-body">
    <form action="{{ route('coupons.filter') }}" method="GET">
        <div class="form-group">
            <div class="form-group">
              <label>クーポンコード</label>
              <input type="text" name="code" class="form-control" value="{{ $code ?? '' }}">
            </div>
            <div class="form-group">
              <label>メモ</label>
              <input type="text" name="memo" class="form-control" value="{{ $memo ?? '' }}">
            </div>
            <div class="form-group">
              <label>公開開始日: </label>
              <input type="date" name="public_date_from" id="public_date_from" value="{{ $public_date_from ?? '' }}">
              ~
              <input type="date" name="public_date_to" id="public_date_to" value="{{ $public_date_to ?? '' }}">
            </div>
            <div class="form-group">
              <label>利用開始日: </label>
              <input type="date" name="start_time_from" id="start_time_from" value="{{ $start_time_from ?? '' }}">
              ~
              <input type="date" name="start_time_to" id="start_time_to" value="{{ $start_time_to ?? '' }}">
            </div>
            <div class="form-group">
              <label>利用終了日: </label>
              <input type="date" name="end_time_from" id="end_time_from" value="{{ $end_time_from ?? '' }}">
              ~
              <input type="date" name="end_time_to" id="end_time_to" value="{{ $end_time_to ?? '' }}">
            </div>
            <div class="form-group">
              <label>利用回数: </label>
              <input type="radio" name="type" id="No condition" value=0>
              <label for="No condition">条件なし</label>
              <input type="radio" name="type" id="one_time" value=NULL>
              <label for="one_time">１回のみ</label>
              <input type="radio" name="type" id="unlimit" value=1>
              <label for="unlimit">無制限</label>
            </div>
            <div>
                <button class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    
    <div>
      <a href="{{ route('coupons.create')}}" class="btn btn-primary"> Create coupon </a>
    </div>
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
          @foreach($coupons as $coupon)
          <tr>
              <td>{{$coupon->code}}</td>
              <td>{{$coupon->title}}</td>
              <td>{{$coupon->public_date}}</td>
              <td>{{$coupon->start_time}}</td>
              <td>{{$coupon->end_time}}</td>
              <td>
              @if($coupon->type == 0)
                1回のみ
              @else
                無制限
              @endif
              </td>
              <td class="text-center">
                  <a href="{{ route('coupons.show', $coupon->id)}}" class="btn btn-primary btn-sm">Distribute</a>
              </td>
              <td class="text-center">
                  <a href="{{ route('coupons.edit', $coupon->id)}}" class="btn btn-primary btn-sm">Edit</a>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>

  
  {{ $coupons->links() }}
<div>
@endsection