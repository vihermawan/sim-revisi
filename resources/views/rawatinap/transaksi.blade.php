@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">lol datatable</h5>
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

@endsection

@push("scripts")
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
				url : "{{ route('rawatInap.transaksi') }}",
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
	});

</script>

@endpush