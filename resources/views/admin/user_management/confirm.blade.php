@extends('layouts_admin.app')
@section('title', 'User Management')
@section('title_top', 'USER MANAGEMENT')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="ml-3" style="color:#CE3ABD">
                                <h3>Konfirmasi User</h3>
                            </div>
                            <div class="ml-3 mr-3 p-4" id="konfirmasi_user">
                                <table>
                                    <tbody id="text_konfirmasi_user">
                                        <tr>
                                            <td>Nama</td>
                                            <td>&nbsp;:</td>
                                            <td>{{ $user->nama_depan }} {{ $user->nama_belakang }}</td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td>&nbsp;:</td>
                                            <td>{{ $user->role }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status Akun</td>
                                            <td>&nbsp;:</td>
                                            <td>{{ $user->status }}</td>
                                        </tr>
                                        <tr>
                                            <td>Berkas KTP</td>
                                            <td>&nbsp;:</td>
                                            <td><button type="button" class="btn btn-sm" id="button_berkas_user"
                                                    data-toggle="modal" data-target=".bd-example-modal-lg">Lihat
                                                    Berkas</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <embed type="application/pdf" src="{{ asset('assets/css/contoh.pdf') }}"
                                                width="100%" height="400"></embed>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    #konfirmasi_user {
                                        border-style: solid;
                                        border-width: 2px;
                                        border-radius: 10px;
                                        border-color: #CE3ABD;
                                    }

                                    #text_konfirmasi_user {
                                        font-size: 18px;
                                    }

                                    #button_berkas_user {
                                        background-color: #CE3ABD;
                                    }
                                </style>
                            </div>
                            <form action="{{ route('update_user.admin', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @if ($user->status == 'Non Aktif')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" value="Aktif" name="status">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <a href="{{ route('user.admin') }}" type="button" class="btn"><i
                                                class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
                                        <button type="submit" class="btn" id="btn_table"><i
                                                class="nav-icon fas fa-save"></i>
                                            &nbsp;
                                            Aktifkan</button>
                                    </div>
                                @elseif($user->status == 'Aktif')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" value="Non Aktif" name="status">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <a href="{{ route('user.admin') }}" type="button" class="btn"><i
                                                class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
                                        <button type="submit" class="btn" id="btn_table"><i
                                                class="nav-icon fas fa-save"></i>
                                            &nbsp;
                                            Non Aktifkan</button>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection