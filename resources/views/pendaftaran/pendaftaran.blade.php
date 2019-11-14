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
        <button type="button" class="btn bg-primary btn-labeled btn-labeled-left" data-toggle="modal" data-target="#modal_theme_primary"><b><i class="icon-reading"></i></b> Tambah Pendaftaran Baru</button>
    </div>


	<table class="table datatable-basic" id="ruang-pendaftaran">
		<thead>
			<tr>
                <th>No</th>
				<th>Tanggal Kunjungan</th>
				<th>Nama Pasien</th>
				<th>Poli</th>
				<th>Asuransi</th>
                <th>Jenis Kelamin</th>
                <th>Petugas</th>
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
                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="text-uppercase font-size-sm font-weight-bold"><i class="icon-reading mr-2"></i> IDENTITAS PASIEN</legend>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Pasien :</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Jenis Kelamin:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select" data-fouc id="jenis_kelamin" name="jenis_kelamin">
                                                <option>Pilih Jenis Kelamin </option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
									        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Alamat Pasien:</label>
                                        <div class="col-lg-8">
                                            <textarea rows="3" cols="3" class="form-control" id="alamat" name="alamat"></textarea>
                                        </div>
                                        </div>
                                        
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
                                                <option value="Menikah">Menikah</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Janda">Janda</option>
                                                <option value="Duda">Duda</option>
									        </select>
                                        </div>
                                    </div>
                                   
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-truck mr-2"></i> IDENTITAS PASIEN</legend>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Tempat Lahir:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" name="tempat_lahir">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Umur:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" id="umur" name="umur">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Tgl Lahir:</label>
                                        <div class="col-lg-8">
                                            <input type="date" class="form-control" placeholder="Masukkan Tempat Lahir" id="tanggal_lahir " name="tanggal_lahir ">
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
                                        <label class="col-lg-4 col-form-label">Agama:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select" data-fouc id="agama" name="agama">
                                                <option>Pilih Agama</option>
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
                                        <label class="col-lg-4 col-form-label">Tanggal Kunjungan :</label>
                                        <div class="col-lg-8">
                                            <input type="date" class="form-control" placeholder="Masukkan Nama Pasien" id="tanggal_kunjungan" name="tanggal_kunjungan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Poli:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select" data-fouc id="id_poli" name="id_poli">
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
                                            <select class="form-control select" data-fouc id="id_role_pembayaran" name="id_role_pembayaran">
                                                <option>Pilih Asuransi</option>
                                                <option value="1">BPJS</option>
                                                <option value="2">Non BPJS</option>
									        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
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
                                    </div>
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

    <!--Modal Form Pendaftaran Baru -->
    <div id="modal_theme_primary" class="modal fade" tabindex="-2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title">Form Pendaftaran Baru</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="card-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="text-uppercase font-size-sm font-weight-bold"><i class="icon-reading mr-2"></i> IDENTITAS PASIEN</legend>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Pasien :</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Jenis Kelamin:</label>
                                        <div class="col-lg-8">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-input-styled" name="gender" data-fouc>
                                                   Laki-laki
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-input-styled" name="gender" data-fouc>
                                                   Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Petugas:</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Asuransi:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select">
                                                <option>BPJS</option>
                                                <option>Non BPJS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama Poli:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-control-select">
                                                <option>Poli Anak</option>
                                                <option>Poli Bedah</option>
                                                <option>Poli Gigi</option>
                                                <option>Poli THT</option>
                                                <option>Poli Penyakit Dalam</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
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
                    { className: "text-center", "targets": [ 7 ] }
                ],
               ajax: '{!! route('pendaftaran.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'tanggal_kunjungan',
                     data: 'tanggal_kunjungan',
                  },
                  {
                     name: 'nama_pasien',
                     data: 'nama_pasien',
                  },
                  {
                     name: 'nama_poli',
                     data: 'nama_poli',
                  },
                  {
                     name: 'role_pembayaran',
                     data: 'role_pembayaran',
                    
                     render: function(data){
                        return data == 1 ? 'BPJS' : 'Reguler';
                     }
                  },
                  {
                     name: 'jenis_kelamin',
                     data: 'jenis_kelamin',
                     
                     render: function(data){
                        return data == 'L' ? 'Laki-Laki' : 'Perempuan';
                     }
                  },
                  {
                     name: 'nama_user',
                     data: 'nama_user',
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

@section('js')
    <script src="{{asset('/template/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_layouts.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('/template/global_assets/js/demo_pages/form_inputs.js')}}"></script>
@endsection

