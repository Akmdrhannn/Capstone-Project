@extends('layouts_pengusaha.app')
@section('title', 'Tambah Produk')
@if ($jenis == 'paket_usaha')
    @section('title_top', 'PAKET USAHA')
@else
    @section('title_top', 'SUPPLY')
@endif
@section('content')
    <style>
        .previewImage {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="card p-4">
                <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi">
                        <trix-editor input="deskripsi"></trix-editor>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kategoris_id">Kategori</label>
                        <select name="kategoris_id" id="kategoris_id" class="form-control" required>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    @if ($jenis == 'paket_usaha')
                        <div class="form-group">
                            <label for="kategoris_id">Surat Izin Usaha Perdagangan (SIUP) </label>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-upload fa-7x"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                        </svg>
                                    </div>
                                    <div class="file-select-name" id="noFile"></div>
                                    <input type="file" class="form-control @error('berkas1') is-invalid @enderror"
                                        name="berkas1" aria-describedby="berkasHelp" id="chooseFile"
                                        onchange="PreviewBerkas()">
                                    @error('berkas1')
                                        <div id="namaprodukHelp" class="form-text">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategoris_id">Surat Izin Tempat Usaha (SITU)</label>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-upload fa-7x"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                        </svg>
                                    </div>
                                    <div class="file-select-name" id="noFile2"></div>
                                    <input type="file" class="form-control @error('berkas2') is-invalid @enderror"
                                        name="berkas2" aria-describedby="berkasHelp" id="chooseFile"
                                        onchange="PreviewBerkas2()">
                                    @error('berkas2')
                                        <div id="namaprodukHelp" class="form-text">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategoris_id"> NPWP, UD, NIB, SKDU dan lain sebagainya
                                (Opsional)</label>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-upload fa-7x" viewBox="0 0 16 16">
                                            <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                        </svg>
                                    </div>
                                    <div class="file-select-name" id="noFile3"></div>
                                    <input type="file" class="form-control @error('berkas3') is-invalid @enderror"
                                        name="berkas3" aria-describedby="berkasHelp" id="chooseFile"
                                        onchange="PreviewBerkas3()">
                                    @error('berkas3')
                                        <div id="namaprodukHelp" class="form-text">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto produk</label>
                        <input class="form-control" type="file" id="foto" name="foto"
                            onchange="previewFoto(event)">
                    </div>
                    <div id="previewContainer"></div>

                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="jenis" name="jenis"
                            value="{{ $jenis }}" required autocomplete="jenis" />
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('produk.pengusaha') }}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('nama_produk').addEventListener('input', function() {
            var namaProduk = this.value;
            var slug = namaProduk.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            document.getElementById('slug').value = slug;
        });

        function previewFoto(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var previewContainer = document.getElementById('previewContainer');
                    previewContainer.innerHTML = '<img src="' + e.target.result + '" class="previewImage">';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
