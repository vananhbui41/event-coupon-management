@extends('layout')
@section('content')
<style>
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add Coupon
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('coupons.store') }}" id="addCouponForm" enctype="multipart/form-data">
          <div class="form-group">
            @csrf
            <label for="code">クーポンコ一ド:</label>
            <input type="text" class="form-control" name="code"/>
          </div>
          <div class="form-group">
            <label for="ronline_coupon_code">R-online coupon code:</label>
            <input type="text" class="form-control" name="ronline_coupon_code"/>
          </div>
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
            <label for="summary">Summary:</label>
            <input type="text" class="form-control" name="summary"/>
          </div>
          <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
          </div>
          <div class="form-group">
            <label for="public_date">Public day:</label>
            <input type="datetime-local" name="public_date" id="public_date" class="form-control"/>
          </div>
          <div class="form-group">
            <label for="start_time">Start from:</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control"/>
          </div>
          <div class="form-group">
            <label for="end_time">End at:</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control"/>
          </div>
          <div class="form-group">
            <label for="type">Type</label>
            <input type="radio" name="type" id="one_time" value="0">
            <label for="one_time">１回のみ</label>
            <input type="radio" name="type" id="unlimit" value="1">
            <label for="unlimit">unlimit</label>
          </div>
          <div class="form-group">
            <label for="cases">Memo:</label>
            <textarea name="memo" id="memo" cols="30" rows="5" form="addCouponForm" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="cases">Status:</label>
            <input type="radio" id="not delete" name="deleted_at" value="">
            <label for="not delete">Chưa xóa</label>
            <input type="radio" id="deleted" name="deleted_at" value="{{date("Y-m-d h:i:s")}}">
            <label for="delete">Đã xóa</label>
          </div>
          <button type="submit" class="btn btn-primary">Add Coupon</button>
      </form>
  </div>
</div>
@endsection
