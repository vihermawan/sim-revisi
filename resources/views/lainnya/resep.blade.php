@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title"> Data Table Resep</h5>
	</div>

	<div class="card-header header-elements-inline">
        <button type="button" class="btn bg-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Resep</button>
    </div>
    

	<table id="resep-tables" class="table datatable-basic">
		<thead>
			<tr>
				<th>No </th>
				<th>Nama Obat</th>
				<th>Nama Resep</th>
				<th>Jumlah Resep</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>

<!--Modal show resep -->
<div id="add-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">Form Resep</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="addForm" name="addForm">

							<div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Obat :</label>
                                <div class="col-lg-9">
                                    <select name="id_obat" class="form-control">
                                      @foreach ($obat as $data)
                                        <option value="{{$data->id_obat}}">{{$data->nama_obat}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Resep :</label>
                                <div class="col-lg-9">
                                    <input name="nama_resep" type="text" class="form-control" placeholder="nama resep ">
                                </div>
                            </div>

							<div class="form-group row">
                                <label class="col-lg-3 col-form-label">Jumlah Resep :</label>
                                <div class="col-lg-9">
                                    <input name="jumlah_resep" type="text" class="form-control" placeholder="jumlah resep ">
                                </div>
                            </div>  
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success add_resep">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal show resep-->

<!--Modal edit resep -->

<div id="edit-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Form Resep</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="editForm" name="editForm">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Obat:</label>
                                <div class="col-lg-9">
                                    <select name="id_obat" class="form-control">
                                      @foreach ($obat as $data)
                                        <option value="{{$data->id_obat}}">{{$data->nama_obat}}</option>
                                      @endforeach
               
                                  </select>
                                </div>
                            </div>

							<div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Resep</label>
                                <div class="col-lg-9">
                                <input name="nama_resep" type="text" class="form-control" >
                                </div>
                            </div>

							<div class="form-group row">
                                <label class="col-lg-3 col-form-label">Jumlah Resep</label>
                                <div class="col-lg-9">
                                <input name="jumlah_resep" type="text" class="form-control" >
                                </div>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success edit_resep">Save changes</button>
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
                <button type="button" class="btn bg-danger delete_resep">Delete</button>
            </div>
        </div>
    </div>
</div>
 <!--End Modal delete-->


@endsection

@push('scripts')
<script>
	//add resep
	$(document).on('click', '.add_resep', function(e){
        e.preventDefault();

		$.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
			url: "{{ route('resep.addResep') }}",
            method: "post",
            data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
            success: function(data){
				Swal.fire({
                  type: 'success',
                  title: 'Resep berhasil di ditambah!',
                  text: 'Resep  anda telah berhasil ditambahkan!',
               });
               $("#addForm")[0].reset();
               $('#add-modal').modal('hide');
               $('#resep-tables').DataTable().ajax.reload();
            }
         });
        
      });

	  //edit resep
	  $(document).on('click', '.edit-resep-data', function(){
         var id = $(this).attr("id");
         $('.edit_resep').attr("id", id);
    });

    $(document).on('click', '.edit_resep', function(e){
        e.preventDefault();
         var id = $(this).attr("id");
        
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('resep.editResep') }}",
            method: "post",
            data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
            success: function(data){
                console.log(data)
               Swal.fire({
                  type: 'success',
                  title: 'Resep berhasil di ubah!',
                  text: 'Resep yang anda pilih telah diubah!',
               });
               $('#edit-modal').modal('hide');
               $('#resep-tables').DataTable().ajax.reload();
            }
         });
        
      });


	   // delete ruangan
	   $(document).on('click', '.delete-resep-data', function(){
       var id = $(this).attr("id");
       $('.delete_resep').attr("id", id);
    });

    $(document).on('click', '.delete_resep', function(){
        var id = $(this).attr("id"); 
        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
           },
           url: "{{ route('resep.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil dihapus!',
                    text: 'Resep yang anda pilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#resep-tables').DataTable().ajax.reload();
           }
        });
       
    });
	  //GET ALL DATA
	   $(function(){
            $('#resep-tables').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 4 ] }
                ],
               ajax: '{!! route('resep.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_obat',
                     data: 'nama_obat'
                  },
                  {
                     name: 'nama_resep',
                     data: 'nama_resep',
                  },
                  {
                     name: 'jumlah_resep',
                     data: 'jumlah_resep',
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