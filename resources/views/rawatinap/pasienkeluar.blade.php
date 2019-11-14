@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Basic datatable</h5>
	</div>

	<table class="table datatable-basic">
		<thead>
			<tr>
                <th>No.</th>
                <th>Nama Pasien</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Petugas</th>
			</tr>
		</thead>
		<tbody>
            @php $no = 1; @endphp
            @foreach ($pasienkeluar as $data) 
                <tr>
                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>{{$no++}}</td>
                    <td class="footable-visible">{{$data->nama_pasien}}</td>
                    <td class="footable-visible">{{$data->tanggal_masuk}}</td>
                    <td class="footable-visible">{{$data->tanggal_keluar}}</td>
                    <td class="footable-visible"><span class="badge badge-success">{{$data->nama_user}}</span></td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>

@endsection