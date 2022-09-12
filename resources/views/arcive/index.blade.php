@extends('layouts_stisla.app')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{url('https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/sweetalert2@11.4.32/dist/sweetalert2.min.css')}}">
@endsection

@section('content_main')
    <section class="section">
        <div class="section-header">
            <h1>Arcive</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Arcive</h2>
            <p class="section-lead">
                Examples for opt-in styling of tables (given their prevalent use in JavaScript plugins) with Bootstrap.
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-3 col-lg-3">
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
                                    @foreach($month as $m)
                                        <option value="{{$m['id']}}"
                                                @if($m['id']==(int)$now->format('m'))
                                                    selected
                                                @endif
                                            >{{$m['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body" id="content_of_data">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('arcive.modal')
@endsection

@section('custom_js')
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/sweetalert2@11.4.32/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/arcive/index.js')}}"></script>
@endsection
