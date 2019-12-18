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


		$(document).on('click', '.ranip-invoice', function(){
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
						url: "{{ route('rawatInap.invoice') }}",
						method: "post",
						data: {id: $(this).attr("id")},
						success: function(data){
							console.log(data);
							$('#transaksi').DataTable().ajax.reload();
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
	});

</script>

@endpush