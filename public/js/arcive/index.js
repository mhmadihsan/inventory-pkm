$(document).ready(function() {
    filter_data();
});


function show_add(btn){
    $('#exampleModal').modal('show');
}

function filter_data(){
    var year = $('#filter_tahun').val();
    var month = $('#filter_bulan').val();
    getData(year,month);
}

function getData(year,month){
    axios.get(window.location.origin+'/arcive/data?type=monthly&year='+year+'&month='+month)
        .then(function (response) {
            // handle success
            $('#content_of_data').empty();
            $('#content_of_data').append('<div id="shown_on_you"></div>');
            $('#shown_on_you')
                .replaceWith(response.data);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        });
}

function btn_submit(btn){
    $(btn).attr('disabled', true);
    var tahun = $('#input_tahun').val();
    var bulan = $('#input_month').val();
    var nama_file = $('#input_name_file').val();
    var keterangan = $('#input_keterangan').val();
    var category = $('#input_category').val();
    var file = document.getElementById('input_file').files;

    var formData = new FormData();
    formData.append('tahun',tahun);
    formData.append('bulan',bulan);
    formData.append('nama_file',nama_file);
    formData.append('keterangan',keterangan);
    formData.append('category',category);
    formData.append('file',file[0]);

    axios.post(window.location.origin+'/arcive/store', formData,{
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(function (response) {
        if (response.data.status == "failed") {
            $('#exampleModal').modal('show');
            $(btn).attr('disabled', false);
            Swal.fire({
                position: 'top-end',
                title: 'Error',
                text: response.data.messages,
                icon: 'error',
                showConfirmButton: false,
                timer: 1200
            });
        } else {
            Swal.fire({
                position: 'top-end',
                title: 'Sukses',
                text: response.data.messages,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            })
            $('#exampleModal').modal('hide');
            filter_data();
            $(btn).attr('disabled', false);
        }

    })
        .catch(function (error) {
            Swal.fire({
                position: 'top-end',
                title: 'Error',
                text: 'Tidak ada data yang Diinput',
                icon: 'error',
                showConfirmButton: false,
                timer: 1200
            });
        });
}

function show_edit(btn){
    const id = $(btn).data('id');
    axios.get(window.location.origin+'/arcive/getdata/'+id)
        .then(function (response) {
            // handle success
            var value = response.data;
            $('#edit_tahun').val(value.year).trigger('change');
            $('#edit_month').val(value.month).trigger('change');
            $('#edit_category').val(value.category_id).trigger('change');
            $('#edit_name_file').val(value.name_file);
            $('#edit_keterangan').val(value.keterangan);
            $('#EditModal').modal('show');
            $('#edited_id').val(id);

        })
        .catch(function (error) {
            console.log(error);
        });
}

function btn_update(btn){
    $(btn).attr('disabled', true);
    var tahun = $('#edit_tahun').val();
    var bulan = $('#edit_month').val();
    var nama_file = $('#edit_name_file').val();
    var keterangan = $('#edit_keterangan').val();
    var category = $('#edit_category').val();
    var id = $('#edited_id').val();
    var formData = new FormData();
    formData.append('tahun',tahun);
    formData.append('bulan',bulan);
    formData.append('nama_file',nama_file);
    formData.append('keterangan',keterangan);
    formData.append('category',category);
    formData.append('id',id);

    var file = document.getElementById('edit_file').files;
    formData.append('file',file[0] ? file[0] : '');


    axios.post(window.location.origin+'/arcive/update', formData,{
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(function (response) {
        if (response.data.status == "failed") {
            $('#EditModal').modal('show');
            $(btn).attr('disabled', false);
            Swal.fire({
                position: 'top-end',
                title: 'Error',
                text: response.data.messages,
                icon: 'error',
                showConfirmButton: false,
                timer: 1200
            });
        } else {
            Swal.fire({
                position: 'top-end',
                title: 'Sukses',
                text: response.data.messages,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            })
            $('#EditModal').modal('hide');
            filter_data();
            $(btn).attr('disabled', false);
        }

    })
        .catch(function (error) {
            Swal.fire({
                position: 'top-end',
                title: 'Error',
                text: 'Tidak ada data yang Diinput',
                icon: 'error',
                showConfirmButton: false,
                timer: 1200
            });
        });
}

function show_delete(btn){
    const id = $(btn).data("id");
    Swal.fire({
        title: 'Apakah anda yakin menghapus data?',
        text: "data akan permanen di hapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Sekarang!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(window.location.origin + '/arcive/delete/'+id)
                .then(function (response) {
                    if (response.data.status == "failed") {
                        $(btn).attr('disabled', false);
                        Swal.fire({
                            position: 'top-end',
                            title: 'Error',
                            text: response.data.messages,
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            title: 'Sukses',
                            text: response.data.messages,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $(btn).attr('disabled', false);
                        filter_data();
                    }

                })
                .catch(function (error) {
                    //toastr.error("Error", response.data.messages, toastr_options.error.title)
                });
        }
        else{
            Swal.fire(
                'Peringatan!',
                'Batal menghapus Data',
                'warning'
            );
        }
    })
}
