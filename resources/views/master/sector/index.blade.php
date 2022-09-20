@extends('layouts_stisla.app')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{url('https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/sweetalert2@11.4.32/dist/sweetalert2.min.css')}}">
@endsection

@section('content_main')
    <section class="section">
        <div class="section-header">
            <h1>DATA MASTER - BIDANG</h1>



            <div class="section-header-breadcrumb">
                @foreach(Request::segments() as $seg)
                    <div class="breadcrumb-item"><a href="#">{{$seg}}</a></div>
                @endforeach
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">SiAlbumas</h2>
            <p class="section-lead">
                Sistem Aplikasi Laporan Bulanan Puskesmas
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                                <div class="col-2">
                                    <a class="btn btn-info btn-block" href="{{url('master/sector/add')}}">TAMBAH</a>
                                </div>
                        </div>
                        <div class="card-body">
                            <table id="table_content" class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Bidang</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <th scope="row" class="text-center">{{$no++}}</th>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->description}}</td>
                                    <td>
                                        <div class="btn-group mb-2" role="group" aria-label="Basic example">
                                            <a href="{{url('master/sector/edit/'.$d->id.'')}}" class="btn btn-success">Edit</a>
                                            <button type="button" data-id="{{$d->id}}"
                                                    onclick="show_delete(this)"
                                                    class="btn btn-danger">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script src="{{url('https://cdn.jsdelivr.net/npm/sweetalert2@11.4.32/dist/sweetalert2.all.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{url('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('js/master/sector/index.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#table_content').DataTable({

            });
        });
    </script>
@endsection
