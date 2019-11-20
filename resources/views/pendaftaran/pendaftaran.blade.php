@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Tabel Pendaftaran Pasien</h5>
    </div>

    <div class="card-header">
        <button type="button" class="btn bg-success btn-labeled btn-labeled-left"  data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Pasien Baru</button>
    </div>


	<table class="table datatable-basic" id="ruang-pendaftaran">
		<thead>
			<tr>
                <th>No</th>
                <th>No RM</th>
				<th>Nama Pasien</th>
				<th>Tanggal Kunjungan</th>
				<th>No Identitas</th>
				<th>Tanggal Lahir</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>

	</table>
</div>

<!--Modal Form Pendaftaran -->
    <div id="add-modal" class="modal fade" tabindex="-2">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h6 class="modal-title">Form Pendaftaran</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="card-body">
                    <form id="addForm" name="addForm">
                        <div class="row">
                            <div class="col-md-12">
                            <legend class="text-uppercase font-size-sm font-weight-bold"><i class="icon-reading mr-2"></i> IDENTITAS PASIEN</legend>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <fieldset>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nomor Rumah Sakit :</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Pasien :</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">No Identitas :</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Nomor identitas" id="no_identitas" name="no_identitas">
                                        </div>
                                    </div>


                                    <div class="form-group row">
										<label class="col-lg-4 d-block">Pilih Jenis Kelamin:</label>
                                        <div class="col-lg-8">
                                            <div class="form-check form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-input-styled" value="L" id="jenis_kelamin" name="jenis_kelamin" data-fouc>
                                                    Laki-laki
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-input-styled" value="P" id="jenis_kelamin" name="jenis_kelamin"  data-fouc>
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
									</div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Alamat Pasien:</label>
                                        <div class="col-lg-8">
                                            <textarea rows="2" cols="3" class="form-control" id="alamat" name="alamat"></textarea>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Tanggal Kunjungan :</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" disabled placeholder="Masukkan Nama Pasien" id="tanggal_kunjungan" name="tanggal_kunjungan">
                                        </div>
                                    </div> 
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <fieldset>
                                <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Propinsi:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Provinsi" id="provinsi" name="provinsi">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Kabupaten:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Kabupaten" id="kabupaten" name="kabupaten">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Kecamatan:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Kecamatan" id="kecamatan" name="kecamatan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Desa:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Desa" id="desa" name="desa">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Golongan Darah:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select" data-fouc id="golongan_darah" name="golongan_darah">
                                                <option>Pilih Goldar</option>
                                                <option value="-">Tidak Mengetahui</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="O">O</option>
                                                <option value="AB">AB</option>
									        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Status:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select" data-fouc id="status" name="status">
                                                <option>Status</option>
                                                <option value="-">Tidak Mengetahui</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Janda">Janda</option>
                                                <option value="Duda">Duda</option>
									        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Asuransi:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select" data-fouc id="id_role_pembayaran" name="id_role_pembayaran">
                                                <option>Pilih Asuransi</option>
                                                <option value="1">BPJS</option>
                                                <option value="2">Umum</option>
									        </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-4">
                                <fieldset>

                                <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Agama:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select" data-fouc id="agama" name="agama">
                                                <option>Pilih Agama</option>
                                                <option value="-">Tidak Mengetahui</option>
                                                <option value="islam">Islam</option>
                                                <option value="kristen">Kristen</option>
                                                <option value="protestan">Protestan</option>
                                                <option value="budha">Budha</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="konghucu">Konghucu</option>
									        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Tempat Lahir:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" name="tempat_lahir">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Tgl Lahir:</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                </span>
                                                <input type="text" class="form-control" id="anytime-month-numeric" placeholder="Masukkan Tanggal Lahir&hellip;">
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Umur:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Umur" id="umur" name="umur">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Pekerjaan:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Pekerjaan" id="pekerjaan" name="pekerjaan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Pendidikan:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Pendidikan" id="pendidikan" name="pendidikan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Wali :</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama User:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select" data-fouc id="id_user" name="id_user">
                                                <option>Pilih Petugas</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Dokter</option>
                                                <option value="3">Perawat</option>
                                                <option value="4">Petugas</option>
									        </select>
                                        </div>
                                    </div> -->
                                </fieldset>
                            </div>

                           
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-primary add_data">Simpan Data</button>
                        </div>
                    </form>
                </div>  
            </div>
            <!-- /2 columns form -->
        </div>
    </div>
    <!--End Modal Pendaftaran-->

  


   <!--Modal edit ruangan -->
    <div id="edit-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title">Form Rawat Inap</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="col-xl-12">
                        <!-- Form -->
                        <div class="card-body">
                            <form id="editForm" name="editForm">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Poli:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" data-fouc  name="id_poli">
                                            <option>Pilih Poli</option>
                                            <option value="1">Poli Anak</option>
                                            <option value="2">Poli Bedah</option>
                                            <option value="3">Poli Gigi</option>
                                            <option value="4">Poli THT</option>
                                            <option value="5">Poli Penyakit Dalam</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Asuransi:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" data-fouc  name="id_role_pembayaran">
                                            <option>Pilih Asuransi</option>
                                            <option value="1">BPJS</option>
                                            <option value="2">Non BPJS</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <!-- /Form -->
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-success edit-data">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal edit ruangan--> 

    <!--Modal delete -->
    <div id="delete-modal" class="modal fade" tabindex="-2">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h6 class="modal-title">Delete Data</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="card-body">
                            <p>Anda yakin ingin menghapus data ini?</p>
                        </div>
                    </div>
                </div>
        
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn bg-danger delete-data">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal delete-->

