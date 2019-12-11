@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Informasi Jadwal Praktek</h5>
	</div>

	<table class="table datatable-basic" id="jadwal">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nama Poli</th>
				<th>Hari Buka</th>
				<th>Waktu Buka</th>
				<th>Waktu Tutup</th>
				<th>Nama Dokter</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>

@endsection

@push('scripts')
<script>
     //GET ALL DATA
     $(function(){
            $('#jadwal').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 6 ] }
                ],
               ajax: '{!! route('jadwal.dataJSON') !!}',
               columns: [
				  { name: 'id_dokter', data: 'DT_RowIndex' },
                  {
                     name: 'nama_poli',
                     data: 'nama_poli',
                  },
                  {
                     name: 'hari_buka',
                     data: 'hari_buka',
                  },
                  {
                     name: 'waktu_buka',
                     data: 'waktu_buka',
                  },
                  {
                     name: 'waktu_buka',
                     data: 'waktu_buka',
                  },
                  {
                     name: 'nama_dokter',
                     data: 'nama_dokter',
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