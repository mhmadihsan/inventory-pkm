<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tahun:</label>
                        <select name="" class="form-control select2" id="input_tahun">
                            @foreach($year as $y)
                                <option value="{{$y}}"
                                        @if($y==$now->format('Y'))
                                        selected
                                    @endif
                                >{{$y}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Bulan:</label>
                        <select name="" class="form-control select2" id="input_month">
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

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kategori:</label>
                        <select name="" class="form-control select2" id="input_category">
                            @foreach($category as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama File:</label>
                        <input type="text" class="form-control" id="input_name_file">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">File:</label>
                        <input type="file" class="form-control" accept=".xls, .pdf, .xlsx, .docx, .doc" id="input_file">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Keterangan:</label>
                        <textarea class="form-control" id="input_keterangan"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="btn_submit(this)" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit">
                    <input id="edited_id" hidden readonly type="text">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tahun:</label>
                        <select name="" class="form-control select2" id="edit_tahun">
                            @foreach($year as $y)
                                <option value="{{$y}}">{{$y}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Bulan:</label>
                        <select name="" class="form-control select2" id="edit_month">
                            @foreach($month as $m)
                                <option value="{{$m['id']}}">{{$m['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kategori:</label>
                        <select name="" class="form-control select2" id="edit_category">
                            @foreach($category as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama File:</label>
                        <input type="text" class="form-control" id="edit_name_file">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">File:</label>
                        <input type="file" class="form-control" accept=".xls, .pdf, .xlsx, .docx, .doc" id="edit_file">
                        <small class="text-danger">Kosongkan jika tidak ingin mengupdate file</small>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Keterangan:</label>
                        <textarea class="form-control" id="edit_keterangan"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="btn_update(this)" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

