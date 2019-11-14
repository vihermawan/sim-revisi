@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Data Tabel Penyakit</h5>
	</div>

	<div class="card-header header-elements-inline">
        <button type="button" class="btn bg-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Penyakit</button>
    </div>

	<table id="penyakit-tables" class="table datatable-basic">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Penyakit</th>
				<th>Jenis Penyakit</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>  
	<!--Modal show penyakit -->
<div id="add-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">Form Penyakit</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="addForm" name="addForm">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Penyakit : </label>
                                <div class="col-lg-9">
                                    <input name="nama_penyakit" type="text" class="form-control" placeholder="Nama Penyakit ">
                                </div>
                            </div>

							<div class="form-group row">
                                <label class="col-lg-3 col-form-label">Jenis Penyakit :  </label>
                                <div class="col-lg-9">
                                    <input name="jenis_penyakit" type="text" class="form-control" placeholder="Jenis Penyakit ">
                                </div>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success add_penyakit">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal show penyakit-->

<!--Modal edit penyakit -->
@foreach($penyakit as $data)
<div id="edit-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Form Rawat Inap</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="editForm" name="editForm">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Penyakit</label>
                                <div class="col-lg-9">
                                <input name="nama_penyakit" type="text" class="form-control" placeholder="nama penyakit " value="{{$data->nama_penyakit}}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Jenis Penyakit</label>
                                <div class="col-lg-9">
                                <input name="jenis_penyakit" type="text" class="form-control" placeholder="jenis penyakit " value="{{$data->jenis_penyakit}}">
                                </div>
                            </div>  
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success edit_penyakit">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--End Modal edit penyakit-->

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
                <button type="button" class="btn bg-danger delete_penyakit">Delete</button>
            </div>
        </div>
    </div>
</div>
 <!--End Modal delete-->

@endsection

@push('scripts')
<script>

    //add penyakit
    $(document).on('click','.add_penyakit', function(e){
        e.preventDefault();

        $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url : "{{ route('penyakit.addPenyakit') }}",
            method : "post",
            data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
            success : function(data){
                Swal.fire({
                    type: 'success',
                    title : 'Penyakit berhasil ditambah!',
                    text : 'Penyakit telah berhasil ditambahkan!',
                });
                $("#addForm")[0].reset();
                $("#add-modal").modal('hide');
                $('#penyakit-tables').DataTable().ajax.reload();
            }
        });
    });

    //edit penyakit
    $(document).on('click', '.edit-penyakit-data', function(){
         var id = $(this).attr("id");
         $('.edit_penyakit').attr("id", id);
    });

    $(document).on('click', '.edit_penyakit', function(e){
        e.preventDefault();
         var id = $(this).attr("id");
        
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('penyakit.editPenyakit') }}",
            method: "post",
            data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
            success: function(data){
                console.log(data)
               Swal.fire({
                  type: 'success',
                  title: 'Penyakit berhasil di ubah!',
                  text: 'Penyakit yang anda pilih telah diubah!',
               });
               $('#edit-modal').modal('hide');
               $('#penyakit-tables').DataTable().ajax.reload();
            }
         });
        
      });

    //delete penyakit
    $(document).on('click', '.delete-penyakit-data', function(){
       var id = $(this).attr("id");
       $('.delete_penyakit').attr("id", id);
    });

    $(document).on('click', '.delete_penyakit', function(){
        var id = $(this).attr("id"); 
        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
           },
           url: "{{ route('penyakit.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil dihapus!',
                    text: 'Penyakit yang anda pilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#penyakit-tables').DataTable().ajax.reload();
           }
        });
       
    });


    //GET ALL DATA
    $(function(){
            $('#penyakit-tables').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 3 ] }
                ],
               ajax: '{!! route('penyakit.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_penyakit',
                     data: 'nama_penyakit'
                  },
                  {
                     name: 'jenis_penyakit',
                     data: 'jenis_penyakit',
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

