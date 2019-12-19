@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
        <h5 class="card-title">Table Tindakan</h5>
	</div>

	<table class="table datatable-basic" id="tindakan-tables">
		<thead>
			<tr>
				<th>Dokter</th>
				<th>No. RM</th>
				<th>Nama Pasien</th>
                <th>Tanggal Lahir
				<th class="text-center">Tindakan</th>
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
		$('#tindakan-tables').DataTable({
			prossessing: true,
			serverside: true,
			"bDestroy": true,
			"columnDefs": [
                    { className: "text-center", "targets": [ 3 ] }
                ],
			ajax: {
				url : "{{ route('rawatJalan.rekam-medis-json') }}",
			},
			columns: [
			{
				name: 'nama_dokter',
				data: 'nama_dokter',
			},
			{
				name: 'no_rm',
				data: 'id',
			},
			{
				name: 'nama_pasien',
				data: 'nama_pasien',
			},
			{
				name: 'tanggal_lahir',
				data: 'tanggal_lahir',
			},
			{
				name: 'tindakan',
				data: 'tindakan',
			},

			]
		});
	
	});

</script>

</script>


@endpush