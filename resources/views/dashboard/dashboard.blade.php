@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<!-- Content area -->

		<!-- Main charts -->
		<div class="row">
			<div class="col-xl-12">			

				<!-- Traffic sources -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h6 class="card-title">Beranda</h6>
					</div>

					<div class= "card-body">
						<div class="row">
							<div class="col-lg-4" style="text-align:center;">
							<div class="card" style="background:teal">
									<div class="card-body" style="color:white;font-size:24px">
										<i class="icon-user fa-2x" style="padding-right:12px;font-size:24px"></i>
										<span>Pasien</span>
					                	<div>
									</div>
								</div>
							</div>
						</div>
							<div class="col-lg-4" style="text-align:center;">
							<div class="card" style="background:teal">
									<div class="card-body" style="color:white;font-size:24px">
										<i class="icon-help fa-2x" style="padding-right:12px;font-size:24px"></i>
										<span>Informasi</span>
					                	<div>
									</div>
								</div>
							</div>
						</div>
							<div class="col-lg-4" style="text-align:center;">
							<div class="card" style="background:teal">
									<div class="card-body" style="color:white;font-size:24px">
										<i class="icon-accessibility2 fa-2x" style="padding-right:12px;font-size:24px"></i>
										<span>Rawat Jalan</span>
					                	<div>
									</div>
								</div>
							</div>
						</div>
							<div class="col-lg-4" style="text-align:center;">
							<div class="card" style="background:teal">
									<div class="card-body" style="color:white;font-size:24px">
										<i class="icon-bed2" style="padding-right:12px;font-size:24px"></i>
										<span>Rawat Inap</span>
					                	<div>
									</div>
								</div>
							</div>
						</div>
							<div class="col-lg-4" style="text-align:center;">
							<div class="card" style="background:teal">
									<div class="card-body" style="color:white;font-size:24px">
										<i class="icon-list-unordered fa-2x" style="padding-right:12px;font-size:24px"></i>
										<span>Lainnya</span>
					                	<div>
									</div>
								</div>
							</div>
						</div>
							<div class="col-lg-4" style="text-align:center;">
							<div class="card" style="background:teal">
									<div class="card-body" style="color:white;font-size:24px">
										<i class="icon-list-unordered fa-2x" style="padding-right:12px;font-size:24px"></i>
										<span>Settings</span>
					                	<div>
									</div>
								</div>
							</div>
							</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /traffic sources -->

			</div>	

			</div>
		</div>
		<!-- /dashboard content -->
@endsection