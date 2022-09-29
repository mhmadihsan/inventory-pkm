@extends('layouts_stisla.app')

@section('custom_css')
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/sweetalert2@11.4.32/dist/sweetalert2.min.css')}}">
@endsection

@section('content_main')
    <section class="section">
        <div class="section-header">
            <h1>Table</h1>
            <div class="section-header-breadcrumb">
                @foreach(Request::segments() as $seg)
                    <div class="breadcrumb-item"><a href="#">{{$seg}}</a></div>
                @endforeach
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tables</h2>
            <p class="section-lead">
                Edit Data Bidang
            </p>
            <div class="row">
                <div class="col-8 col-md-12 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <input type="text" autocomplete="off" hidden readonly disabled value="{{$data->id}}" id="input_id" class="form-control">
                            <div class="form-group">
                                <label>Nama Bidang</label>
                                <input type="text" autocomplete="off" value="{{$data->name}}" id="input_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="" id="input_descripsi" cols="50" class="form-control">
                                    {{$data->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="buttons">
                                <a href="{{url('master/sector')}}" class="btn btn-icon icon-left btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button onclick="submit_update(this)" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')

    <script src="{{url('https://cdn.jsdelivr.net/npm/sweetalert2@11.4.32/dist/sweetalert2.all.min.js')}}"></script>
    <script>
        $(document).ready( function () {

        });
    </script>
    <script src="{{asset('js/master/sector/index.js')}}"></script>
@endsection


