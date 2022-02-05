@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Presensi</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<div class="row container bg-white md-5">

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>            
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('success'))
<p class="alert alert-success">{{ Session::get('success')}}</p><br/>
@endif

  
  <!-- Modal Create -->
 <div class="modal fade" id="modalpembina" tabindex="-1" aria-labelledby="modalpembinaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalpembinaLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{url('dpembina/store')}}" method="post" >
        {{-- {{ crsf_field() }} --}}
        @csrf
            <div class="modal-body">
                <div class="form-group">
                <table border="0">
                            <tr>
                            <td width="30%"><label>Kode</label></td>
                            <td width="70%"><input type="text" name="kode_pembina" class="form-control" id="kode_pembina" aria-describedby="kode_pembina" readonly></td>
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Nama</label></td>
                              <td width="70%" colspan="4"><input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" required></td> 
                            </tr>
                            <tr>
                            <td width="30%"><label>NTA</label></td>
                              <td width="70%"><input type="text" name="nta" class="form-control" id="nta" aria-describedby="nta" required></td>
                            </tr>
                            <td width="30%"><label>Tempat Lahir</label></td>
                              <td width="70%"><input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" required></td>
                            </tr>
                            <tr>
                            <td width="30%"><label>Tanggal Lahir</label></td>
                              <td width="70%"><input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir" required></td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Alamat</label></td>
                              <td width="70%" colspan="4"><textarea class="form-control" id="message-text" required></textarea></td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>Jenis Kelamin</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                  <option value="Laninya">Laninya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>No Telp</label></td>
                              <td width="70%" colspan="4"><input type="text" name="tlp" class="form-control" id="tlp" aria-describedby="tlp" required></td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>Jabatan</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="Kamabigus">Kamabigus</option>
                                  <option value="Pembina Utama">Pembina Utama</option>
                                  <option value="Pelatih Lapangan">Pelatih Lapangan</option>
                                  <option value="Sekretaris">Sekretaris</option>
                                  <option value="Bendahara">Bendahara</option>
                                  <option value="Operator">Operator</option>
                                  <option value="Anggota">Anggota</option>
                                  <option value="Lainnya">Lainnya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="20%"><label>Golongan</label></td>
                              <td width="80%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="Pembina">Pembina</option>
                                  <option value="Pembntu Pembina">Pembantu Pembina</option>
                                  <option value="Dewan Galang">Dewan Galang</option>
                                  <option value="Penggalang Ramu">Penggalang Ramu</option>
                                  <option value="Penggalang Rakit">Penggalang Rakit</option>
                                  <option value="Penggalang Terap">Penggalang Terap</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="20%"><label>Foto</label></td>
                              <td width="80%" colspan="4">
                              <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>
                            </tr>
                            <tr>
                            <td width="30%"><label>Pangkalan</label></td>
                            <td width="70%"><input type="text" name="pangkalan" class="form-control" id="pangkalan" aria-describedby="pangkalan" value="SMPN 43 Semarang" readonly></td>
                            </tr>

                      </table>
        </div>

        <div class="modal-footer">
          <button align="right" type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit -->
  <div class="modal fade" id="editpembina" tabindex="-1" aria-labelledby="editpembinaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editpembinaLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

            <form id="editForm" action="" method="post" >
              @csrf
              <input type="hidden" name="_method" value="PATCH">
                <div class="modal-body">
                    <div class="form-group">
                    <table border="0">
                            <tr>
                            <td width="30%"><label>Kode</label></td>
                            <td width="70%"><input type="text" name="kode_pembina" class="form-control" id="kode_pembina" aria-describedby="kode_pembina" readonly></td>
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Nama</label></td>
                              <td width="70%" colspan="4"><input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" required></td> 
                            </tr>
                            <tr>
                            <td width="30%"><label>Presensi</label></td>
                              <td width="70%"><input type="text" name="nta" class="form-control" id="nta" aria-describedby="nta" required></td>
                            </tr>
                            <td width="30%"><label>Sakit</label></td>
                              <td width="70%"><input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" required></td>
                            </tr>
                            <tr>
                            <td width="30%"><label>Ijin</label></td>
                              <td width="70%"><input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir" required></td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Alpha</label></td>
                              <td width="70%" colspan="4"><textarea class="form-control" id="message-text" required></textarea></td> 
                            </tr>

                            <tr>
                              <td width="30%"><label>No Telp</label></td>
                              <td width="70%" colspan="4"><input type="text" name="tlp" class="form-control" id="tlp" aria-describedby="tlp" required></td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>Jabatan</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="Kamabigus">Kamabigus</option>
                                  <option value="Pembina Utama">Pembina Utama</option>
                                  <option value="Pelatih Lapangan">Pelatih Lapangan</option>
                                  <option value="Sekretaris">Sekretaris</option>
                                  <option value="Bendahara">Bendahara</option>
                                  <option value="Operator">Operator</option>
                                  <option value="Anggota">Anggota</option>
                                  <option value="Lainnya">Lainnya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="20%"><label>Golongan</label></td>
                              <td width="80%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="Pembina">Pembina</option>
                                  <option value="Pembantu Pembina">Pembantu Pembina</option>
                                  <option value="Dewan Galang">Dewan Galang</option>
                                  <option value="Penggalang Ramu">Penggalang Ramu</option>
                                  <option value="Penggalang Rakit">Penggalang Rakit</option>
                                  <option value="Penggalang Terap">Penggalang Terap</option>
                                  <option value="Lainnya">Lainnya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="20%"><label>Foto</label></td>
                              <td width="80%" colspan="4">
                              <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>
                            </tr>
                            <tr>
                            <td width="30%"><label>Pangkalan</label></td>
                            <td width="70%"><input type="text" name="pangkalan" class="form-control" id="pangkalan" aria-describedby="pangkalan" value="SMPN 43 Semarang" readonly></td>
                            </tr>

                      </table>
                    </div>
                </div>
            <div class="modal-footer">
              <button align="right" type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
      </div>
      </div>
    </div>
  </div>

   <!-- Modal View -->
   <div class="modal fade" id="viewpembina" tabindex="-1" aria-labelledby="viewpembinaLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewpembinaLabel">Data Pembina</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <table border="0">
                          @foreach ($datas as $value)
                            <tr>
                              <td width="30%"><label>Kode</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->kode_pembina}}</td>
                              <td width="7%" rowspan="5"></td>
                              <td width=>Foto</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>NTA</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->nta}}</td>
                              <td width="20%" rowspan="3"><img src="assets/images/latihanrutin.jpeg" alt="First One" width="100%"></img></td>
                              
                            </tr>
                            <tr>
                              <td width="30%"><label>Nama</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->nama_pembina}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Tempat Lahir</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->tempat_lahir}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Tanggal Lahir</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Alamat</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->alamat}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Jenis Kelamin</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->jenis_kelamin}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Agama</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->agama}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Jabatan</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->jabatan}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Golongan</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->golongan}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>No Telp</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->tlp}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Pangkalan</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->pangkalan}}</td>
                            </tr>

                      </table>
                          @endforeach

                        </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">OK</span>
                  </button> 
                  
                </div>
                </form>
              </div>
              </div>
            </div>
          </div>

