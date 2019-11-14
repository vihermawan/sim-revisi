@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Table Tindakan</h5>
	</div>

	<div class="card-header header-elements-inline">
        <button type="button" class="btn bg-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Data</button>
    </div>

	<table class="table datatable-basic" id="tindakan-tables">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Tindakan</th>
				<th>Harga Tindakan</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>


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
                <button type="button" class="btn bg-danger delete-data">Delete</button>
            </div>
        </div>
    </div>
</div>
 <!--End Modal delete-->


 <!--Modal edit ruangan -->
<div id="edit-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Form Edit</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="editForm" name="editForm">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Tindakan:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="nama_tindakan"/>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Harga Tindakan:</label>
                              <div class="col-lg-6">
							  	<input class="form-control" type="text" name="harga_tindakan" />
                                </div>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success edit-data">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal edit ruangan-->


<!--Modal add tindakan -->
<div id="add-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Form Tindakan</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="addForm" name="addForm">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Tindakan:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="nama_tindakan"/>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Harga Tindakan:</label>
                              <div class="col-lg-6">
							  	<input class="form-control" type="text" name="harga_tindakan" />
                                </div>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success add-data">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal add-->

@endsection

@push('scripts')
<script>
$(document).ready(function(){
		//GET ALL DATA
		$(function(){
            $('#tindakan-tables').DataTable({
               prossessing: true,
               serverside: true,
               "bDestroy": true,
			   "columnDefs": [
                    { className: "text-center", "targets": [ 3 ] }
                ],
               ajax: '{!! route('tindakan.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_tindakan',
                     data: 'nama_tindakan'
                  },
                  {
                     name: 'harga_tindakan',
                     data: 'harga_tindakan',
					 render: function(data){
                        return 'Rp' + data ;
                     }
                  },
                  {
                     name: 'action',
                     data: 'action',
                  },

               ]
            });
         });

		// delete ruangan
	$(document).on('click', '.delete-modal', function(){
       var id = $(this).attr("id");
       $('.delete-data').attr("id", id);
    });

    $(document).on('click', '.delete-data', function(){
        var id = $(this).attr("id"); 
        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
           },
           url: "{{ route('tindakan.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil dihapus!',
                    text: 'Pembayaran yang anda pilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#tindakan-tables').DataTable().ajax.reload();
           }
        });
       
    });

	//edit
	$(document).on('click', '.edit-modal', function(){
         var id = $(this).attr("id");
         $('.edit-data').attr("id", id);
    });

    $(document).on('click', '.edit-data', function(e){
        e.preventDefault();
         var id = $(this).attr("id");
        
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('tindakan.editData') }}",
            method: "post",
            data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
            success: function(data){
				console.log('edit', data);
               Swal.fire({
                  type: 'success',
                  title: 'Ruang berhasil di ubah!',
                  text: 'Ruangan yang anda pilih telah diubah!',
               });
			   $("#editForm")[0].reset();
               $('#edit-modal').modal('hide');
               $('#tindakan-tables').DataTable().ajax.reload();
            }
         });
        
      });

	 //add ruangan
	 $(document).on('click', '.add-data', function(e){
        e.preventDefault();

         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('tindakan.addData') }}",
            method: "post",
            data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
            success: function(data){
               Swal.fire({
                  type: 'success',
                  title: 'Tindakan berhasil di ditambah!',
                  text: 'Tindakan  anda telah berhasil ditambahkan!',
               });
               $("#addForm")[0].reset();
               $('#add-modal').modal('hide');
               $('#tindakan-tables').DataTable().ajax.reload();
            }
         });
        
      });


	

});

</script>

@endpush

