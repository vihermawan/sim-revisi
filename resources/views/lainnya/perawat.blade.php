@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
        <h5 class="card-title">Tabel Perawat</h5>   
    </div>
    
    <div class="card-header">
        <button type="button" class="btn bg-success btn-labeled btn-labeled-left"  data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Perawat</button>
    </div>
    
	<table class="table datatable-basic" id="perawat-tables">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Perawat</th>
				<th>Nama Dokter </th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
    </table>
</div>

<!-- modal tambah perawat -->
<div id="add-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title">Form Tambah Perawat</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="col-xl-12">
                        <!-- Form -->
                        <div class="card-body">
                            <form id="addForm" name="addForm">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Perawat:</label>
                                    <div class="col-lg-8">
                                    <input type="text" placeholder="Nama Perawat" class="form-control" id="nama_perawat" name="nama_perawat">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Dokter: </label>
                                    <div class="col-lg-8">
                                    <input type="text" placeholder="Nama Dokter" class="form-control" id="nama_dokter" name="nama_dokter">
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

@foreach($perawats as $data)
<!-- modal edit dokter -->
<div id="edit-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Form Edit Perawat</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="editForm" name="editForm">
                            
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Perawat :</label>
                                        <div class="col-lg-8">
                                             <input type="text" placeholder="Nama Perawat" class="form-control" id="nama_perawat" name="nama_perawat" value="{{$data->nama_perawat}}">
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Dokter : </label>
                                    <div class="col-lg-8">
                                    <input type="text" placeholder="Nama Dokter" class="form-control" id="nama_dokter" name="nama_dokter" value="{{$data->nama_dokter}}">
                                    </div>
                                </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success edit_perawat">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal edit ruangan-->
@endforeach

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
                <button type="button" class="btn bg-danger delete_perawat">Delete</button>
            </div>
        </div>
    </div>
</div>
 <!--End Modal delete-->

@endsection

@push('scripts')
    <script>

        //add perawat
        $(document).on('click', '.add_data', function(e){
        e.preventDefault();

        $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('perawat.addPerawat') }}",
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
               $('#perawat-tables').DataTable().ajax.reload();
            }
         });  
      });

      //edit ruangan
      //edit-perawat-data itu id saat klik button edit
    $(document).on('click', '.edit-data-perawat', function(){
         var id = $(this).attr("id");
         //ini di bawah itu make id nya simpan yang simpan edit
         $('.edit_perawat').attr("id", id);
    });

    $(document).on('click', '.edit_perawat', function(e){
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
               Swal.fire({
                  type: 'success',
                  title: 'Dokter berhasil di ubah!',
                  text: 'Dokter yang anda pilih telah diubah!',
               });
               $('#edit-modal').modal('hide');
               $('#perawat-tables').DataTable().ajax.reload();
            }
         });
        
      });

    // delete ruangan
    $(document).on('click', '.delete-perawat-data', function(){
       var id = $(this).attr("id");
       $('.delete_perawat').attr("id", id);
    });

    $(document).on('click', '.delete_perawat', function(){
        var id = $(this).attr("id"); 
        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
           },
           url: "{{ route('perawat.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil dihapus!',
                    text: 'Dokter yang anda pilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#perawat-tables').DataTable().ajax.reload();
           }
        });
       
    });

      
      //GET ALL DATA
     $(function(){
            $('#perawat-tables').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 3 ] }
                ],
               ajax: '{!! route('perawat.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_perawat',
                     data: 'nama_perawat',
                  },
                  {
                     name: 'nama_dokter',
                     data: 'nama_dokter',
                  },
				  {
                     name: 'action',
                     data: 'action',
                  },

               ]
            });
         });
        
    </script>
@endpush


@section('js')
    <script src="{{asset('/template/global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
	<script src="{{asset('/template/global_assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
	<script src="{{asset('/template/global_assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/picker_date.js')}}"></script>
@endsection