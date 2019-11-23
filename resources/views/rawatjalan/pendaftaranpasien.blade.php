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
                    <fieldset>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Pasien </label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="pasien">
								<div class="pasien-list"></div>  
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
								<select class="form-control select"  name="diagnosa">
                                    @foreach($diagnosa as $data)
									<option value="{{$data->id}}">{{$data->alasan_diagnosa}}</option>
									@endforeach
                                </select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Poliklinik</label>
							<div class="col-lg-9">
								<select class="form-control select"  name="poli">
									<option disabled selected>Pilih Poli</option>
                                    @foreach($poli as $data)
									<option value="{{$data->id}}">{{$data->nama_poli}}</option>
									@endforeach
                                </select>
							</div>
						</div>

						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Keterangan </label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="keterangan"></textarea> 
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
				<th class="text-center">#</th>
			</tr>
		</thead>
		<tbody>

		
			
		</tbody>
	</table>
</div>


@endsection

@push('scripts')
<script>

$(document).ready(function(){  
      $('.search-pasien').keyup(function(){  
           let query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    },
                     url:"{{ route('pasien.autocomplete') }}",  
                     method:"GET",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                         console.log(data);
                          $('.pasien-list').fadeIn();  
                          $('.pasien-list').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){   
           let id = $(this).attr("id");
		   $('.search-pasien').val(id); 
           $('.search-pasien').attr('data-id', id);  
           $('.pasien-list').fadeOut();  
		   $.ajax({  
            	headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                url: "{{ route('rawatJalan.searchPasien') }}",  
                method:"GET",  
                data:{id:id},  
                success:function(data)  
                {  
                	console.log(data);
					$('#namaPasien').html(data.nama_pasien);  
					$('#detailPasien').html('{ RM: ' + data.id + ' } <br/> ' + data.created_at + ' | ' + data.alamat);  
                }  
            });  
      });  

	$('select').on('change', function() {
		$('#poli').DataTable({
			prossessing: true,
			serverside: true,
			"bDestroy": true,
			"columnDefs": [
                    { className: "text-center", "targets": [ 2] }
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
					data: {idDokter:idDokter, formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
					success: function(data){
						console.log(data);
						$("#addForm")[0].reset();
						$('#namaPasien').html('');  
						$('#detailPasien').html('');  
						Swal.fire({
							type: 'success',
							title: 'Berhasil!',
							text: 'Pasien berhasil di daftar!',
						});
					}
				});
			}
		})
    });

 });
</script>
@endpush