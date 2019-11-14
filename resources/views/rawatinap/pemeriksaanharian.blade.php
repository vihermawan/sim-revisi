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
				<th>First Name</th>
				<th>Last Name</th>
				<th>Job Title</th>
				<th>DOB</th>
				<th>Status</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>Maxwell</td>
				<td>Maben</td>
				<td>Regional Representative</td>
				<td>25 Feb 1988</td>
				<td><span class="badge badge-danger">Suspended</span></td>
				<td class="text-center">
					<div class="list-icons">
						<div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
								<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
								<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
							</div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>Cicely</td>
				<td>Sigler</td>
				<td><a href="#">Senior Research Officer</a></td>
				<td>15 Mar 1960</td>
				<td><span class="badge badge-info">Pending</span></td>
				<td class="text-center">
					<div class="list-icons">
						<div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
								<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
								<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>

@endsection