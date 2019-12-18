@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Basic datatable</h5>
	</div>

	<div class="card-body">
        <form id="addForm" name="addForm">
            <div class="row">
            	<div class="col-md-6">
                    <fieldset>
                        <div class="form-group row">
							<label class="col-form-label col-lg-2">Tanggal</label>
								<div class="col-lg-6">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">
												<input type="checkbox" checked>
											</span>
										</span>
										<input type="text" class="form-control" placeholder="Default checkbox addon">
									</div>
								</div>
							</div>
                    </fieldset>
                </div>
				<div class="col-md-6 text-right mr-0">
					<fieldset>
                        <div class="form-group row">
							<label class="col-form-label col-lg-6">Tanggal</label>
								<div class="col-lg-6">
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">
												<input type="checkbox" checked id="tanggal_checked">
											</span>
										</span>
										<input type="date" class="form-control tanggal" placeholder="Default checkbox addon" disabled id="tanggal">
									</div>
								</div>
							</div>
                    </fieldset>
				</div>
            </div>
        </form>
    </div>  

	<table class="table datatable-basic" id="transaksi">
		<thead>
			<tr>
				<th>Dokter</th>
				<th>No. RM</th>
				<th>Nama Pasien</th>
				<th>Tanggal Lahir</th>
				<th>Tanggal Kunjungan</th>
				<th class="text-center">Tindakan</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>


<!-- Basic modal -->
<div id="mutasi-modal" class="modal fade" tabindex="-1" data-backdrop="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Basic modal</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<table class="table datatable-basic" id="ruang">
					<thead>
						<tr>
							<th>Kode Ruang</th>
							<th>Nama Ruang</th>
							<th>Tindakan</th>
						</tr>
					</thead>
				</table>
				<input type="date" class="form-control tanggal" placeholder="Default checkbox addon" disabled id="tanggal">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link " data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- /basic modal -->

@endsection

@push('scripts')
<script>
	$(document).ready(function(){
		$('#transaksi').DataTable({
			prossessing: true,
			serverside: true,
			"bDestroy": true,
			"order": [[ 4, "desc" ]],
			"columnDefs": [
                    { className: "text-center", "targets": [ 5 ] }
                ],
			ajax: {
				url : "{{ route('rawatJalan.transaksi') }}",
				data: {id: this.value}
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
				name: 'tanggal_kunjungan',
				data: 'tanggal_kunjungan',
			},
			{
				name: 'tindakan',
				data: 'tindakan',
			},

			]
		});


		Date.prototype.toDateInputValue = (function() {
			var local = new Date(this);
			local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
			return local.toJSON().slice(0,10);
		});

			let dateNow = new Date().toDateInputValue();
			$(".tanggal").val(dateNow);



	});

	$(document).on('click', '.mutasi-pasien', function(){
		$("#mutasi-modal").modal("show");
		let idRawatJalan = $(this).attr("id");

		$('#ruang').DataTable({
			prossessing: true,
			serverside: true,
			"bDestroy": true,
			"columnDefs": [
                    { className: "text-center", "targets": [ 2 ] }
                ],
			ajax: {
				url : "{{ route('rawatJalan.mutasiRuang') }}",
			},
			columns: [
			{
				name: 'koderuang',
				data: 'koderuang',
			},
			{
				name: 'namaruang',
				data: 'namaruang',
			},
			{
				name: 'tindakan',
				data: 'tindakan',
			},

			]
		});

		$(document).on('click', '.mutasi-proses', function(){
			Swal.fire({
			title: 'Harap Konfirmasi',
			text: "Mutasi Pasien?",
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
					url: "{{ route('rawatJalan.mutasi-pasien') }}",
					method: "post",
					data: {idRawatJalan: idRawatJalan, idRuang: $(this).attr("id"), tanggal: $('.tanggal').val()},
					success: function(data){
						console.log(data);
						$('#mutasi-proses').DataTable().ajax.reload();
						$("#mutasi-modal").modal("hide");
						Swal.fire({
							type: 'success',
							title: 'Berhasil!',
							text: 'Pasien berhasil di daftar!',
						});
					}
					});
				}
			})
		
		});

    });

	$(document).on('click', '.rajal-invoice', function(){
			Swal.fire({
				title: 'Harap Konfirmasi',
				text: "Apakah data sudah benar??",
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
						url: "{{ route('rawatJalan.invoice') }}",
						method: "post",
						data: {id: $(this).attr("id")},
						success: function(data){
							console.log(data);
							$('#rajal-invoice').DataTable().ajax.reload();
							Swal.fire({
								type: 'success',
								title: 'Berhasil!',
								text: 'Proses berhasil',
							});
						}
					});
				}
			})
		});

</script>

@endpush