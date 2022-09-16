@extends('layouts_stisla.app')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{url('https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css')}}">
@endsection

@section('content_main')
    <section class="section">
        <div class="section-header">
            <h1>Table</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Kategori</h2>
            <p class="section-lead">
                Examples for opt-in styling of tables (given their prevalent use in JavaScript plugins) with Bootstrap.
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="col-2 col-lg-2">
                                <label for="">.</label>
                                <button onclick="show_add(this)" class="btn btn-info btn-block"> <i class="fa fa-add"></i> TAMBAH</button>
                            </div>
                            <div class="col-3 col-lg-3">
                                <label for="">Tahun</label>
                                <select name="" onchange="filter_data()" class="form-control select2" id="filter_tahun">
                                    @foreach($year as $y)
                                        <option value="{{$y}}"
                                                @if($y==$now->format('Y'))
                                                selected
                                            @endif
                                        >{{$y}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3 col-lg-3">
                                <label for="">Bulan</label>
                                <select name="" onchange="filter_data()" class="form-control select2" id="filter_bulan">
                                    <option>PILIH BULAN</option>
                                    <option value="1,2,3,4,5,6,7,8,9,10,11,12">SEMUA BULAN</option>
                                    @foreach($month as $m)
                                        <option value="{{$m['id']}}"
                                                @if($m['id']==(int)$now->format('m'))
                                                selected
                                            @endif
                                        >{{$m['name']}}</option>
                                    @endforeach
                                    <option value="1,2,3">Triwulan I</option>
                                    <option value="4,5,6">Triwulan II</option>
                                    <option value="7,8,9">Triwulan III</option>
                                    <option value="10,11,12">Triwulan IV</option>
                                </select>
                            </div>
                            <div class="col-3 col-lg-3">
                                <label for="">Kategori</label>
                                <select name=""  class="form-control select2" id="filter_kategori">
                                    <option value="xyz">SEMUA</option>
                                    @foreach($category as $m)
                                        <option value="{{$m->id}}">{{$m->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_content" class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Nama File</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('list.form')
@endsection

@section('custom_js')
    <script type="text/javascript" charset="utf8" src="{{url('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js')}}"></script>

    <script src="{{url('https://cdn.jsdelivr.net/npm/sweetalert2@11.4.32/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/list/index.js')}}"></script>
    <script>
        $(document).ready( function () {
            filter_data();
            // $('#table_content').DataTable({
            //
            // });
        });
    </script>
@endsection
