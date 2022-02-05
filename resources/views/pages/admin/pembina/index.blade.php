@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Data Pembina</h1>
            
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

<div class="d-flex justify-content-between">
    <div width="70%">
        <button class="btn btn-info" data-toggle="modal" data-target="#modalpembina">Tambah</button>
    </div>
    <form action="{{url('pembina')}}" method="GET" class="form-inline my-2 my-lg-0">

        <div width="22%">
            <input class="form-control mr-sm-2 ml-2" type="text" name="" value="">
        </div>
        <div>
            <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button>
        </div>
    </form>
</div>

    <table class="table table-bordered table-responsive table-hover mt-2" width="50%">
        <thead class="table-dark">
        <tr align="center" >
            <th width="5%">NO</th>
            <th width="15%">KODE</th>
            <th width="45%">NAMA</th>
            <th width="40%">FOTO</th>
            <th colspan="3" width="10%">AKSI</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($pembina as $item)
        <tr>
                <td align="center" ></td>
                <td>{{$item->kode_pembina}}</td>
                <td>{{$item->nama_pembina}}</td>
                <td>{{$item->foto}}</td>
                <td align="right"><button class="btn btn-info" data-toggle="modal" data-target="#viewpembina">Lihat</button></td>
                <td align="right">
                  <button class="btn btn-success" data-id="{{$item->id}}" data-kode="{{$item->pembina}}" data-nama="{{$item->ketegori}}" 
                    data-judul="{{$item->judul}}" data-foto="{{$item->foto}}" data-toggle="modal"  data-target="#editpembina{{$item->kode_pembina}}">Edit
                  </button>
                </td>
                <td>
                    <form action="{{url('pembina/'.$item->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>

        @empty
        <tr>
          <td colspan="4" class="text-center">
            Data Kosong
          </td>
        </tr>

        @endforelse
        </tbody>
            
    </table>

</div>
    </div>

</div>


<!-- Modal Create -->
<div class="modal fade" id="modalpembina" tabindex="-1" aria-labelledby="modalpembinaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalpembinaLabel">Tambah Pembina</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{url('pembina/store')}}" method="post" enctype='multipart/form-data'  >
        {{-- {{ crsf_field() }} --}}
        @csrf
        <div class="modal-body">
                <div class="form-group">
                <table border="0">
                            <tr>
                            <td width="30%"><label>Kode</label></td>
                            <td width="70%"><input type="text" name="kode_pembina" class="form-control" id="kode_pembina" aria-describedby="kode_pembina"></td>
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Nama</label></td>
                              <td width="70%" colspan="4"><input type="text" name="nama_pembina" class="form-control" id="nama" aria-describedby="nama" required></td> 
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
                              <td width="70%" colspan="4"><textarea class="form-control" id="message-text" name="alamat" required></textarea></td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>Jenis Kelamin</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="jenis_kelamin" name="jenis_kelamin">
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
                              <td width="30%"><label>Agama</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="agama" name="agama">
                                  <option selected>Pilih...</option>
                                  <option value="Islam">Islam</option>
                                  <option value="Kristen">Kristen</option>
                                  <option value="Katholik">Katholik</option>
                                  <option value="Hindu">Hindu</option>
                                  <option value="Budha">Budha</option>
                                  <option value="Protestan">Protestan</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                           
                            <tr>
                              <td width="20%"><label>Golongan</label></td>
                              <td width="80%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="golongan" name="golongan">
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
                              <td width="30%"><label>Jabatan</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="jabatan" name="jabatan">
                                <option selected>Pilih...</option>
                                  <option value="Kamabigus">Kamabigus</option>
                                  <option value="Pembina Utama">Pembina Utama</option>
                                  <option value="Pelatih Lapangan">Pelatih Lapangan</option>
                                  <option value="Pelatih Lapangan">Pratama Putra</option>
                                  <option value="Pelatih Lapangan">Pratama Putri</option>
                                  <option value="Pelatih Lapangan">Pemimpin Regu</option>
                                  <option value="Pelatih Lapangan">Wakil Pemimpin Regu</option>
                                  <option value="Sekretaris">Sekretaris</option>
                                  <option value="Bendahara">Bendahara</option>
                                  <option value="Operator">Operator</option>
                                  <option value="Tenaga IT">Tenaga IT</option>
                                  <option value="Lainnya">Lainnya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>

                            <tr>
                              <td width="20%"><label>Foto</label></td>
                              <td width="80%" colspan="4">
                              <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" name="foto" id="foto" required>
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

