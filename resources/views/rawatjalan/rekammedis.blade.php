@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Basic datatable</h5>
	</div>

	<table class="table datatable-basic" id="rekammedis-table">
		<thead>
			<tr>
				<th>Dokter</th>
				<th>No. RM</th>
				<th>Nama Pasien</th>
				<th>Tanggal Lahir</th>
				<th>Tindakan</th>
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
		$('#rekammedis-table').DataTable({
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