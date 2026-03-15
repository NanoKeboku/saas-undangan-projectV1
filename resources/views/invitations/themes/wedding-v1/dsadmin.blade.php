@extends('./layouts/admin')

@section('mainLayout')
    <h1 class="mt-4">Daftar Tamu</h1>
    <ol class="breadcrumb mb-4">
        {{-- <li class="breadcrumb-item"><a href="index.html">Pages</a></li> --}}
        <li class="breadcrumb-item active">Pages</li>
    </ol>

    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPages">
            Tambah Tamu
        </button>
        @if ($errors->any())
            <div class="alert text-white my-2 bg-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert text-white my-2 bg-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="table-transparent text-capitalize">
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th class="text-center">Config</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>+{{ $item->number }}</td>
                                    <td class="text-center">
                                        @php
                                            $undanganUrl = 'https://instudio.id/send/'.$item->slug;

                                            // Ambil data dan ubah tag HTML menjadi enter
                                            $raw = $dataMessage->message;
                                            $raw = preg_replace('/<br\s*\/?>/i', "\n", $raw);
                                            $raw = preg_replace('/<\/p>/i', "\n", $raw);
                                            $raw = preg_replace('/<\/div>/i', "\n", $raw);

                                            // Buang semua tag HTML lain
                                            $userdata = trim(strip_tags($raw));

                                            // Susun pesan
                                            $messageText =
                                                "Dear $item->name" . PHP_EOL . PHP_EOL .
                                                $userdata . PHP_EOL . PHP_EOL .
                                                "Link Undangan : $undanganUrl";
                                        @endphp

                                        <a target="_blank"
                                            href="https://wa.me/{{ $item->number }}?text={{ urlencode($messageText) }}"
                                            class="btn btn-sm btn-primary ">Undang</a>
                                        <a href="http://127.0.0.1:8000/send/{{ $item->slug }}"
                                            class="btn btn-sm btn-info " target="_blank">Lihat</a>
                                        <a href="{{ route('delTamu', ['id' => $item->id]) }}" data-id="{{ $item->id }}"
                                            class="btn btn-sm btn-danger pages-delete-btn">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const deleteButtons = document.querySelectorAll('.pages-delete-btn');

                                    deleteButtons.forEach(function(button) {
                                        button.addEventListener('click', function(e) {
                                            e.preventDefault(); // Cegah link langsung dijalankan

                                            const url = this.getAttribute('href');

                                            Swal.fire({
                                                title: 'Yakin ingin menghapus?',
                                                text: "Data akan dihapus permanen!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#d33',
                                                cancelButtonColor: '#107270',
                                                confirmButtonText: 'Ya, hapus!',
                                                cancelButtonText: 'Batal'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    // Redirect ke URL delete
                                                    window.location.href = url;
                                                }
                                            });
                                        });
                                    });
                                });
                            </script>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="addPages" tabindex="-1" aria-labelledby="addPages" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPages">Tambah Tamu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('contactStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">nama</label>
                            <input type="text" id="title" class="form-control" name="name">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+</span>
                            <input type="number" class="form-control" placeholder="6234234xxxx" aria-label="whatsapp"
                                name="whatsapp" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