<!-- Modal View -->
  <div class="modal fade" id="viewpembina" tabindex="-1" aria-labelledby="viewaminLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewaminLabel">Data Pembina</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <table border="0">
                          @foreach ($pembina as $item)
                            <tr>
                              <td width="30%"><label>Kode</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$item->kode_pembina}}</td>
                              <td width="7%" rowspan="5"></td>
                              <td width=>Foto</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>NTA</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$item->nta}}</td>
                              <td width="20%" rowspan="3"><img src="assets/images/latihanrutin.jpeg" alt="First One" width="100%"></img></td>
                              
                            </tr>
                            <tr>
                              <td width="30%"><label>Nama</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$item->nama_pembina}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Tempat Lahir</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$item->tempat_lahir}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Tanggal Lahir</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$item->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Jenis Kelamin</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$item->jenis_kelamin}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Alamat</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$item->alamat}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>No Telp</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$item->tlp}}</td>
                            </tr>
                           
                            <tr>
                              <td width="30%"><label>Agama</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$item->agama}}</td>
                            </tr>
                           
                            <tr>
                              <td width="30%"><label>Golongan</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$item->golongan}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Jabatan</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$item->jabatan}}</td>
                            </tr>
                            
                            <tr>
                              <td width="30%"><label>Pangkalan</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$item->pangkalan}}</td>
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


          
<!-- Modal Edit -->
   <div class="modal fade" id="editpembina{{$item->kode_pembina}}" tabindex="-1" aria-labelledby="editpembinaLabel" aria-hidden="true">
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
                    @foreach ($pembina as $item)
                    <table border="0">
                            <tr>
                            <td width="30%"><label>Kode</label></td>
                            <td width="70%"><input type="text" name="kode_pembina" class="form-control" id="kode_pembina" aria-describedby="kode_pembina" value="{{$item->kode_pembina}}" readonly></td>
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Nama</label></td>
                              <td width="70%" colspan="4"><input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" value="{{$item->nama_pembina}}"></td> 
                            </tr>
                            <tr>
                            <td width="30%"><label>NTA</label></td>
                              <td width="70%"><input type="text" name="nta" class="form-control" id="nta" aria-describedby="nta" value="{{$item->nta}}"></td>
                            </tr>
                            <td width="30%"><label>Tempat Lahir</label></td>
                              <td width="70%"><input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" value="{{$item->tempat_lahir}}"></td>
                            </tr>
                            <tr>
                            <td width="30%"><label>Tanggal Lahir</label></td>
                              <td width="70%"><input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir" value="{{$item->tanggal_lahir}}" ></td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Alamat</label></td>
                              <td width="70%" colspan="4"><textarea class="form-control" id="message-text" value="{{$item->alamat}}" name="alamat"></textarea></td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>Jenis Kelamin</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="jenis_kelamin" value="{{$item->jenis_kelamin}}" name="jenis_kelamin">
                                  <option selected >Pilih...</option>
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                  <option value="Laninya">Laninya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>No Telp</label></td>
                              <td width="70%" colspan="4"><input type="text" name="tlp" class="form-control" id="tlp" aria-describedby="tlp" value="{{$item->tlp}}"></td> 
                            </tr>
                           
                            <tr>
                              <td width="20%"><label>Golongan</label></td>
                              <td width="80%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="golongan" name="golongan" value="{{$item->golongan}}">
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
                              <td width="30%"><label>Jabatan</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="jabatan" value="{{$item->jabatan}}" name="jabatan">
                                  <option selected>Pilih...</option>
                                  <option value="Kamabigus">Kamabigus</option>
                                  <option value="Pembina Utama">Pembina Utama</option>
                                  <option value="Pelatih Lapangan">Pelatih Lapangan</option>
                                  <option value="Pelatih Lapangan">Pratama Putra</option>
                                  <option value="Pelatih Lapangan">Pratama Putri</option>
                                  <option value="Pelatih Lapangan">Pemimpin Regu</option>
                                  <option value="Pelatih Lapangan">Wakil Pemimpin Regu</option>
                                  <option value="Sekretaris">Sekretaris</option>
                                  <option value="Bendahara">Bendahara</option>
                                  <option value="Operator">Operator</option>
                                  <option value="Tenaga IT">Tenaga IT</option>
                                  <option value="Lainnya">Lainnya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>

                            <tr>
                              <td width="20%"><label>Foto</label></td>
                              <td width="80%" colspan="4">
                              <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="foto" name="foto" required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>
                            </tr>
                            <tr>
                            <td width="30%"><label>Pangkalan</label></td>
                            <td width="70%"><input type="text" name="pangkalan" class="form-control" id="pangkalan" aria-describedby="pangkalan" value="SMPN 43 Semarang" readonly></td>
                            </tr>

                      </table>
                      @endforeach
                    </div>
                </div>
            <div class="modal-footer">
              <button align="right" type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
      </div>
      </div>
    </div>

    
@endsection