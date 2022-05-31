@extends('layout')
@section('title','Distribute Coupon')
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
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="post" action="{{ route('coupons.show', $coupon->id) }}" id="distributeCouponForm">
            <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="code">クーポンコ一ド:</label>
              <input type="text" class="form-control" name="code" value="{{ $coupon->code }}" readonly/>
            </div>
            <div class="form-group">
              <label for="cases">Memo:</label>
              <textarea name="memo" id="memo" cols="30" rows="5" form="distributeCouponForm">Memo ...</textarea>
            </div>
            <div class="form-group">
                <table>
                    <tr>
                        <td><label for="members">配信リスト:</label></td>
                        <td><input type="radio" name="members" id="all">
                            <label for="members">全員</label>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="radio" name="members" id="assign">
                            <label for="members">リスト 指定</label>
                        </td>
                        <td>
                            <input type="file" name="photo" id="photo" class="form-control-file" required>
                        </td>
                    </tr>
                </table>  
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
  </div>
@endsection
