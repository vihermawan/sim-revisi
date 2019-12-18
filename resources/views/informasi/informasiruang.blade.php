@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Informasi Ruang</h5>
	</div>

	<table id="ruang-tables" class="table datatable-basic">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Ruang</th>
					<th>Nama Ruang</th>
					<th>Status</th>
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
            $('#ruang-tables').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 4 ] }
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