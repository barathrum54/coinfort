@extends('admin.layouts.master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$apps->count()}} Applications.</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Market Cap</th>
                        <th>Date</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($apps as $coin)
                        <tr>
                            <td>
                                <img src="{{$coin->logo}}" width="150" height="150" alt="">
                            </td>
                            <td>{{$coin->name}}</td>
                            <td>${{$coin->marketCap}}</td>
                            <td>{{$coin->created_at->diffForHumans()}}</td>
                            <td style="display: flex; flex-wrap: nowrap;">
                                <a href="/admin/applications/{{$coin->id}}" title="Düzenle" class="btn btn-sm btn-primary mr-2"><i class="fa fa-pen"></i></a>
                                <form method="POST" action="{{url("/admin/applications/d/($coin->id")}}" title="Sil">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

