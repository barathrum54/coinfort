@extends('admin.layouts.master')
@section('title','Coin Oluştur')
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
                <form action="{{url("/admin/coins")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @error("name")
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin Adı</label>
                        <input type="text" name="name" class="form-control"  required>
                    </div>
                    @error("symbol")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin Symbol</label>
                        <input type="text"  name="symbol" class="form-control" required>
                    </div>
                    @error("description")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin Description</label>
                        <textarea type="text" name="description" class="form-control" required></textarea>
                    </div>
                    @error("logo")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin icon</label>
                        <input type="text" name="icon" class="form-control" required>
                    </div>
                    @error("launch_date")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    {{--  --}}
                    <div class="form-group">
                        <label>Coin Launch Date</label>
                        <input type="date"    name="launch_date" class="form-control" required>
                    </div>
                    @error("telegram")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin Telegram</label>
                        <input type="text" name="telegram" class="form-control" required>
                    </div>
                    @error("website")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin Website</label>
                        <input name="website"  type="text" class="form-control">
                    </div>
                    @error("twitter")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin Twitter</label>
                        <input name="twitter" type="text" class="form-control">
                    </div>
                    @error("discord")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin Discord</label>
                        <input name="discord"  type="text" class="form-control">
                    </div>
                    @error("reddit")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin Reddit</label>
                        <input name="reddit"  type="text" class="form-control">
                    </div>
                    @error("market_cap")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin MarketCap</label>
                        <input name="market_cap"  type="text" class="form-control">
                    </div>
                    @error("price")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Coin Price In Usd</label>
                        <input name="price" type="text" class="form-control">
                    </div>
                    @error("promoted")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label>Is Coin Promoted </label>
                        <select name="promoted" class="form-control" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
    
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Create</button>
                    </div>
                </form>
        </div>
    </div>
@endsection
