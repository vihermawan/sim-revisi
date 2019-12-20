@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Pendaftaran Rawat Jalan</h5>
	</div>

	<div class="card-body">
        <form id="addForm" name="addForm">
            <div class="row">
            	<div class="col-md-6">
				<div class="alert alert-danger print-error-msg" style="display:none">
					<ul></ul>
				</div>
                    <fieldset>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Pasien </label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="pasien" id="searchPasien">
								<div id="pasienValidation" style="color:red; margin-top:5px;"></div>
							</div>
						</div>
						
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Detail Pasien  </label>
                            <div class="col-lg-9">
								<span style="font-weight: bold" id="namaPasien"></span>
								<span id="detailPasien"> </span>
							</div>
                        </div>

						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Diagonosa </label>
                            <div class="col-lg-9">
								<select class="form-control select2"  name="diagnosa">
                                    @foreach($diagnosa as $data)
									<option value="{{$data->id}}">{{$data->alasan_diagnosa}}</option>
									@endforeach
									<div id="diagnosaValidation" style="color:red; margin-top:5px;"></div>
                                </select>
								
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Poliklinik</label>
							<div class="col-lg-9">
								<select class="form-control select select2"  name="poli">
									<option disabled selected>Pilih Poli</option>
                                    @foreach($poli as $data)
									<option value="{{$data->id}}">{{$data->nama_poli}}</option>
									@endforeach
									<div id="poliValidation" style="color:red; margin-top:5px;"></div>
                                </select>
								
							</div>
						</div>

						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Keterangan </label>
                            <div class="col-lg-9">
                                <textarea id="ketket" class="form-control" name="keterangan"></textarea> 
								<div id="ketValidation" style="color:red; margin-top:5px;"></div>
							</div>
						</div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>  
	
	<table class="table datatable-basic" id="poli">
		<thead>
			<tr>
				<th>id</th>
				<th>Nama Dokter</th>
				<th class="text-right">#</th>
			</tr>
		</thead>
		<tbody>

		
			
		</tbody>
	</table>
</div>

				<!-- Basic modal -->
				<div id="modal_default" class="modal fade" tabindex="-1" data-backdrop="false">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Basic modal</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<table class="table datatable-basic" id="pasien">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Pasien</th>
											<th>Alamat</th>
											<th>Tanggal Lahir</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal" id="closeModal">Close</button>
								<button type="button" class="btn bg-primary" id="saveModal">Save changes</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /basic modal -->

@endsection

@push('scripts')
<script>

$(document).ready(function(){  

	$('.select2').select2();

	$('#searchPasien').keypress(function (e) {
		var key = e.which;
		if(key == 13)  // the enter key code
		{
			let a = $(this).val();
			$("#modal_default").modal('show');

			let dTable = $('#pasien').DataTable({
				order: [[ 2, "asc" ]],
				prossessing: true,
				serverside: true,
				"bDestroy": true,
				select: true,
				ajax: {
					url : "{{ route('rawatJalan.searchPasien') }}",
					data: {q: a}
				},
				columns: [
					{ name: 'id', data: 'DT_RowIndex' },
					{
						name: 'nama_pasien',
						data: 'nama_pasien',
					},
					{
						name: 'alamat',
						data: 'alamat',
					},
					{
						name: 'tanggal_lahir',
						data: 'tanggal_lahir',
					},
				]
    		});

			$('#pasien tbody').on( 'click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				} else {
					dTable.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
					var d = dTable.row(this).data();

					$('#closeModal').on( 'click', function () {
						$("#addForm")[0].reset();
						location.reload();
					});

					$('#saveModal').on( 'click', function () {
						$('#searchPasien').val(d.id)
						$('#namaPasien').html(d.nama_pasien);  
						$('#detailPasien').html('{ RM: ' + d.id + ' } <br/> ' + d.tanggal_lahir + ' | ' + d.alamat);  
						$("#modal_default").modal('hide');
					});
				}
			} );


			return false;
		}
	});
	


	$('.select').on('change', function() {
		$('#poli').DataTable({
			prossessing: true,
			serverside: true,
			"bDestroy": true,
			"columnDefs": [
                    { className: "text-right", "targets": [ 2] }
                ],
			ajax: {
				url : "{{ route('rawatJalan.searchPoli') }}",
				data: {id: this.value}
			},
			columns: [
			{
				name: 'id',
				data: 'DT_RowIndex',
			},

			{
				name: 'nama_dokter',
				data: 'nama_dokter',
			},
			{
				name: 'Actions',
				data: 'action',
			},

			]
		});

	});

	$(document).on('click', '.daftar-rawatjalan', function(){
		let idDokter= $(this).attr('id');
		Swal.fire({
			title: 'Harap Konfirmasi',
			text: "Pasien masih memiliki tagihan, lanjutkan pendaftaran??",
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
					url: "{{ route('rawatJalan.daftar') }}",
					method: "post",
					data: {
						idDokter:idDokter,
						pasien: $("input[name='pasien']").val(),
						diagnosa: $("select[name='diagnosa']").val(),
						poli: $("select[name='poli']").val(),
						keterangan: $("#ketket").val(),
						formData: JSON.parse(JSON.stringify($('#addForm').serializeArray()))
						
					},
					success: function(data){
						console.log(data);
						if($.isEmptyObject(data.error)){
                        	
							$("#addForm")[0].reset();
							$('#namaPasien').html('');  
							$('#detailPasien').html('');  
							Swal.fire({
								type: 'success',
								title: 'Berhasil!',
								text: 'Pasien berhasil di daftar!',
							});
						}else{
							printErrorMsg(data.error);
						}
					}
				});
			}
		});
		function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });

 });
</script>
@endpush