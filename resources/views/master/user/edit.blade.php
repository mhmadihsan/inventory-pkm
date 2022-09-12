@extends('layouts_stisla.app')

@section('custom_css')

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
            <h2 class="section-title">Edit Data Pengguna</h2>
            <p class="section-lead">
                Edit Data Pengguna master aplikasi {{env('APP_NAME')}}
            </p>

            <div class="row">
                <div class="col-8 col-md-12 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <input type="text" id="input_id" value="{{$data->id}}" readonly disabled hidden>
                            <div class="form-group">
                                <label>Pegawai <text class="text-danger">*</text></label>
                                <select disabled id="input_employess" class="form-control select2">
                                    <option>Pilih Pegawai</option>
                                    @foreach($employess as $s)
                                        <option value="{{$s->id}}"
                                                @if($data->employess_id==$s->id)
                                                    selected
                                                @endif
                                                >{{$s->nip}} - {{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>E-MAIL <text class="text-danger">*</text></label>
                                <input type="text" autocomplete="off" value="{{$data->email}}" placeholder="Massukan alamat email" id="input_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password </label>
                                <input type="password" autocomplete="off" placeholder="Masukkan Password" id="input_password" class="form-control">
                                <small>kosongkan jika tidak ingin menganti password</small>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="buttons">
                                <a href="{{url('master/users')}}" class="btn btn-icon icon-left btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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
    <script src="{{asset('js/master/users/edit.js')}}"></script>
@endsection


