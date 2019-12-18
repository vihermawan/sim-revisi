@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card"> 
    <div class="card-body">
        <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-tabs-top nav-justified">
                <li class="nav-item"><a href="#top-justified-tab1" class="nav-link active" data-toggle="tab">Transaksi Medis</a></li>
                <li class="nav-item"><a href="#top-justified-tab2" class="nav-link" data-toggle="tab">Rekam Medis</a></li>
                <li class="nav-item"><a href="#top-justified-tab3" class="nav-link" data-toggle="tab">Tindakan Medis</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="top-justified-tab1">
                    <form id="addForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">No. RM</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="id_pasien"  value="{{$rawatJalan->id_pasien}}" readonly="readonly" id="idPasien">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Pasien </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="nama_pasien"  value="{{$rawatJalan->nama_pasien}}" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Tgl. Lahir </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control search-pasien" placeholder="Masukkan Nama Pasien" name="tanggal_lahir"  value="{{$rawatJalan->tanggal_lahir}}" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Tgl. Masuk </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control search-pasien" name="tanggal_kunjungan" value="{{$rawatJalan->tanggal_kunjungan}}" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Dokter</label>
                                    <div class="col-lg-6">
                                        <select class="form-control select select2"  name="dokter">
                                            @foreach($dokter as $data)
                                            <option value="{{$data->id}}" <?php echo ($data->id === $rawatJalan->id_dokter) ? 'selected' : '';?>>{{$data->nama_dokter}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Poliklinik</label>
                                    <div class="col-lg-6">
                                        <select class="form-control select select2"  name="poli">
                                            @foreach($poli as $data)
                                            <option value="{{$data->id}}" <?php echo ($data->id === $rawatJalan->id_poli) ? 'selected' : '';?>>{{$data->nama_poli}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6 text-right mr-0">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Catatan </label>
                                    <div class="col-lg-8">
                                        <textarea  name="catatan" rows="3" cols="3" class="form-control">{{$rawatJalan->catatan}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Alergi </label>
                                    <div class="col-lg-8">
                                        <textarea  name="alergi" rows="3" cols="3" class="form-control">{{$rawatJalan->alergi}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label"></label>
                                    <div class="col-lg-8">
                                        <input id="idRawatJalan" type="hidden" value="{{$rawatJalan->id_rawat_jalan}}" />
                                        <button class="btn bg-primary" id="simpanTransaksi">Simpan </button>
                                        <button class="btn bg-warning" id="hapusTransaksi">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="top-justified-tab2">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn bg-success" id="tambahRM">Tambah Rekam Medis</button>
                        </div>
                    </div>
                    <table class="table datatable-basic" id="rekamMedisTable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Dokter</th>
                                <th>ICD</th>
                                <th>Diagnosa</th>
                                <th>Anamnesa</th>
                                <th>P.Fisik</th>
                                <th>P.Penunjang</th>
                                <th>Jenis</th>
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
</div>


<!-- Add rekmed modal -->
<div id="modal_default" class="modal fade" tabindex="-1" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Basic modal</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
                <form id="addFormRM">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Anamnesa </label>
                                <div class="col-lg-9">
                                    <input type="hidden" name="id_pasien" value="{{$rawatJalan->id_pasien}}"/>
                                    <input type="hidden" name="status_rawat" value="rawat jalan"/>
                                    <textarea  name="anamnesa" rows="3" cols="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Pencarian ICD </label>
                                <div class="col-lg-9">
                                    <select class="form-control select select2"  name="icd">
                                        @foreach($icd as $data)
                                        <option value="{{$data->id}}">{{$data->nama_icd}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Diagnosa </label>
                                <div class="col-lg-9">
                                    <textarea  name="diagnosa" rows="3" cols="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Jenis Diagnosa</label>
                                <div class="col-lg-9">
                                    <select class="form-control select select2"  name="jenis_diagnosa">
                                        <option value="Diagnosa Primer">Diagnosa Primer</option>
                                        <option value="Diagnosa Sekunder">Diagnosa Sekunder</option>
                                        <option value="Diagnosa Masuk">Diagnosa Masuk</option>
                                        <option value="Diagnosa Keluar">Diagnosa Keluar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tanggal :</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Dokter</label>
                                <div class="col-lg-9">
                                    <select class="form-control select select2"  name="dokter">
                                        @foreach($dokter as $data)
                                        <option value="{{$data->id}}" <?php echo ($data->id === $rawatJalan->id_dokter) ? 'selected' : '';?>>{{$data->nama_dokter}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Jenis Kasus</label>
                                <div class="col-lg-9">
                                    <select class="form-control select select2"  name="jenis_kasus">
                                        <option value="Kasus Baru">Kasus Baru</option>
                                        <option value="Kasus Lama">Kasus Lama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Pemeriksaan Fisik </label>
                                <div class="col-lg-9">
                                    <textarea  name="pemeriksaan_fisik" rows="3" cols="3" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Pemeriksaan Penunjang </label>
                                <div class="col-lg-9">
                                    <textarea  name="pemeriksaan_penujang" rows="3" cols="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Catatan </label>
                                <div class="col-lg-9">
                                    <textarea  name="catatan" rows="3" cols="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal" id="closeModal">Close</button>
				<button type="button" class="btn bg-primary" id="saveModalRM">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- edit rekmed modal -->
<div id="editRekmed" class="modal fade" tabindex="-1" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Basic modal</h5>
				<button type="button" class="close closeEditRM" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
                <form id="editFormRM">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Anamnesa </label>
                                <div class="col-lg-9">
                                    <input type="hidden" name="id_pasien" value="{{$rawatJalan->id_pasien}}"/>
                                    <input type="hidden" name="status_rawat" value="rawat jalan"/>
                                    <textarea  name="anamnesa" rows="3" cols="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Pencarian ICD </label>
                                <div class="col-lg-9">
                                    <select class="form-control select select2"  name="icd">
                                        @foreach($icd as $data)
                                        <option value="{{$data->id}}">{{$data->nama_icd}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Diagnosa </label>
                                <div class="col-lg-9">
                                    <textarea  name="diagnosa" rows="3" cols="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Jenis Diagnosa</label>
                                <div class="col-lg-9">
                                    <select class="form-control select select2"  name="jenis_diagnosa" id="jenis_diagnosa">
                                        <option value="Diagnosa Primer">Diagnosa Primer</option>
                                        <option value="Diagnosa Sekunder">Diagnosa Sekunder</option>
                                        <option value="Diagnosa Masuk">Diagnosa Masuk</option>
                                        <option value="Diagnosa Keluar">Diagnosa Keluar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tanggal :</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control" id="tanggal_edit" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Dokter</label>
                                <div class="col-lg-9">
                                    <select class="form-control select select2"  name="dokter">
                                        @foreach($dokter as $data)
                                        <option value="{{$data->id}}" <?php echo ($data->id === $rawatJalan->id_dokter) ? 'selected' : '';?>>{{$data->nama_dokter}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Jenis Kasus</label>
                                <div class="col-lg-9">
                                    <select class="form-control select select2"  name="jenis_kasus" id="editJenisKasus">
                                        <option value="Kasus Baru">Kasus Baru</option>
                                        <option  value="Kasus Lama">Kasus Lama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Pemeriksaan Fisik </label>
                                <div class="col-lg-9">
                                    <textarea  name="pemeriksaan_fisik" rows="3" cols="3" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Pemeriksaan Penunjang </label>
                                <div class="col-lg-9">
                                    <textarea  name="pemeriksaan_penujang" rows="3" cols="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Catatan </label>
                                <div class="col-lg-9">
                                    <textarea  name="catatan" rows="3" cols="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link closeEditRM" data-dismiss="modal" id="closeModal">Close</button>
				<button type="button" class="btn bg-primary" id="editModalRM">Save changes</button>
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
				name: 'tanggal',
				data: 'tanggal',
			},
            {
				name: 'nama_dokter',
				data: 'nama_dokter',
			},
            {
				name: 'nama_icd',
				data: 'nama_icd',
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
            {
				name: 'action',
				data: 'action',
			},

			]
		});


        //delete rekam medis
        $(document).on('click', '#hapusRM', function(){
            let id = $(this).attr("data-id");
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
                        url: "{{ route('rawatJalan.deleteRM') }}",
                        method: "post",
                        data: {id: id},
                        success: function(data){
                            console.log(data);
                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Rekam Medis berhasil di hapus!',
                            });
                            $('#rekamMedisTable').DataTable().ajax.reload();
                        }
                    });
                }
            })
            return false;
        });

        //edit data
        $(document).on('click', '#editRekmedBtn', function(){
            id = $(this).attr('data-id');
            $("#editModalRM").attr('data-id', id);
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                url: "{{ route('rawatJalan.editDataRM') }}",
                method: "get",
                data: {id: id},
                success: function(data){
                    console.log(data);
                    $('#editFormRM textarea[name="anamnesa"]').text(data.anamesa);
                    $('#editFormRM textarea[name="diagnosa"]').text(data.diagnosa);
                    $('#editFormRM textarea[name="pemeriksaan_penujang"]').text(data.pemeriksaan_penunjang);
                    $('#editFormRM textarea[name="pemeriksaan_fisik"]').text(data.pemeriksaan_fisik);
                    $('#editFormRM textarea[name="catatan"]').text(data.catatan);
                    $('#editFormRM #tanggal_edit').val(data.tanggal);

                    if($('#editJenisKasus option').select2().val() !== data.kasus_diagnosa){
                        $('#editJenisKasus  option').select2().attr('selected', 'selected');  
                    }
                   
                    if($('#jenis_diagnosa option').select2().val() !== data.jenis_diagnosa){
                        $('#jenis_diagnosa  option').select2().attr('selected', 'selected');  
                        console.log('true')
                    }else{
                        console.log('false');
                    }
               
                    $("#editRekmed").modal("show")
                }
            });
    
        });

        $(document).on('click', '.closeEditRM', function(){
            console.log('gg');
            $('#editJenisKasus option').select2().removeAttr('selected');
            $('#jenis_diagnosa option').select2().removeAttr('selected');
            $("#editFormRM")[0].reset();
        });

        $(document).on('click', '#editModalRM', function(){
            id = $(this).attr('data-id');
            console.log(id); 
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
                            url: "{{ route('rawatJalan.editRM') }}",
                            method: "post",
                            data: {id: id, formData: JSON.parse(JSON.stringify($('#editFormRM').serializeArray())) },
                            success: function(data){
                                console.log(data);
                                Swal.fire({
                                    type: 'success',
                                    title: 'Berhasil!',
                                    text: 'Pasien berhasil di daftar!',
                                });
                                $("#editRekmed").modal("hide")
                                $("#addFormRM")[0].reset();
                                $("#modal_default").modal('hide');
                                $('#rekamMedisTable').DataTable().ajax.reload();
                            }
                        });
                    }
                })
                return false;
           
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
