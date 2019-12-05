@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Tabel Pasien</h5>
    </div>
    <div class="card-header">
        <form id="addForm">
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">No. RM </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="id_pasien"  value="{{$rawatJalan->id_pasien}}" readonly="readonly" id="idPasien">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Pasien </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="nama_pasien"  value="{{$rawatJalan->nama_pasien}}" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Tgl. Lahir </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="tanggal_lahir"  value="{{$rawatJalan->tanggal_lahir}}" readonly="readonly">
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <ul class="nav nav-tabs nav-tabs-top nav-justified">
            <li class="nav-item"><a href="#top-justified-tab1" class="nav-link active" data-toggle="tab">Transaksi Medis</a></li>
            <li class="nav-item"><a href="#top-justified-tab2" class="nav-link" data-toggle="tab">Rekam Medis</a></li>
            <li class="nav-item"><a href="#top-justified-tab3" class="nav-link" data-toggle="tab">Tindakan Medis</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="top-justified-tab1">
                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Poli</th>
                            <th>Ruang</th>
                            <th>Tanggal Pulang</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="top-justified-tab2">
                <table class="table datatable-basic" id="rekamMedisTable">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Dokter</th>
                            <th>ICD</th>
                            <th>Diagnosa</th>
                            <th>Anamesa</th>
                            <th>P.Fisik</th>
                            <th>P.Penunjang</th>
                            <th>Jenis</th>
                            <th>Poli</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="top-justified-tab3">
                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Dokter</th>
                            <th>Tindakan</th>
                            <th>Data</th>
                            <th>ICD9-CM</th>
                            <th>Jenis Rawat</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
        
</div>






@endsection

@push('scripts')
<script>
    $('.select2').select2();

    $(document).ready(function(){
        $("#tambahRM").on('click', function(){
            $("#modal_default").modal('show');

             //simpan data
            $(document).on('click', '#saveModalRM', function(){
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
                            url: "{{ route('rawatJalan.tambahRM') }}",
                            method: "post",
                            data: {formData: JSON.parse(JSON.stringify($('#addFormRM').serializeArray())) },
                            success: function(data){
                                console.log(data);
                                Swal.fire({
                                    type: 'success',
                                    title: 'Berhasil!',
                                    text: 'Pasien berhasil di daftar!',
                                });
                                $("#addFormRM")[0].reset();
                                $("#modal_default").modal('hide');
                                $('#rekamMedisTable').DataTable().ajax.reload();
                            }
                        });
                    }
                })
                return false;
            });
        });


        //delete transaksi
        $(document).on('click', '#hapusTransaksi', function(){
            let id = $("#idRawatJalan").val();
            Swal.fire({
                title: 'Harap Konfirmasi',
                text: "Anda tidak dapat mengembalikan data yang telah ada hapus!",
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
                        url: "{{ route('rawatJalan.deleteTransaksi') }}",
                        method: "post",
                        data: {id: id},
                        success: function(data){
                            console.log(data);
                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Pasien berhasil di hapus!',
                            });
                            window.location.href = "{{ route('rawatJalan.transaksiIndex')}}";
                        }
                    });
                }
            })
            return false;
        });

        //simpan data
        $(document).on('click', '#simpanTransaksi', function(){
            let id = $("#idRawatJalan").val();
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
                        url: "{{ route('rawatJalan.simpanTransaksi') }}",
                        method: "post",
                        data: {id:id, formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
                        success: function(data){
                            console.log(data);
                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Pasien berhasil di daftar!',
                            });
                        }
                    });
                }
            })
            return false;
        });

        $('#rekamMedisTable').DataTable({
			prossessing: true,
			serverside: true,
			"bDestroy": true,
			ajax: {
				url : "{{ route('rawatJalan.detailRMJSON') }}",
				data: {id: $("#idPasien").val()}
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
				name: 'diagnosa',
				data: 'diagnosa',
			},
			{
				name: 'anamnesa',
				data: 'anamnesa',
			},
            {
				name: 'Rfisik',
				data: 'Rfisik',
			},
            {
				name: 'Rpenunjang',
				data: 'Rpenunjang',
			},
            {
				name: 'kasus',
				data: 'kasus',
			},

			]
		});


        Date.prototype.toDateInputValue = (function() {
			var local = new Date(this);
			local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
			return local.toJSON().slice(0,10);
		});

		let dateNow = new Date().toDateInputValue();
		$("#tanggal").val(dateNow);

    });
</script>

@endpush
