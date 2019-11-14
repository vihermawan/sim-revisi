@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Basic datatable</h5>
	</div>

    <div class="card-header header-elements-inline">
        <button type="button" class="btn bg-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Ruangan</button>
    </div>
    
	<table id="ruang-tables" class="table datatable-basic">
		<thead>
			<tr>
                <th>No.</th>
                <th>Nama Ruang</th>
                <th>Kelas</th>
                <th>Status</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>


<!--Modal show ruangan -->
<div id="add-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">Form Rawat Inap</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="addForm" name="addForm">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama :</label>
                                <div class="col-lg-9">
                                    <input name="nama_ruangan" type="text" class="form-control" placeholder="nama ruangan.. ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Kelas:</label>
                                <div class="col-lg-9">
                                    <select name="id_kelas" class="form-control">
                                      @foreach ($kelas as $data)
                                        <option value="{{$data->id_kelas}}">{{$data->nama_kelas}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Status</label>
                              <div class="col-lg-6">
                                  <select name="status" class="form-control">
                                      <option value="1">Penuh</option>
                                      <option value="0">Kosong</option>
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
                <button type="button" class="btn bg-success add_ruangan">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal show ruangan-->

<!--Modal edit ruangan -->
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
                                <label class="col-lg-3 col-form-label">Kelas:</label>
                                <div class="col-lg-9">
                                    <select name="id_kelas" class="form-control">
                                      @foreach ($kelas as $data)
                                        <option value="{{$data->id_kelas}}">{{$data->nama_kelas}}</option>
                                      @endforeach
               
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Status</label>
                              <div class="col-lg-6">
                                  <select name="status" class="form-control">
                                      <option value="1">Penuh</option>
                                      <option value="0">Kosong</option>
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
                <button type="button" class="btn bg-success edit_ruangan">Save changes</button>
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
                <button type="button" class="btn bg-danger delete_ruangan">Delete</button>
            </div>
        </div>
    </div>
</div>
 <!--End Modal delete-->

@endsection

@push('scripts')
<script>

    //add ruangan

    $(document).on('click', '.add_ruangan', function(e){
        e.preventDefault();

         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('ruang.addRuang') }}",
            method: "post",
            data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
            success: function(data){
               Swal.fire({
                  type: 'success',
                  title: 'Ruang berhasil di ditambah!',
                  text: 'Ruangan  anda telah berhasil ditambahkan!',
               });
               $("#addForm")[0].reset();
               $('#add-modal').modal('hide');
               $('#ruang-tables').DataTable().ajax.reload();
            }
         });
        
      });

    //edit ruangan
    $(document).on('click', '.edit-ruangan-data', function(){
         var id = $(this).attr("id");
         $('.edit_ruangan').attr("id", id);
    });

    $(document).on('click', '.edit_ruangan', function(e){
        e.preventDefault();
         var id = $(this).attr("id");
        
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('ruang.editRuang') }}",
            method: "post",
            data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
            success: function(data){
               Swal.fire({
                  type: 'success',
                  title: 'Ruang berhasil di ubah!',
                  text: 'Ruangan yang anda pilih telah diubah!',
               });
               $('#edit-modal').modal('hide');
               $('#ruang-tables').DataTable().ajax.reload();
            }
         });
        
      });

    // delete ruangan
    $(document).on('click', '.delete-ruang-data', function(){
       var id = $(this).attr("id");
       $('.delete_ruangan').attr("id", id);
    });

    $(document).on('click', '.delete_ruangan', function(){
        var id = $(this).attr("id"); 
        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
           },
           url: "{{ route('ruang.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil dihapus!',
                    text: 'Pembayaran yang anda pilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#ruang-tables').DataTable().ajax.reload();
           }
        });
       
    });

     //GET ALL DATA
     $(function(){
            $('#ruang-tables').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 4 ] }
                ],
               ajax: '{!! route('ruang.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_ruang',
                     data: 'nama_ruang'
                  },
                  {
                     name: 'nama_kelas',
                     data: 'nama_kelas',
                  },
                  {
                     name: 'status_ruang',
                     data: 'status_ruang',
                     sortable: false,
                     render: function(data){
                        return data == 1 ? 'penuh' : 'kosong';
                     }
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