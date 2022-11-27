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
      </span> Kalimat
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
    <h3 class="page-title"> Data Soal Kalimat </h3>

    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahModal" data-bs-whatever="@mdo" class="btn btn-gradient-primary btn-icon-text btn-md">
      <i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </button>

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kalimat</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="/tambah_kalimat">
              @csrf
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Soal:</label>
                <input type="text" class="form-control" id="recipient-name" name="soal" required>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">jawaban:</label>
                <input class="form-control" id="message-text" name="jawaban" required></textarea>
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
          <th> Soal </th>
          <th> Jawaban </th>
          <th> Action </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $data)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->soal }}</td>
          <td>{{ $data->jawaban }}</td>
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
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Kalimat</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="/update_kalimat">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Soal:</label>
                          <input type="text" class="form-control" value="{{$data->soal}}" id="recipient-name" name="soal" required>
                        </div>
                        <div class="mb-3">
                          <label for="message-text" class="col-form-label">Jawaban:</label>
                          <input class="form-control" id="message-text" value="{{$data->jawaban}}" name="jawaban" required></textarea>
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

              <form action="/hapus_kalimat" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
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