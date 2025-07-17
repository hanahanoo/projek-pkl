@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Data Surat yang diajukan</h5>
    @if(Auth::user()->role == 'user')
    <a class="btn create-new btn-primary" href="{{ route('pengajuan.create') }}">
      <span class="d-flex align-items-center gap-2">
        <i class="icon-base ri ri-add-large-line"></i>
        <span class="d-none d-sm-inline-block">Tambah Pengajuan</span>
      </span>
    </a>
    @endif
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Tujuan</th>
          <th>Tgl Input Pengajuan</th>
          <th>Perihal</th>
          <th>Status</th>
          @if(Auth::user()->role == 'admin')
          <th>Actions</th>
          @endif
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($pengajuan as $item)
        <tr>
          <td>{{$item->tujuan_surat}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->perihal}}</td>
          <td>
            <span class="badge rounded-pill @if($item->status == 'menunggu') bg-label-info @elseif($item->status == 'Ditolak') bg-label-success @elseif($item->status == 'ditolak') bg-label-danger @endif  me-1">{{$item->status}}</span>
          </td>
          @if(Auth::user()->role == 'kepsek')
          <td>
            <div class="dropdown">
              <button
                type="button"
                class="btn p-0 dropdown-toggle hide-arrow shadow-none"
                data-bs-toggle="dropdown">
                <i class="icon-base ri ri-more-2-line icon-18px"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal-{{$item->id}}">
                  <i class="icon-base ri ri-mail-send-line icon-18px me-1"></i>
                  Detail
                </a>
              </div>
            </div>
          </td>
          @endif
        @empty
<tr>
  <td colspan="5" class="text-center text-muted py-4">
    <i class="ri-information-line me-1"></i> Belum ada data surat masuk.
  </td>
</tr>
@endforelse

        </tr>
      
      </tbody>
    </table>
  </div>
</div>
@foreach($pengajuan as $data)
<div class="modal fade" id="basicModal-{{$data->id}}" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Detail Pengajuan Surat</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.pengajuan.update', $data->id) }}" method="POST">
          @csrf
          @method('PUT')
      <div class="modal-body">
        <div class="row">
          <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
              <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" value="{{ $data->status}}" name="no_surat" readonly/> 
              <label for="nameBasic">Status</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
              <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" value="{{ $data->user->name}}" name="no_surat" readonly/> 
              <label for="nameBasic">Pengirim</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
              <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" value="{{ $data->created_at}}" name="tgl_surat" readonly/> 
              <label for="nameBasic">Tanggal Pengajuan Diinput</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
              <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" value="{{ $data->perihal}}" name="perihal" readonly/> 
              <label for="nameBasic">Perihal</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-6 mt-2">
            <a href="{{ route('pengajuan.download', $data->id) }}" class="btn btn-sm btn-primary">
              Download Surat
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
              <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status">
                <option value="disetujui">DiSetujui</option>
                <option value="ditolak">Ditolak</option>
              </select>
              <label for="exampleFormControlSelect1">Ubah Status</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Ubah Status dan Input Surat Keluar</button>
      </div>
    </form>  
    </div>
  </div>
</div>
@endforeach
@endsection
                            
