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
            <h2 class="section-title">Tambah Data Pegawai</h2>
            <p class="section-lead">
                Tambah Data Kategori master aplikasi {{env('APP_NAME')}}
            </p>

            <div class="row">
                <div class="col-8 col-md-12 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label>Bidang <text class="text-danger">*</text></label>
                                <select id="input_bidang" multiple class="form-control select2">

                                    @foreach($sector as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>NIP / No Identitas <text class="text-danger">*</text></label>
                                <input type="text" autocomplete="off" placeholder="Masukkan Nomor Identitas" id="input_nip" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Nama <text class="text-danger">*</text></label>
                                <input type="text" autocomplete="off" placeholder="Masukkan Nama" id="input_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Jabatan <text class="text-danger">*</text></label>
                                <input type="text" autocomplete="off" placeholder="Masukkan Nama Jabatan" id="input_jabatan" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="buttons">
                                <a href="{{url('master/sector')}}" class="btn btn-icon icon-left btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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
    <script src="{{asset('js/master/employess/index.js')}}"></script>
    <script>
        $("#input_bidang").select2({
            placeholder: "**Put Your Place Holder Here**"
        });
    </script>
@endsection


