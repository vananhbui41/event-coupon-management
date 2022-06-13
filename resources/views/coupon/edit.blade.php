@extends('layout')
@section('content')
<style>
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Edit Coupon
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('coupons.update', $coupon->id) }}" id="addCouponForm" enctype="multipart/form-data">
      <div class="form-group">
        @csrf
        @method('PATCH')
        <label for="code">クーポンコ一ド:</label>
        <input type="text" 
        class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" 
        name="code" value="{{ $coupon->code }}"/>
        @if ($errors->has('code'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('code') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group">
        <label for="ronline_coupon_code">R-online coupon code:</label>
        <input type="text" 
        class="form-control " 
        name="ronline_coupon_code"
        value="{{ $coupon->ronline_coupon_code }}"/>
      </div>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" 
        class="form-control @error('title') is-invalid @enderror" 
        name="title"
        value="{{ $coupon->title }}"/>
        @error('title')
          <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" 
        class="form-control @error('name') is-invalid @enderror" 
        name="name"
        value="{{ $coupon->name }}"/>
        @error('name')
          <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="summary">Summary:</label>
        <input type="text" 
        class="form-control @error('summary') is-invalid @enderror" 
        name="summary"
        value="{{ $coupon->summary }}"/>
        @error('summary')
          <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" 
        class="form-control-file @error('image') is-invalid @enderror"
        value="{{old('image')}}">
        @error('image')
          <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="public_date">Public day:</label>
        <input type="datetime-local" name="public_date" id="public_date" 
        class="form-control @error('public_date') is-invalid @enderror"
        value="{{ $coupon->public_date }}"/>
        @error('public_date')
          <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="start_time">Start from:</label>
        <input type="datetime-local" name="start_time" id="start_time" 
        class="form-control @error('start_time') is-invalid @enderror"
        value="{{old('start_time')}}"/>
        @error('start_time')
          <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="end_time">End at:</label>
        <input type="datetime-local" name="end_time" id="end_time" 
        class="form-control @error('end_time') is-invalid @enderror"
        value="{{old('end_time')}}"/>
        @error('end_time')
          <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
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
        @if($coupon->deleted_at == NULL) 
          <input type="radio" id="not delete" name="deleted_at" value="" checked>
        @else
        <input type="radio" id="not delete" name="deleted_at" value="">
        @endif
        <label for="not delete">Chưa xóa</label>
        @if ($coupon->deleted_at!=NULL)
          <input type="radio" id="deleted" name="deleted_at" value="{{date("Y-m-d h:i:s")}}" checked>
        @else
        <input type="radio" id="deleted" name="deleted_at" value="{{date("Y-m-d h:i:s")}}" >
        @endif
        <label for="delete">Đã xóa</label>
      </div>
      <button type="submit" class="btn btn-primary">Add Coupon</button>
    </form>
  </div>
</div>
@endsection