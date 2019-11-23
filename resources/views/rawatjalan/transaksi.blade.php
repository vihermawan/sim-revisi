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
				<th>No.</th>
				<th>Dokter</th>
				<th>No. RM</th>
				<th>Nama Pasien</th>
				<th>Tanggal Lahir</th>
				<th class="text-center">Tindakan</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

@endsection

@push('scripts')
<script>
	$(document).ready(function(){
		$('#transaksi').DataTable({
			prossessing: true,
			serverside: true,
			"bDestroy": true,
			"columnDefs": [
                    { className: "text-center", "targets": [ 5 ] }
                ],
			ajax: {
				url : "{{ route('rawatJalan.transaksi') }}",
				data: {id: this.value}
			},
			columns: [
			{
				name: 'id',
				data: 'DT_RowIndex',
			},

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


		Date.prototype.toDateInputValue = (function() {
			var local = new Date(this);
			local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
			return local.toJSON().slice(0,10);
		});

			let dateNow = new Date().toDateInputValue();
			$("#tanggal").val(dateNow);
			$("#tanggal_checked").val(dateNow);

			$("#tanggal_checked").change(function() {
				if(this.checked) {
					console.log(dateNow);
					$("#tanggal").attr("disabled", true)
				}else {
					$("#tanggal").removeAttr("disabled")
				}
			});
	});

</script>

@endpush