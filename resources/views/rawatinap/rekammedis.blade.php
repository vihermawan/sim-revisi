@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Basic datatable</h5>
	</div>

	<table class="table datatable-basic" id="transaksi">
		<thead>
			<tr>
				<th>Dokter</th>
				<th>No. RM</th>
				<th>Nama Pasien</th>
				<th>Tanggal Lahir</th>
				<th class="text-center">Tindakan</th>
			</tr>
		</thead>
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
                    { className: "text-center", "targets": [ 4 ] }
                ],
			ajax: {
				url : "{{ route('rawatInap.rekamMedisData') }}",
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
				name: 'tindakan',
				data: 'tindakan',
			},

			]
		});

	});

</script>

@endpush