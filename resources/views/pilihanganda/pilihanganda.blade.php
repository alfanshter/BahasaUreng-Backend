@extends('master.master')


@section('konten')


@if (session()->has('success'))
<div class="alert alert-success mt-2" role="alert">
  {{session('success')}}
</div>
@endif

<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Quiz Pilihan Ganda
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>

  <div class="page-header">
    <h3 class="page-title"> Quiz Pilihan Ganda </h3>

    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahModal" data-bs-whatever="@mdo" class="btn btn-gradient-primary btn-icon-text btn-md">
      <i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </button>

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Soal</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="/tambah_soal_kata" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Gambar:</label>
                <img class="img-preview img-fluid">
                <input class="form-control" type="file" id="gambar" name="gambar" required onchange="previewImage()">
                <script>
                  function previewImage() {
                    const image = document.querySelector('#gambar');
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = 'block';

                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(gambar.files[0]);

                    oFReader.onload = function(oFREvent) {
                      imgPreview.src = oFREvent.target.result;
                    }

                  }
                </script>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
          </form>

        </div>
      </div>
    </div>

  </div>


  <div class="table-responsive">
    <table class="table table-striped table-bordered" id="job">
      <thead>
        <tr>
          <th> No </th>
          <th> Gambar </th>
          <th> Jawaban </th>
          <th> Action </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $data)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            <div>
              <img style="height: 100px; width:100px" src="{{asset('storage/'. $data->gambar)}}" alt="">
            </div>
          </td>

          <td>
            <a href="/jawaban_pilihanganda/{{$data->id}}" class="btn btn-gradient-primary btn-outline-secondary btn-sm " >
              <i class="mdi mdi-delete"></i>
                </a>

          </td>

          <td>
            <div class="btn-group">
              <button class="btn btn-gradient-info btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editmodal{{$data->id}}">
                <i class="mdi mdi-pencil-box"></i>
              </button>

              <!-- Modal dari tombol edit -->
              <div class="modal fade" id="editmodal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Quiz</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="/update_kata">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="mb-3">
                          <label for="message-text" class="col-form-label">Gambar:</label>
                          @if ($data->gambar)
                          <img class="img-preview-edit img-fluid" src="{{asset('storage/'.$data->gambar)}}" style="width: 100px; height:100px">
                          @else
                          <img class="img-preview-edit img-fluid">
                          @endif
                          <input class="form-control" type="file" id="editgambar" value="{{asset('storage/'. $data->gambar)}}" name="gambar" required onchange="editImage()">
                          <script>
                            function editImage() {
                              const image = document.querySelector('#editgambar');
                              const imgPreview = document.querySelector('.img-preview-edit');

                              imgPreview.style.display = 'block';

                              const oFReader = new FileReader();
                              oFReader.readAsDataURL(image.files[0]);

                              oFReader.onload = function(oFREvent) {
                                imgPreview.src = oFREvent.target.result;
                              }

                            }
                          </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    </form>

                  </div>
                </div>
              </div>

              <form action="/hapus_pilihanganda" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <input type="hidden" name="gambar" value="{{$data->gambar}}">
                <button class="btn btn-gradient-danger btn-outline-secondary btn-sm " onclick="return confirm('Apakah anda menyetujui ?')">
                  <i class="mdi mdi-delete"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<!-- partial -->
@endsection