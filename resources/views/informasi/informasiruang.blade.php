@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Informasi Ruang</h5>
         <div class="row">
            <div class="col-md-12 text-right">
               <button class="btn bg-success" id="tambahRuangBtn">Tambah Ruang</button>
            </div>
         </div>
	</div>
   

	<table id="ruang-tables" class="table datatable-basic">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Ruang</th>
					<th>Nama Ruang</th>
					<th>Status</th>
				</tr>
			</thead>
	</table>
</div>



<!-- Add ruang modal -->
<div id="tambahRuangModal" class="modal fade" tabindex="-1" data-backdrop="false">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Ruang</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
                <form id="addRuangForm">
                  <div class="form-group row">
                     <label class="col-lg-3 col-form-label">Kode Ruang</label>
                     <div class="col-lg-9">
                        <input type="text" name="kode_ruang" class="form-control"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-lg-3 col-form-label">Nama Ruang</label>
                     <div class="col-lg-9">
                        <input type="text" name="nama_ruang" class="form-control"/>
                        <input type="hidden" name="status_ruang" value="0" class="form-control"/>
                     </div>
                  </div>   
                </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal" id="closeModal">Close</button>
				<button type="button" class="btn bg-primary" id="saveModalRuang">Save changes</button>
			</div>
		</div>
	</div>
</div>



<!-- edit ruang modal -->
<div id="editRuangModal" class="modal fade" tabindex="-1" data-backdrop="false">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Ruang</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
                <form id="editRuangForm">
                  <div class="form-group row">
                     <label class="col-lg-3 col-form-label">Kode Ruang</label>
                     <div class="col-lg-9">
                        <input type="text" name="kode_ruang" class="form-control"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-lg-3 col-form-label">Nama Ruang</label>
                     <div class="col-lg-9">
                        <input type="text" name="nama_ruang" class="form-control"/>
                        <input type="hidden" name="status_ruang" class="form-control"/>
                     </div>
                  </div>   
                </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal" id="closeModal">Close</button>
				<button type="button" class="btn bg-primary" id="editModalRuang">Save changes</button>
			</div>
		</div>
	</div>
</div>


@endsection

@push('scripts')
<script>
    //GET ALL DATA
    $(function(){
            $('#ruang-tables').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 3 ] }
                ],
               ajax: '{!! route('informasiruang.dataJSON') !!}',
               columns: [
				  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'kode_ruang',
                     data: 'kode_ruang',
                  },
                  {
                     name: 'nama_ruang',
                     data: 'nama_ruang',
                  },
                  {
                     name: 'status_ruang',
                     data: 'status_ruang',
                     
                     render: function(data){
                        return data == '0' ? 'Kosong' : 'Terisi';
                     }
                  },
                  {
                     name: 'action',
                     data: 'action',
                  },
               ]
            });

            $(document).on('click','#tambahRuangBtn', function(){
               console.log("dasa");
               $("#tambahRuangModal").modal('show');

               $(document).on('click', '#saveModalRuang', function(){
                Swal.fire({
                    title: 'Harap Konfirmasi',
                    text: "Apalah data rekam medis sudah benar??",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Lanjutkan'
                    }).then((result) => {
                    
                    if (result.value) {
                        $.ajax({
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                            },
                            url: "{{ route('ruang.tambahRuang') }}",
                            method: "post",
                            data: {formData: JSON.parse(JSON.stringify($('#addRuangForm').serializeArray())) },
                            success: function(data){
                                console.log(data);
                                Swal.fire({
                                    type: 'success',
                                    title: 'Berhasil!',
                                    text: 'Ruang berhasil di daftar!',
                                });
                                $("#addRuangForm")[0].reset();
                                $("#tambahRuangModal").modal('hide');
                                $('#ruang-tables').DataTable().ajax.reload();
                            }
                        });
                    }
                })
                return false;
               });
            });

            $(document).on('click', '.hapusRuangBtn', function(){
               let id = $(this).attr("id");
               Swal.fire({
                  title: 'Harap Konfirmasi',
                  text: "Anda tidak dapat mengembalikan data yang telah ada hapus!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Lanjutkan'
                  }).then((result) => {
                  
                  if (result.value) {
                     $.ajax({
                           headers: {
                           'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                           },
                           url: "{{ route('ruang.deleteRuang') }}",
                           method: "post",
                           data: {id: id},
                           success: function(data){
                              console.log(data);
                              Swal.fire({
                                 type: 'success',
                                 title: 'Berhasil!',
                                 text: 'Ruang berhasil di hapus!',
                              });
                              $('#ruang-tables').DataTable().ajax.reload();
                           }
                     });
                  }
               })
               return false;
            });

            //edit data
         $(document).on('click', '.editRuangBtn', function(){
            id = $(this).attr('id');
            $("#editRuangModal").attr('data-id', id);
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                url: "{{ route('ruang.editRuangan') }}",
                method: "get",
                data: {id: id},
                success: function(data){
                    console.log(data);
                    $('#editRuangForm input[name="kode_ruang"]').val(data.kode_ruang);
                    $('#editRuangForm input[name="nama_ruang"]').val(data.nama_ruang);
                    $('#editRuangForm input[name="status_ruang"]').val(data.status_ruang); 
                    $("#editRuangModal").modal("show")
                }
            });

            $(document).on('click', '#editModalRuang', function(){
                Swal.fire({
                    title: 'Harap Konfirmasi',
                    text: "Apalah data rekam medis sudah benar??",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Lanjutkan'
                    }).then((result) => {
                    
                    if (result.value) {
                        $.ajax({
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                            },
                            url: "{{ route('ruang.updateRuang') }}",
                            method: "post",
                            data: {id: id, formData: JSON.parse(JSON.stringify($('#editRuangForm').serializeArray())) },
                            success: function(data){
                                console.log(data);
                                Swal.fire({
                                    type: 'success',
                                    title: 'Berhasil!',
                                    text: 'Pasien berhasil di daftar!',
                                });
                                $("#editRuangForm")[0].reset();
                                $("#editRuangModal").modal('hide');
                                $('#ruang-tables').DataTable().ajax.reload();
                            }
                        });
                    }
                })
                return false;
               });
    
         });

      });
</script>
@endpush