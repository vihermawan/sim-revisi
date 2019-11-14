@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Data Tabel Obat</h5>
	</div>

	<div class="card-header header-elements-inline">
        <button type="button" class="btn bg-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Obat</button>
    </div>

	<table id="obat-tables" class="table datatable-basic">
		<thead>
			<tr>
				<th>No. </th>
				<th>Nama Obat</th>
				<th>Dosis Obat</th>
				<th>Harga Obat</th>
				<th>Jenis Obat</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>

<!--Modal add obat -->
<div id="add-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">Form Obat</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="addForm" name="addForm">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Obat : </label>
                                <div class="col-lg-9">
                                    <input name="nama_obat" type="text" class="form-control" placeholder="Nama Obat ">
                                </div>
                            </div>

							<div class="form-group row">
                                <label class="col-lg-3 col-form-label">Dosis Obat : </label>
                                <div class="col-lg-9">
                                    <input name="dosis_obat" type="text" class="form-control" placeholder="Dosis Obat ">
                                </div>
                            </div>
							<div class="form-group row">
                                <label class="col-lg-3 col-form-label">Harga Obat : </label>
                                <div class="col-lg-9">
                                    <input name="harga_obat" type="text" class="form-control" placeholder="Harga Obat ">
                                </div>
                            </div>
                            

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Jenis Obat</label>
                              <div class="col-lg-6">
                                  <select name="jenis_obat" class="form-control">

                                      <option value="Tablet">Tablet</option>
                                      <option value="Sirip">Sirup</option>
									  <option value="Kapsul">Kapsul</option>
									  <option value="Bubuk">Bubuk</option>

                                  </select>
                                </div>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success add_obat">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal add obat-->


<!--Modal edit obat -->
<div id="edit-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">Form Obat</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="editForm" name="editForm">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Obat : </label>
                                <div class="col-lg-9">
                                    <input name="nama_obat" type="text" class="form-control" placeholder="Nama Obat ">
                                </div>
                            </div>

							<div class="form-group row">
                                <label class="col-lg-3 col-form-label">Dosis Obat : </label>
                                <div class="col-lg-9">
                                    <input name="dosis_obat" type="text" class="form-control" placeholder="Dosis Obat ">
                                </div>
                            </div>
							<div class="form-group row">
                                <label class="col-lg-3 col-form-label">Harga Obat : </label>
                                <div class="col-lg-9">
                                    <input name="harga_obat" type="text" class="form-control" placeholder="Harga Obat ">
                                </div>
                            </div>
                            

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Jenis Obat</label>
                              <div class="col-lg-6">
                                  <select name="jenis_obat" class="form-control">
                                      <option value="Tablet">Tablet</option>
                                      <option value="Sirup">Sirup</option>
									  <option value="Kapsul">Kapsul</option>
									  <option value="Bubuk">Bubuk</option>
                                  </select>
                                </div>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success edit_obat">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal edit obat-->

<!--Modal edit obat -->
@foreach($obat as $data)
<div id="edit-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Form Obat</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="editForm" name="editForm">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Obat</label>
                                <div class="col-lg-9">
                                <input name="nama_obat" type="text" class="form-control" placeholder="nama obat " value="{{$data->nama_obat}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Dosis Obat</label>
                                <div class="col-lg-9">
                                <input name="dosis_obat" type="text" class="form-control" placeholder="dosis obat " value="{{$data->dosis_obat}}">
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Harga Obat</label>
                                <div class="col-lg-9">
                                <input name="harga_obat" type="text" class="form-control" placeholder="harga obat " value="{{$data->harga_obat}}">
                                </div>
                            </div> 

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Jenis Obat</label>
                              <div class="col-lg-6">
                                  <select name="jenis_obat" class="form-control" value="{{$data->jenis_obat}}">
                                      <option value="0">Tablet</option>
                                      <option value="1">Sirup</option>
                                      <option value="2">Kapsul</option>
                                      <option value="3">Bubuk</option>
                                  </select>
                                </div>
                            </div> 
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success edit_obat">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--End Modal edit obat-->

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
                <button type="button" class="btn bg-danger delete_obat">Delete</button>
            </div>
        </div>
    </div>
</div>
 <!--End Modal delete-->

@endsection

@push('scripts')
<script>
	//add obat
	$(document).on('click','.add_obat', function(e){
		e.preventDefault();

		$.ajax ({
			headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
			url: "{{ route('obat.addObat') }}",
            method: "post",
			data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
			success: function(data){
               Swal.fire({
                  type: 'success',
                  title: 'Obat berhasil ditambah!',
                  text: 'Obat telah berhasil ditambahkan!',
               });
               $("#addForm")[0].reset();
               $('#add-modal').modal('hide');
               $('#obat-tables').DataTable().ajax.reload();
            }
         });
	});

    //edit obat
    $(document).on('click', '.edit-obat-data', function(){
         var id = $(this).attr("id");
         $('.edit_obat').attr("id", id);
    });

    $(document).on('click', '.edit_obat', function(e){
        e.preventDefault();
         var id = $(this).attr("id");
        
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('obat.editObat') }}",
            method: "post",
            data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
            success: function(data){
                console.log(data)
               Swal.fire({
                  type: 'success',
                  title: 'Obat berhasil di ubah!',
                  text: 'Obat yang anda pilih telah diubah!',
               });
               $('#edit-modal').modal('hide');
               $('#obat-tables').DataTable().ajax.reload();
            }
         });
        
      });


      //delete obat
      $(document).on('click', '.delete-obat-data', function(){
       var id = $(this).attr("id");
       $('.delete_obat').attr("id", id);
    });

    $(document).on('click', '.delete_obat', function(){
        var id = $(this).attr("id"); 
        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
           },
           url: "{{ route('obat.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil dihapus!',
                    text: 'Obat yang anda pilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#obat-tables').DataTable().ajax.reload();
           }
        });
       
    });

	//GET ALL DATA
	$(function(){
            $('#obat-tables').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 3 ] }
                ],
               ajax: '{!! route('obat.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_obat',
                     data: 'nama_obat',
                  },
                  {
                     name: 'dosis_obat',
                     data: 'dosis_obat',
                  },
                  {
                     name: 'harga_obat',
                     data: 'harga_obat',
                  },
				  {
                     name: 'jenis_obat',
                     data: 'jenis_obat',
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