<div class="d-flex justify-content-between">
  <div width="70%">
    <button class="btn btn-info" data-toggle="modal" data-target="#modalpembina">Tambah</button>
  </div>
    <form action="{{url('dpembina')}}" method="GET" class="form-inline my-2 my-lg-0">
        <div width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </div>
        <div width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button></div>
    </form>
</div>

{{-- <table class="mt-5" border="0" width="100%" > --}}
<div class="d-flex justify-content-between">
  <div width="70%">
    <button class="btn btn-info" data-toggle="modal" data-target="#modalsemester">Tambah</button>
  </div>
    <form action="{{url('semester')}}" method="GET" class="form-inline my-2 my-lg-0">
      {{-- <tr>
        <td width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </td>
        <td width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button></td>
      </tr> --}}
        <div width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </div>
        <div width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button></div>
    </form>
</div>
{{-- </table> --}}
    
    <table class="table table-bordered table-responsive table-hover mt-2" width="80%">
        <thead class="table-dark">
        <tr align="center" >
            <th width="5%">NO</th>
            <th width="45%">KODE</th>
            <th width="40%">ROMBEL</th>
            <th colspan="3" width="10%">AKSI</th>
        </tr>
        </thead>
        <?php $i=1 ?>
        @foreach ($datas as $value)
            <tr>
                <td align="center" >{{$i++}}</td>
                <td>{{$value->kode_s}}</td>
                <td>{{$value->smtr}}</td>
                <td align="right"><a class="btn btn-primary" href="{{url('show')}}">Lihat</a></td>
                <td align="right"><button class="btn btn-success" data-id="{{$value->id}}" data-kode="{{$value->kode_s}}" data-smtr="{{$value->smtr}}" data-toggle="modal" data-target="#editsemester">Edit</button></td>
                {{-- <td align="right"><a class="btn btn-success" href="{{url('semester/'.$value->id.'/edit')}}">Edit</a></td> --}}
                <td>
                    <form action="{{url('semester/'.$value->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            
        @endforeach
    </table>

</div>
    </div>

</div>
    {{ $datas->links() }}

@endsection

@section('script')
  <script>
    $('#editsemester').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      let res = null;
      fetch("{{url('api/next-semester')}}").then(res => {
        return res.text();
      }).then(data => {
        $("#kode_s").val(data);
      })

      var id = button.data('id')
      var kode = button.data('kode')
      var semester = button.data('smtr')
      var url = "{{url('semester')}}/" + id;

      $("#e_kode_s").val(kode)
      $("#e_smtr").val(semester)
      $("#editForm").attr("action", url)
    })

    $('#modalsemester').on('show.bs.modal', function (event) {
      fetch("{{url('api/next-semester')}}").then(res => {
        
        console.log(res);
        return res.text();
      }).then(data => {
        $("#kode_s").val(data);
        console.log(data);
      })
      
    })
  </script> 
@endsection