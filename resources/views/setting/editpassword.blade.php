@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Basic datatable</h5>
	</div>

	<table id="tabel-user" class="table datatable-basic">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Role</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>

@endsection

@push('scripts')
<script>
$(document).on('click', '.add-data', function(e){
	e.preventDefault();

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
		},
		url: "{{ route('user.add') }}",
		method: "POST",
		data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
		success: function(data){
			Swal.fire({
				type: 'success',
				title: 'Ruang berhasil di ditambah!',
				text: 'Ruangan  anda telah berhasil ditambahkan!',
			});
			$("#addForm")[0].reset();
			$('#add-modal').modal('hide');
			$('#tabel-user').DataTable().ajax.reload();
		}
	});
});

//GET ALL DATA
$(function(){
	$('#tabel-user').DataTable({
		prossessing: true,
		serverside: true,
		"bDestroy": true,
		"columnDefs": [
			{ className: "text-center", "targets": [ 4 ] }
		],
		ajax: '{!! route('password.dataJSON') !!}',
		columns: [
			{ 
				name: 'id',
				data: 'DT_RowIndex'
			},
			{
				name: 'nama_user',
				data: 'nama_user'
			},
			{
				name: 'email',
				data: 'email',
			},
			{
				name: 'role_user',
				data: 'role_user',
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