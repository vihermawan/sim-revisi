@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
        <h5 class="card-title">Tabel Dokter</h5>   
    </div>
    
    <div class="card-header">
        @if(Auth::user()->id_role == "1")
            <button type="button" class="btn bg-success btn-labeled btn-labeled-left"  data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Dokter</button>
        @endif
        </div>
    
	<table class="table datatable-basic" id="dokter-tables">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Dokter</th>
				<th>Waktu Buka</th>
                <th>Waktu Tutup</th>
				<th>Poli</th>
                <th>Hari Buka</th>
                @if(Auth::user()->id_role == "1")
                    <th class="text-center">Actions</th>
                @endif
			</tr>
		</thead>
    </table>
</div>

<!-- modal tambah dokter -->
<div id="add-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title">Form Tambah Dokter</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="col-xl-12">
                        <!-- Form -->
                        <div class="card-body">
                            <form id="addForm" name="addForm">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Dokter:</label>
                                    <div class="col-lg-8">
                                    <input type="text" placeholder="Nama Dokter" class="form-control" id="nama_dokter" name="nama_dokter">
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Waktu Buka:</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-alarm"></i></span>
                                            </span>
                                            <input type="text" class="form-control pickatime" name="waktu_buka" placeholder="Waktu Buka&hellip;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Waktu Tutup:</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-alarm"></i></span>
                                            </span>
                                            <input type="text" class="form-control pickatime" name="waktu_tutup" placeholder="Waktu Tutup&hellip;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Poli</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select select2"  name="poli">
                                                <option disabled selected>Pilih Poli</option>
                                                    @foreach($poli as $data)
                                                    <option value="{{$data->id}}">{{$data->nama_poli}}</option>
                                                    @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Hari Buka</label>
                                    <div class="col-lg-8">
                                        {{-- <input type="text" placeholder="Hari Buka" class="form-control" id="hari_buka" name="hari_buka"> --}}
                                        <select class="form-control select" data-fouc id="hari_buka" name="hari_buka">
                                            <option>Pilih Hari</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <!-- /Form -->
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary add_data">Simpan Data</button>
                     </div>
                </div>
            </div>
        </div>
    </div>
<!-- akhir modal tambah dokter -->


<!-- modal edit dokter -->
<div id="edit-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Form Edit Dokter</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="editForm" name="editForm">
                            
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Dokter:</label>
                                        <div class="col-lg-8">
                                             <input type="text" placeholder="Nama Dokter" class="form-control" id="nama_dokter" name="nama_dokter" >
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Waktu Buka:</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-alarm"></i></span>
                                            </span>
                                            <input type="text" class="form-control pickatime" id="waktu_buka" name="waktu_buka" placeholder="Waktu Buka&hellip;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Waktu Tutup:</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-alarm"></i></span>
                                            </span>
                                            <input type="text" class="form-control pickatime" id="waktu_tutup" name="waktu_tutup" placeholder="Waktu Tutup&hellip;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Poli</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select select2" name="poli" id="editPoli" >
                                                <option disabled selected>Pilih Poli</option>
                                                    @foreach($poli as $data)
                                                    <option value="{{$data->id}}">{{$data->nama_poli}}</option>
                                                    @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Hari Buka</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select select2" name="hari_buka" id="editharibuka" >
                                            <option disabled >Pilih Hari</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                        </select>
                                    </div>
                                </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link closeEditDokter" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success edit_dokter">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal edit ruangan-->


<!--Modal delete -->
<div id="delete-modal" class="modal fade" tabindex="-2">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h6 class="modal-title">Delete Data</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <div class="modal-body">
                <div class="col-xl-12">
                    <div class="card-body">
                        <p>Anda yakin ingin menghapus data ini?</p>
                    </div>
                </div>
            </div>
    
             <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                <button type="button" class="btn bg-danger delete_dokter">Delete</button>
            </div>
        </div>
    </div>
</div>
 <!--End Modal delete-->

@endsection

