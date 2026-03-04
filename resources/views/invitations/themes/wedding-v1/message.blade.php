@extends('../layouts/admin')

@section('mainLayout')
    <h1 class="mt-4">Daftar Ucapan</h1>
    <ol class="breadcrumb mb-4">
        {{-- <li class="breadcrumb-item"><a href="index.html">Pages</a></li> --}}
        <li class="breadcrumb-item active">Message</li>
    </ol>

    <div class="container">
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
                                <th>Pesan</th>
                                <th>Kehadiran</th>
                                <th class="text-center">Config</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dataPesan as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->pesan }}</td>
                                    <td>{{ $item->confirm }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('delMessage', ['id' => $item->id]) }}" data-id="{{ $item->id }}"
                                            class="btn btn-sm btn-danger pesan-delete-btn">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const deleteButtons = document.querySelectorAll('.pesan-delete-btn');

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

@endsection
