@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Informasi Pasien Rawat Inap</h5>
	</div>

	<table class="table datatable-basic" id="pasieninap">
		<thead>
			<tr>
				<th>No</th>
				<th>Ruang</th>
				<th>No RM</th>
				<th>Nama Pasien</th>
				<th>Alamat</th>
				<th>Status</th>
			</tr>
		</thead>
	</table>
</div>

@endsection

@push('scripts')
<script>
     //GET ALL DATA
     $(function(){
            $('#pasieninap').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 4 ] }
                ],
               ajax: '{!! route('inap.dataJSON') !!}',
               columns: [
				  { name: 'id_transaksi_rawat_inap', data: 'DT_RowIndex' },
                  {
                     name: 'nama_ruang',
                     data: 'nama_ruang',
                  },
                  {
                     name: 'id_pasien',
                     data: 'id_pasien',
                  },
                  {
                     name: 'nama_pasien',
                     data: 'nama_pasien',
                  },
                  {
                     name: 'alamat',
                     data: 'alamat',
                  },
               ]
            });
         });
</script>
@endpush