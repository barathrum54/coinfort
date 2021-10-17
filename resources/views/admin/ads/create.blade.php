@extends('admin.layouts.master')
@section('title','Ads Oluştur')
@section('css')
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            @if(Session::get("success"))
                <div class="alert alert-success">{{Session::get("success")}}</div>
            @endif
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form action="{{url("/admin/ads")}}" method="post" enctype="multipart/form-data">
                @csrf
                @error("url")
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Ads Url</label>
                    <input type="text" name="url"  class="form-control" required>
                </div>
                @error("photo")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Ads Photo</label>
                    <input type="text" name="photo"  class="form-control" required>
                </div>
                @error("type_id")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Ads Type</label>
                    <select type="text" name="type"  class="form-control" required>
                            <option value="1">Banner First</option>
                            <option value="2">Banner Second</option>
                            <option value="3">Banner Popup</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Ads Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("js")
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
@endsection
