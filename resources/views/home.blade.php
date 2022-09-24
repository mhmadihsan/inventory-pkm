@extends('layouts_stisla.app')

@section('content_main')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pengguna</h4>
                        </div>
                        <div class="card-body">
                            {{$user}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Arcive</h4>
                        </div>
                        <div class="card-body">
                            {{$arcive}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pegawai</h4>
                        </div>
                        <div class="card-body">
                            {{$employess}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Logs</h4>
                        </div>
                        <div class="card-body">
                            47
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Aktifitas Terbaru</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach($arcive_doc as $d)
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="{{asset('stisla/assets/img/avatar/avatar-1.png')}}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right text-primary">{{$d->updated_at}}</div>
                                        <div class="media-title">{{$d->user->employess->name ?? 'SuperAdmin'}}</div>
                                        <span class="text-small text-muted">{{$d->category->name}} : {{$d->name_file}}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="text-center pt-1 pb-1">
                            <a href="{{url('arcive')}}" class="btn btn-primary btn-lg btn-round">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