@push('scripts')
    <script>

        //add dokter
    $(document).on('click', '.add_data', function(e){
    e.preventDefault();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        },
        url: "{{ route('dokter.addDokter') }}",
        method: "post",
        data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
        success: function(data){
            console.log('data', data)
            Swal.fire({
                type: 'success',
                title: 'Data berhasil di ditambah!',
                text: 'Data anda telah berhasil ditambahkan!',
            });
            $("#addForm")[0].reset();
            $('#add-modal').modal('hide');
            $('#dokter-tables').DataTable().ajax.reload();
        }
        });  
    });


    //edit dokter baru
    //edit data
    $(document).on('click', '#editDokterBtn', function(){
            id = $(this).attr('data-id');
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                url: "{{ route('dokter.editDataDokter') }}",
                method: "get",
                data: {id: id},
                success: function(data){
                    console.log(data);
                    $('#editForm #nama_dokter').val(data.nama_dokter);
                    $('#editForm #waktu_buka').val(data.waktu_buka);
                    $('#editForm #waktu_tutup').val(data.waktu_tutup);
                    if($('#editharibuka option').select2().val() !== data.hari_buka){
                        $('#editharibuka option').select2().val(data.hari_buka);  
                    }
                    if($('#editPoli option').select2().val() !== data.nama_poli){
                        $('#editPoli option').select2().attr('selected','selected');  
                    }
                    // $('#edit_hari_buka').find('option[value='+data.hari_buka+']').prop('selected', true);
                    // $('#edit_hari_buka').on('change', function(){
                    //     var status = $(this).val();
                    //     $('#editForm #edit_hari_buka').val(status);
                    // });
                    // if($('#edit_hari_buka option').select2().val() !== data.hari_buka){
                    //     $('#edit_hari_buka').append($('<option type="hidden">').text(data.hari_buka).attr({'selected':'selected','value':data.hari_buka }));
                    //     // $('#edit_hari_buka option').select2().text(data.hari_buka).attr('selected':'selected');  
                    // }
                   $("#edit-modal").modal("show")
                }
            });
    
        });

        $(document).on('click', '.closeEditDokter', function(){
            console.log('gg');
            $('#edit_hari_buka option').select2().removeAttr('selected');
            $("#editForm")[0].reset();
        });

        $(document).on('click', '#edit_dokter', function(){
            console.log(JSON.parse(JSON.stringify($('#editFormRM').serializeArray())));
            $("#edit-modal").modal("hide")
        });

        $(document).on('click', '.edit_dokter', function(e){
            e.preventDefault();
            var id = $(this).attr("id");
            
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                url: "{{ route('dokter.editDokter') }}",
                method: "post",
                data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
                success: function(data){
                    console.log(data)
                Swal.fire({
                    type: 'success',
                    title: 'Dokter berhasil di ubah!',
                    text: 'Dokter yang anda pilih telah diubah!',
                });
                $('#edit-modal').modal('hide');
                $('#dokter-tables').DataTable().ajax.reload();
                }
            });
            
        });
    
    // delete ruangan
    $(document).on('click', '.delete-dokter-data', function(){
       var id = $(this).attr("id");
       $('.delete_dokter').attr("id", id);
    });

    $(document).on('click', '.delete_dokter', function(){
        var id = $(this).attr("id"); 
        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
           },
           url: "{{ route('dokter.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil dihapus!',
                    text: 'Dokter yang anda pilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#dokter-tables').DataTable().ajax.reload();
           }
        });
       
    });

    //GET ALL DATA
    $(function(){
            $('#dokter-tables').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               @if(Auth::user()->id_role == "1")
               "columnDefs": [
                    { className: "text-center", "targets": [ 6 ] }
                ],
                @endif
               "columnDefs": [
                    { className: "text-center", "targets": [ 5 ] }
                ],
                
               ajax: '{!! route('dokter.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_dokter',
                     data: 'nama_dokter',
                  },
                  {
                     name: 'waktu_buka',
                     data: 'waktu_buka',
                  },
                  {
                     name: 'waktu_tutup',
                     data: 'waktu_tutup',
                  },
                  {
                     name: 'nama_poli',
                     data: 'nama_poli',
                  },
                  {
                     name: 'hari_buka',
                     data: 'hari_buka',
                  },
                  @if(Auth::user()->id_role == "1")
                  {
                     name: 'action',
                     data: 'action',
                  },
                  @endif

               ]
            });
         });
        
    </script>
@endpush



@section('js')
    <script src="{{asset('/template/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
	<script src="{{asset('/template/global_assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
	<script src="{{asset('/template/global_assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/picker_date.js')}}"></script>
@endsection