@endsection

@push('scripts')
<script>

    //add pendaftaran

    $(document).on('click', '.add_data', function(e){
        e.preventDefault();

        $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('pendaftaran.addPendaftaran') }}",
            method: "post",
            data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
            success: function(data){
                console.log('data', data)
               Swal.fire({
                  type: 'success',
                  title: 'Data berhasil di ditambah!',
                  text: 'Data anda telah berhasil ditambahkan!',
               });
               $("#addForm")[0].reset();
               $('#add-modal').modal('hide');
               $('#ruang-pendaftaran').DataTable().ajax.reload();
            }
         });  
      });

     //edit ruangan
    $(document).on('click', '.edit-data-pendaftaran', function(){
         var id = $(this).attr("id");
         $('.edit-data').attr("id", id);
    });

    $(document).on('click', '.edit-data', function(e){
        e.preventDefault();
         var id = $(this).attr("id");
         console.log("ini id ", id);
        
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('pendaftaran.editPendaftaran') }}",
            method: "post",
            data: {id: id, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
            success: function(data){
                console.log(data)
                Swal.fire({
                  type: 'success',
                  title: 'Data berhasil di ubah!',
                  text: 'Data pendaftaran yang anda pilih telah diubah!',
               });
               $('#edit-modal').modal('hide');
               $('#ruang-pendaftaran').DataTable().ajax.reload();
            }
         });
        
      });

    

    // delete ruangan
    $(document).on('click', '.delete-modal', function(){
       var id = $(this).attr("id");
       $('.delete-data').attr("id", id);
    });

    $(document).on('click', '.delete-data', function(){
        var id = $(this).attr("id"); 
        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
           },
           url: "{{ route('pendaftaran.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Data berhasil dihapus!',
                    text: 'Data pendaftaran yang anda pilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#ruang-pendaftaran').DataTable().ajax.reload();
           }
        });
       
    });

     //GET ALL DATA
     $(function(){
            $('#ruang-pendaftaran').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 4 ] }
                ],
               ajax: '{!! route('pendaftaran.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'id',
                     data: 'id',
                  },
                  {
                     name: 'nama_pasien',
                     data: 'nama_pasien',
                  },
                  {
                     name: 'tanggal_kunjungan',
                     data: 'tanggal_kunjungan',
                  },
                  {
                     name: 'no_identitas',
                     data: 'no_identitas',
                  },
                  {
                     name: 'tanggal_kunjungan',
                     data: 'tanggal_kunjungan',
                  },
                  {
                     name: 'action',
                     data: 'action',
                  },

               ]
            });
         });
</script>

<script>
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });
    document.getElementById('tanggal_kunjungan').value = new Date().toDateInputValue();
</script>

@endpush

@section('js')
    <script src="{{asset('/template/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_layouts.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_inputs.js')}}"></script>
    
    <script src="{{asset('/template/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/notifications/jgrowl.min.js')}}"></script> 
    <script src="{{asset('/template/global_assets/js/demo_pages/picker_date.js')}}"></script>
@endsection

