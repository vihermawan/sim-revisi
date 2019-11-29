@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Basic datatable</h5>
	</div>
    
	<table id="ruang-tables" class="table datatable-basic">
		<thead>
			<tr>
                <th>No.</th>
                <th>Kode Ruang</th>
                <th>Nama Ruang</th>
                <th>Status</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>

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
                                <label class="col-lg-3 col-form-label">Kode Ruang:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" id="kode-ruang" name="kode_ruang"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Ruang:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" id="nama-ruang" name="nama_ruang"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Status</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="hidden" id="status-ruang" name="status_ruang"/>
                                    <select id="select-status-ruang" name="status" class="form-control">
                                        <option value="0">Kosong</option>
                                        <option value="1">Penuh</option>
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
    //edit ruangan
    $(document).on('click', '.edit-ruangan-data', function(){
         var id = $(this).attr("id");
         $('.edit_ruangan').attr("id", id);
         $.get('ruang/' + id +'/edit', function (data) {
            $('#editForm #kode-ruang').val(data.kode_ruang);
            $('#editForm #nama-ruang').val(data.nama_ruang);
            $('#select-status-ruang').find('option[value='+data.status_ruang+']').prop('selected', true);
            $('#select-status-ruang').on('change', function(){
                  var status = $(this).val();
                  $('#editForm #status-ruang').val(status);
              });
            $('#edit-modal').modal('show');
        })
    });

    $(document).on('click', '.edit_ruangan', function(e){
        e.preventDefault();
         var id = $(this).attr("id");
        
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: '{!! route('ruang.update') !!}',
            method: "put",
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
           url: '{!! route('ruang.delete') !!}',
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil dihapus!',
                    text: 'Data Ruang telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#ruang-tables').DataTable().ajax.reload();
           }
        });
       
    });

    //GET ALL DATA
    $(function(){
        $('#ruang-tables').DataTable({
            order: [
                [ 0, "asc" ],
            ],
            prossessing: true,
            serverside: true,
            "bDestroy": true,
            "columnDefs": [
                { className: "text-center", "targets": [ 4 ] }
            ],
            ajax: '{!! route('ruang.dataJSON') !!}',
            columns: [
                { 
                    name: 'no_rm', 
                    data: 'DT_RowIndex' 
                },
                {
                    name: 'kode_ruang',
                    data: 'kode_ruang'
                },
                {
                    name: 'nama_ruang',
                    data: 'nama_ruang'
                },
                {
                    name: 'status_ruang',
                    data: 'status_ruang',
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