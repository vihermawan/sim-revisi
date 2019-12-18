@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Edit Data Pasien</h5>
	</div>
	<div class="card-body">
        <form id="editForm" name="editForm">
            <div class="row">

                <div class="col-md-4">
                    <fieldset>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nomor Rumah Sakit :</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="id" name="id" value="{{$pasien->id}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Pasien :</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien" value="{{$pasien->nama_pasien}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">No Identitas :</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Masukkan Nomor identitas" id="no_identitas" name="no_identitas" value="{{$pasien->no_identitas}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-4 d-block">Pilih Jenis Kelamin:</label>
                            <div class="col-lg-8">
                                <div class="form-check form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-input-styled" value="L" <?php echo ('L' === $pasien->jenis_kelamin) ? 'checked' : '';?> id="jenis_kelamin" name="jenis_kelamin" data-fouc>
                                        Laki-laki
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-input-styled" value="P" <?php echo ('P' === $pasien->jenis_kelamin) ? 'checked' : '';?> id="jenis_kelamin" name="jenis_kelamin"  data-fouc>
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-4">Alamat Pasien:</label>
                            <div class="col-lg-8">
                                <input textarea rows="2" cols="3" class="form-control" id="alamat" name="alamat" value="{{$pasien->alamat}}"></textarea>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Tanggal Kunjungan :</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control"  placeholder="Masukkan Nama Pasien" id="tanggal_kunjungan" name="tanggal_kunjungan">
                            </div>
                        </div> 
                    </fieldset>
                </div>

                <div class="col-md-4">
                    <fieldset>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Provinsi:</label>
                            <div class="col-lg-8">
                                <input type="hidden" id="codeprovinsi" value="{{$pasien->propinsi}}">
                                <select class="form-control select" data-fouc  name="propinsi" id="propinsi" >
                                    {{-- <option></option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Kabupaten:</label>
                            <div class="col-lg-8">
                                <input type="hidden" id="codekabupaten" value="{{$pasien->kabupaten}}">
                                <select class="form-control select" data-fouc  name="kabupaten" id="kabupaten">
                                    <option>Pilih Kabupaten</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Kecematan:</label>
                            <div class="col-lg-8">
                                <input type="hidden" id="codekecamatan" value="{{$pasien->kecamatan}}">
                                <select class="form-control select" data-fouc  name="kecamatan" id="kecamatan">
                                    <option>Pilih Kecematan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Desa:</label>
                            <div class="col-lg-8">
                                <input type="hidden" id="codekelurahan" value="{{$pasien->kelurahan}}">
                                <select class="form-control select" data-fouc  name="kelurahan" id="kelurahan">
                                    <option>Pilih Desa</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Golongan Darah:</label>
                            <div class="col-lg-8">
                                <select class="form-control select" data-fouc id="golongan_darah" name="golongan_darah">
                                    <option value="-" <?php echo ('-' === $pasien->golongan_darah) ? 'selected' : '';?> >Tidak Mengetahui</option>
                                    <option value="A" <?php echo ('A' === $pasien->golongan_darah) ? 'selected' : '';?>>A</option>
                                    <option value="B" <?php echo ('B' === $pasien->golongan_darah) ? 'selected' : '';?>>B</option>
                                    <option value="O" <?php echo ('O' === $pasien->golongan_darah) ? 'selected' : '';?>>O</option>
                                    <option value="AB" <?php echo ('AB' === $pasien->golongan_darah) ? 'selected' : '';?>>AB</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Status:</label>
                            <div class="col-lg-8">
                                <select class="form-control select" data-fouc id="status" name="status">
                                    <option value="-" <?php echo ('-' === $pasien->status) ? 'selected' : '';?>>Tidak Mengetahui</option>
                                    <option value="Menikah" <?php echo ('Menikah' === $pasien->status) ? 'selected' : '';?>>Menikah</option>
                                    <option value="Belum Menikah" <?php echo ('Belum Menikah' === $pasien->status) ? 'selected' : '';?>>Belum Menikah</option>
                                    <option value="Janda" <?php echo ('Janda' === $pasien->status) ? 'selected' : '';?>>Janda</option>
                                    <option value="Duda" <?php echo ('Duda' === $pasien->status) ? 'selected' : '';?>>Duda</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Asuransi:</label>
                            <div class="col-lg-8">
                                <select class="form-control select" data-fouc id="id_role_pembayaran" name="id_role_pembayaran">
                                    <option value="1" <?php echo ('1' === $pasien->id_role_pembayaran) ? 'selected' : '';?>>BPJS</option>
                                    <option value="2" <?php echo ('2' === $pasien->id_role_pembayaran) ? 'selected' : '';?>>Umum</option>
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
                                    <option value="-" <?php echo ('-' === $pasien->agama) ? 'selected' : '';?>>Tidak Mengetahui</option>
                                    <option value="islam" <?php echo ('islam' === $pasien->agama) ? 'selected' : '';?>>Islam</option>
                                    <option value="kristen" <?php echo ('kristen' === $pasien->agama) ? 'selected' : '';?>>Kristen</option>
                                    <option value="protestan" <?php echo ('protestan' === $pasien->agama) ? 'selected' : '';?>>Protestan</option>
                                    <option value="budha" <?php echo ('budha' === $pasien->agama) ? 'selected' : '';?>>Budha</option>
                                    <option value="hindu" <?php echo ('hindhu' === $pasien->agama) ? 'selected' : '';?>>Hindu</option>
                                    <option value="konghucu" <?php echo ('konghucu' === $pasien->agama) ? 'selected' : '';?>>Konghucu</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Tempat Lahir:</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="{{$pasien->tempat_lahir}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Tgl Lahir:</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                    </span>
                                    <input type="text" class="form-control" id="anytime-month-numeric" placeholder="Masukkan Tanggal Lahir&hellip;" value="{{$pasien->tanggal_lahir}}">
                                </div>
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Umur:</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Masukkan Umur" id="umur" name="umur" value="{{$pasien->umur}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Pekerjaan:</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Masukkan Pekerjaan" id="pekerjaan" name="pekerjaan" value="{{$pasien->pekerjaan}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Pendidikan:</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Masukkan Pendidikan" id="pendidikan" name="pendidikan" value="{{$pasien->pendidikan}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Wali :</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Masukkan Nama Wali" id="nama_wali" name="nama_wali" value="{{$pasien->nama_wali}}">
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
            url: "{{ route('pendaftaran.addPendaftaran')}}",
            method: "post",
            data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
            success: function(data){
               console.log('data', data)
               Swal.fire({
                  type: 'success',
                  title: 'Data berhasil di ditambah!',
                  text: 'Data anda telah berhasil ditambahkan!',
               });
               window.location.href = "{{ route('pasien')}}";
            }
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

<script>
    var return_first = function() {
          var tmp = null;
          $.ajax({
              'async': false,
              'type': "get",
              'global': false,
              'dataType': 'json',
              'url': 'https://x.rajaapi.com/poe',
              'success': function(data) {
                  tmp = data.token;
              }
          });
          return tmp;
      }();
  $(document).ready(function() {
      let propinsicode = $('#codeprovinsi').val();
      let kabupatencode = $('#codekabupaten').val();
      let kecamatancode = $('#codekecamatan').val();
      let kelurahancode = $('#codekelurahan').val();
    //   console.log(kabupatencode);
      $.ajax({
          url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
          type: 'GET',
          dataType: 'json',
          success: function(json) {
              if (json.code == 200) {
                  for (i = 0; i < Object.keys(json.data).length; i++) {
                    if(propinsicode == json.data[i].id){
                        $('#propinsi').append($('<option class="provinsi">').text(json.data[i].name).attr({'selected':'selected','value':json.data[i].id }));
                    }else {
                        $('#propinsi').append($('<option class="provinsi">').text(json.data[i].name).attr('value',json.data[i].id));
                    }
                  }
              } else {
                  $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
              }
          }
      });
      

     

      
      $("#propinsi").change(function() {
          var propinsi = $("#propinsi").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
              data: "idpropinsi=" + propinsi,
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                  $("#kabupaten").html('');
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      }
                      $('#kecamatan').html($('<option>').text('-- Pilih Kecamatan --').attr('value', '-- Pilih Kecamatan --'));
                      $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));

                  } else {
                      $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
      });
      $("#kabupaten").change(function() {
          var kabupaten = $("#kabupaten").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kecamatan',
              data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi,
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                  $("#kecamatan").html('');
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#kecamatan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      }
                      $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));
                      
                  } else {
                      $('#kecamatan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
      });
      $("#kecamatan").change(function() {
          var kecamatan = $("#kecamatan").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kelurahan',
              data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi + "&idkecamatan=" + kecamatan,
              type: 'GET',
              dataType: 'json',
              cache: false,
              success: function(json) {
                  $("#kelurahan").html('');
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#kelurahan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      }
                  } else {
                      $('#kelurahan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
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
