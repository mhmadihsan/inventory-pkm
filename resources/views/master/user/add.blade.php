@extends('layouts_stisla.app')

@section('custom_css')

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
            <h2 class="section-title">Tambah Data Pengguna</h2>
            <p class="section-lead">
                Edit Data Pengguna master aplikasi {{env('APP_NAME')}}
            </p>

            <div class="row">
                <div class="col-8 col-md-12 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label>Pegawai <text class="text-danger">*</text></label>
                                <select id="input_employess" class="form-control select2">
                                    <option>Pilih Pegawai</option>
                                    @foreach($employess as $s)
                                        <option value="{{$s->id}}">{{$s->nip}} - {{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>E-MAIL <text class="text-danger">*</text></label>
                                <input type="text" autocomplete="off" placeholder="Massukan alamat email" id="input_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password </label>
                                <input type="password" autocomplete="off" placeholder="Masukkan Password" id="input_password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Hak Pengguna <text class="text-danger">*</text></label>
                                <select id="input_role" class="form-control select2">
                                    <option>Pilih Hak Pengguna</option>
                                    @foreach($role as $s)
                                        <option value="{{$s->name}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="buttons">
                                <a href="{{url('master/users')}}" class="btn btn-icon icon-left btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button onclick="submit_save(this)" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
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
    <script src="{{asset('js/master/users/add.js')}}"></script>
@endsection


