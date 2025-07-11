@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Surat Masuk</h5>
    @if(Auth::user()->role !== 'kepsek')
    <a class="btn create-new btn-primary" href="{{ route('masuk.create') }}">
      <span class="d-flex align-items-center gap-2">
        <i class="icon-base ri ri-add-large-line"></i>
        <span class="d-none d-sm-inline-block">Add New Record</span>
      </span>
    </a>
    @endif
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>No Surat</th>
          <th>Tgl Surat</th>
          <th>Tgl Terima</th>
          <th>Pengirim</th>
          <th>Perihal</th>
          <th>File Surat</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($suratMasuk as $item)
        <tr>
          <td>{{$item->no_surat}}</td>
          <td>{{$item->tgl_surat}}</td>
          <td>{{$item->tgl_terima}}</td>
          <td>{{$item->pengirim}}</td>
          <td>{{$item->perihal}}</td>
          <td>{{$item->file_surat}}</td>
          <td>
            <span class="badge rounded-pill @if($item->status == 'diproses') bg-label-primary @elseif($item->status == 'didisposisi') bg-label-info @elseif($item->status == 'ditindaklanjuti') bg-label-warning @endif  me-1">{{$item->status}}</span>
          </td>
          <td>
            <div class="dropdown">
              <button
                type="button"
                class="btn p-0 dropdown-toggle hide-arrow shadow-none"
                data-bs-toggle="dropdown">
                <i class="icon-base ri ri-more-2-line icon-18px"></i>
              </button>
              <div class="dropdown-menu">
                @if(Auth::user()->role === 'admin')
                @if($item->status !== 'didisposisi')
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal-{{$item->id}}">
                  <i class="icon-base ri ri-mail-send-line icon-18px me-1"></i>
                  Disposisi
                </a>
                @endif
                @endif
                @if(Auth::user()->role === 'kepsek')
                @if($item->status !== 'diproses')
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal-{{$item->id}}">
                  <i class="icon-base ri ri-mail-send-line icon-18px me-1"></i>
                  Disposisi
                </a>
                @endif
                @endif
                <a class="dropdown-item" href="{{ route('masuk.edit', $item->id) }}">
                  <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                  Edit</a>
                <a class="dropdown-item" href="{{ route('masuk.destroy', $item->id) }}" data-confirm-delete="true">
                  <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                  Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@foreach($suratMasuk as $data)
@if(Auth::user()->role == 'admin')
<form action="{{ route('disposisi.store')}}" method="post">
  @elseif(Auth::user()->role == 'kepsek')
  <form action="{{ route('kepsek.disposisi.store')}}" method="post">
@endif
  @csrf
<div class="modal fade" id="basicModal-{{$data->id}}" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Disposisi</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
              <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" value="{{ $data->no_surat}}" name="no_surat" readonly/> 
              <label for="nameBasic">No Surat</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline mb-6">
              <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="user_id">
                @if(Auth::user()->role === 'admin')
                @foreach($listakun as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
                @elseif(Auth::user()->role === 'kepsek')
                @foreach($listUser as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                @endif
              </select>
              <label for="exampleFormControlSelect1">Tujuan Disposisi</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline mb-6">
              <textarea
                class="form-control h-px-100"
                id="exampleFormControlTextarea1"
                placeholder="Catatan Disposisi.." name="catatan"></textarea>
              <label for="exampleFormControlTextarea1">Catatan Disposisi</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <form action="{{ route('disposisi.store', $data->id) }}" method="POST">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>
</form>
@endforeach
@endsection
                            
