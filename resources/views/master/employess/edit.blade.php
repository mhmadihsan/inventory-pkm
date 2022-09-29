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
            <h2 class="section-title">Edit Data Pegawai</h2>
            <p class="section-lead">
                Edit Data Kategori master aplikasi {{env('APP_NAME')}}
            </p>

            <div class="row">
                <div class="col-8 col-md-12 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <input type="text" autocomplete="off" hidden readonly disabled value="{{$data->id}}" id="input_id" class="form-control">
                            <div class="form-group">
                                <label>Bidang <text class="text-danger">*</text></label>
                                <select id="input_bidang" multiple class="form-control select2">
                                    @foreach($sector as $s)
                                        <option value="{{$s->id}}"
                                                    @foreach($data->moresector->pluck('id') as $idx)
                                                         @if($idx==$s->id)
                                                            selected
                                                        @endif
                                                    @endforeach

                                        >{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>NIP / No Identitas <text class="text-danger">*</text></label>
                                <input type="text" autocomplete="off" value="{{$data->nip}}" placeholder="Masukkan Nomor Identitas" id="input_nip" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Nama <text class="text-danger">*</text></label>
                                <input type="text" autocomplete="off" value="{{$data->name}}" placeholder="Masukkan Nama" id="input_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Jabatan <text class="text-danger">*</text></label>
                                <input type="text" autocomplete="off" value="{{$data->jabatan}}" placeholder="Masukkan Nama Jabatan" id="input_jabatan" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="buttons">
                                <a href="{{url('master/employess')}}" class="btn btn-icon icon-left btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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
    <script src="{{asset('js/master/employess/index.js')}}"></script>
@endsection


