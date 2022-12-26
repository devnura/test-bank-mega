<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CRUD PEGAWAI</title>
  </head>
  <body>
    <div class="container pt-3">
        <div class="row mb-3">
            <div class="col-12">
                <button type="button" class="btn btn-sm btn-primary float-right" id="show-modal">
                     <i class="fa fa-plus"></i>&nbsp;Tambah Data
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-pegawai" id="table-pegwai">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">DIVISI</th>
                                    <th scope="col" length="10%">ACTION</th>
                                </tr>
                            </thead>
                            <tbody id="list-pegawai">
                                <tr>
                                    <th scope="col">1</th>
                                    <th scope="col">001</th>
                                    <th scope="col">Anggi</th>
                                    <th scope="col">IT</th>
                                    <th scope="col">
                                        <button type="button" data-toggle="tooltip" data-placement="left" title="Edit" data-id="1" class="btn btn-sm btn-icon btn-info btn-edit"><i class="fa fa-edit"></i></button>&nbsp;
                                        <button type="button" data-toggle="tooltip" data-placement="left" title="Delete" data-id="1" class="btn btn-sm btn-icon btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal -->
        <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-add">Form Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="id-edit">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" aria-describedby="emailHelp" placeholder="Masukan NIP">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Divisi</label>
                        <select class="form-control" id="division" placeholder="Pilih Division">
                            <!-- <option selected>Open this select menu</option> -->
                            <option value="IT">IT</option>
                            <option value="Finance">Finance</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-save">Save changes</button>
            </div>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- script JS -->
    <script>
        $(document).ready(function () {
            // save
            fetch_data()
            const base_url = "";
            $('#btn-save').on('click', function(){
                const data = {
                    nip : $('#nip').val(),
                    nama : $('#nama').val(),
                    division : $('#division').val(),
                }
                save_pegawai(data)
            });

            // show mmodal add
            $('#show-modal').on('click', function(){
                console.log("ok add")
                $('#nip').val(""),
                $('#nama').val(""),
                $('#division').val("").trigger("change"),
                $('#modal-add').modal('show');
                $('#id-edit').val(0)
            });

            // get data edit
            $("#list-pegawai").on("click", ".btn-edit", function () {
                try {
                    console.log("ok edit")
                    const id_edit = $(this).attr("data-id")
                    $.ajax({
                        type: "GET",
                        url: "http://localhost:8080/karyawan/"+id_edit,
                        success: function (rsp) {
                            const data = rsp.data
                            $("#id-edit").val(data.id)
                            $('#nip').val(data.nip)
                            $('#nama').val(data.nama)
                            $('#division').val(data.division).trigger("change")
                            $('#modal-add').modal('show');
                        },
                        error: function (err) {
                            console.log(err)
                        },
                    });
                    return console.log($(this).attr("data-id"))
                } catch (error) {
                    console.log(error)
                }
            });

            $("#list-pegawai").on("click", ".btn-delete", function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log("ok edit")
                        const id_edit = $(this).attr("data-id")
                        $.ajax({
                            type: "GET",
                            url: "http://localhost:8080/karyawan/delete/"+id_edit,
                            success: function (rsp) {
                                if(rsp.status == 200){
                                    Swal.fire(
                                        'Deleted!',
                                        'Data deleted successfully.',
                                        'success'
                                    )
                                    $("#id-edit").val("")
                                    $('#nip').val("")
                                    $('#nama').val("")
                                    $('#division').val("").trigger("change")
                                    fetch_data()
                                    $('#modal-add').modal('hide');
                                    console.log(rsp)
                                }else{
                                    Swal.fire(
                                        'Failed!',
                                        'Data deleted successfully.',
                                        'error'
                                    )
                                }

                            },
                            error: function (err) {
                                console.log(err)
                            },
                        });

                    }
                })

                return console.log($(this).attr("data-id"))
            });

            function fetch_data() {
                $.ajax({
                    type: "GET",
                    url: "http://localhost:8080/karyawan",
                    success: function (rsp) {
                        console.log(rsp)
                        let data = rsp.data
                        let tableRow = ""

                        for (const item of data) {
                            tableRow += `
                                <tr>
                                    <th scope="col">${item.id}</th>
                                    <th scope="col">${item.nip}</th>
                                    <th scope="col">${item.nama}</th>
                                    <th scope="col">${item.division}</th>
                                    <th scope="col">
                                        <button type="button" data-toggle="tooltip" data-placement="left" title="Edit" data-id="${item.id}" style="color:white;" class="btn btn-sm btn-warning btn-edit"><i class="fa fa-edit"></i></button>&nbsp;
                                        <button type="button" data-toggle="tooltip" data-placement="left" title="Delete" data-id="${item.id}" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                    </th>
                                </tr>
                            `
                        }

                        $("#list-pegawai").html("")

                        $("#list-pegawai").html(tableRow)
                    },
                    error: function (err) {
                        console.log(err)
                    },
                });
            }

            function save_pegawai(data) {
                const id_edit =  $('#id-edit').val()
                $.ajax({
                    type: "POST", 
                    url: "http://localhost:8080/karyawan/"+id_edit,
                    data: data,
                    success: function (rsp) {
                        if(rsp.status == 200){
                            fetch_data()
                            $('#modal-add').modal('hide');
                            Swal.fire(
                                'Successfully!',
                                'Data Saved Successfully!',
                                'success'
                            )
                        }else if(rsp.status == 400){
                            Swal.fire(
                                'Failed!',
                                rsp.data,
                                'error',
                            )
                        }else{
                            Swal.fire(
                                'Failed!',
                                'Failded to save data!',
                                "error"
                            )
                        }
                       
                       console.log(rsp)
                    },
                    error: function (err) {
                        console.log(err)
                    },
                });
            }

        })
    </script>
  </body>
</html>