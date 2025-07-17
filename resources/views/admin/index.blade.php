@extends('layouts.admin')
@section('content')
              <div class="row gy-6">
                <!-- Transactions -->
                <div class="col-lg-15">
                  <div class="card h-100">
                    <div class="card-header">
                      <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Statistik Data</h5>
                      </div>
                    </div>
                    <div class="card-body pt-lg-10">
                      <div class="row g-6">
                        @if(Auth::user()->role == 'admin')
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-primary rounded shadow-xs">
                                <i class="icon-base ri ri-mail-add-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Surat Masuk</p>
                              <h5 class="mb-0">{{ $totalMasuk }}</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-success rounded shadow-xs">
                                <i class="icon-base ri ri-mail-send-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Surat Keluar</p>
                              <h5 class="mb-0">{{ $totalKeluar }}</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-warning rounded shadow-xs">
                                <i class="icon-base ri ri-archive-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Arsip</p>
                              <h5 class="mb-0">1.54k</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-info rounded shadow-xs">
                                <i class="icon-base ri ri-group-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Pengguna</p>
                              <h5 class="mb-0">{{ $totalUsers}}</h5>
                            </div>
                          </div>
                        </div>
                        @elseif(Auth::user()->role == 'user')
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-primary rounded shadow-xs">
                                <i class="icon-base ri ri-mail-add-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Inbox</p>
                              <h5 class="mb-0">{{ $inbox }}</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-success rounded shadow-xs">
                                <i class="icon-base ri ri-mail-send-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Surat Keluar</p>
                              <h5 class="mb-0"></h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-warning rounded shadow-xs">
                                <i class="icon-base ri ri-archive-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Arsip</p>
                              <h5 class="mb-0">1.54k</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-info rounded shadow-xs">
                                <i class="icon-base ri ri-group-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Pengguna</p>
                              <h5 class="mb-0"></h5>
                            </div>
                          </div>
                        </div>
                        @elseif(Auth::user()->role == 'kepsek')
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-primary rounded shadow-xs">
                                <i class="icon-base ri ri-mail-add-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Surat Masuk</p>
                              <h5 class="mb-0">{{ $totalMasuk }}</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-success rounded shadow-xs">
                                <i class="icon-base ri ri-mail-send-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Surat Keluar</p>
                              <h5 class="mb-0">{{ $totalKeluar }}</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-warning rounded shadow-xs">
                                <i class="icon-base ri ri-archive-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Arsip</p>
                              <h5 class="mb-0">1.54k</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-info rounded shadow-xs">
                                <i class="icon-base ri ri-group-line icon-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <p class="mb-0">Pengguna</p>
                              <h5 class="mb-0">{{ $totalUsers}}</h5>
                            </div>
                          </div>
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
                <!-- Data Tables -->
                @if(Auth::user()->role == 'admin')
                <div class="col-12">
                  <div class="card overflow-hidden">
                    <div class="card-header">
                      <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Surat Masuk Terbaru</h5>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th class="text-truncate">No Surat</th>
                            <th class="text-truncate">pengirim</th>
                            <th class="text-truncate">Perihal</th>
                            <th class="text-truncate">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $suratMasuks = $suratMasuk->take(5);
                          @endphp
                          @foreach($suratMasuks as $data)
                          <tr>
                            <td class="text-truncate">{{ $data->no_surat}}</td>
                            <td class="text-truncate">{{ $data->pengirim}}</td>
                            <td class="text-truncate">{{ $data->perihal}}</td>
                            <td>
                              <span class="badge rounded-pill @if($data->status == 'diproses') bg-label-primary @elseif($data->status == 'didisposisi') bg-label-info @elseif($data->status == 'ditindaklanjuti') bg-label-warning @endif  me-1">{{$data->status}}</span>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card overflow-hidden">
                    <div class="card-header">
                      <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Surat Keluar Terbaru</h5>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th class="text-truncate">No Surat</th>
                            <th class="text-truncate">tujuan</th>
                            <th class="text-truncate">Perihal</th>
                            <th class="text-truncate">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $suratkeluars = $suratKeluar->take(5);
                          @endphp
                          @foreach($suratkeluars as $data)
                          <tr>
                            <td class="text-truncate">{{ $data->no_surat}}</td>
                            <td class="text-truncate">{{ $data->tujuan}}</td>
                            <td class="text-truncate">{{ $data->perihal}}</td>
                            <td>
                              <span class="badge rounded-pill @if($data->status == 'draft') bg-label-info @elseif($data->status == 'terkirim') bg-label-success @endif  me-1">{{$data->status}}</span>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                @endif
                <!--/ Data Tables -->
              </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          
@endsection