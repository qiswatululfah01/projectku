@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Jadwal</h1>
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
 <div class="modal fade" id="modaljadwal" tabindex="-1" aria-labelledby="modaljadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaljadwalLabel">Tambah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{url('jadwal/store')}}" method="post" >
        {{-- {{ crsf_field() }} --}}
        @csrf
            <div class="modal-body">
                <div class="form-group">
                <table border="0">
                            <tr>
                            <td width="30%"><label>Kode</label></td>
                            <td width="70%"><input type="text" name="kode_ja" class="form-control" id="kode_ja" aria-describedby="kode_ja" readonly></td>
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Nama Kegiatan</label></td>
                              <td width="70%" colspan="4"><input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" aria-describedby="nama_kegiatan" required></td> 
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Hari</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="Laki-laki">Senin</option>
                                  <option value="Perempuan">Selasa</option>
                                  <option value="Laninya">Rabu</option>
                                  <option value="Laninya">Kamis</option>
                                  <option value="Laninya">Jumat</option>
                                  <option value="Laninya">Sabtu</option>
                                  <option value="Laninya">Minggu</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                            <td width="30%"><label>Tanggal</label></td>
                              <td width="70%"><input type="date" name="tanggal_kegiatan" class="form-control" id="tanggal_kegiatan" aria-describedby="tanggal_kegiatan" required></td>
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
  <div class="modal fade" id="editjadwal" tabindex="-1" aria-labelledby="editjadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
              <h5 class="modal-title" id="editjadwalLabel">Edit jadwal</h5>
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
                            <td width="70%"><input type="text" name="kode_ja" class="form-control" id="kode_ja" aria-describedby="kode_ja" readonly></td>
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Nama Kegiatan</label></td>
                              <td width="70%" colspan="4"><input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" aria-describedby="nama_kegiatan" required></td> 
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Hari</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="Laki-laki">Senin</option>
                                  <option value="Perempuan">Selasa</option>
                                  <option value="Laninya">Rabu</option>
                                  <option value="Laninya">Kamis</option>
                                  <option value="Laninya">Jumat</option>
                                  <option value="Laninya">Sabtu</option>
                                  <option value="Laninya">Minggu</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                            <td width="30%"><label>Tanggal</label></td>
                              <td width="70%"><input type="date" name="tanggal_kegiatan" class="form-control" id="tanggal_kegiatan" aria-describedby="tanggal_kegiatan" required></td>
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
   <div class="modal fade" id="viewjadwal" tabindex="-1" aria-labelledby="viewjadwalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewjadwalLabel">Jadwal</h5>
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
                              <td width="30%">{{$value->kode_ja}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Nama Kegiatan</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->nama_kegiatan}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Hari</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->hari_kegiatan}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Tanggal</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->tanggal_kegiatan}}</td>
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
    <button class="btn btn-info" data-toggle="modal" data-target="#modaljadwal">New Post</button>
  </div>
    <form action="{{url('jadwal')}}" method="GET" class="form-inline my-2 my-lg-0">
        <div width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </div>
        <div width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button></div>
    </form>
</div>
    
    <table class="table table-bordered table-responsive table-hover mt-2" width="80%">
        <thead class="table-dark">
        <tr align="center" >
            <th width="5%">NO</th>
            <th width="15%">KODE</th>
            <th width="30%">NAMA KEGIATAN</th>
            <th width="25%">HARI</th>
            <th width="40%">TANGGAL</th>
            <th colspan="3" width="10%">AKSI</th>
        </tr>
        </thead>
        <?php $i=1 ?>
        @foreach ($datas as $value)
            <tr>
                <td align="center" >{{$i++}}</td>
                <td>{{$value->kode_ja}}</td>
                <td>{{$value->nama_kegiatan}}</td>
                <td>{{$value->hari_kegiatan}}</td>
                <td>{{$value->tanggal_kegiatan}}</td>
                
                <td align="right"><button class="btn btn-info" data-toggle="modal" data-target="#viewjadwal">Lihat</button></td>
                <td align="right"><button class="btn btn-success" data-id="{{$value->id}}" data-kode="{{$value->kode_ja}}" data-nama_kegiatan="{{$value->nama_kegiatan}}" data-hari_kegiatan="{{$value->hari_kegiatan}}" data-tanggal_kegiatan="{{$value->tanggal_kegiatan}}" data-toggle="modal" data-target="#editjadwal">Edit</button></td>
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