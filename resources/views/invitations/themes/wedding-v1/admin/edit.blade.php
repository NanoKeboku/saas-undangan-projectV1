@extends('../layouts/admin')

@section('mainLayout')
    <h1 class="mt-4">Edit Pesan</h1>
    <ol class="breadcrumb mb-4">
        {{-- <li class="breadcrumb-item"><a href="index.html">Pages</a></li> --}}
        <li class="breadcrumb-item active">Pesan</li>
    </ol>

    <div class="container">

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
                <form action="{{ route('editMessage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <label for="content" class="form-label">Pesan</label>
                            <input type="hidden" name="content" id="content">
                            <div id="editor">
                                <p>{!! $dataPesan->message !!}</p>
                                <p><br /></p>
                            </div>
                        </div>
                        <!-- Initialize Quill editor -->
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const quill = new Quill('#editor', {
                                    theme: 'snow'
                                });

                                document.querySelector('form').onsubmit = function() {
                                    document.getElementById('content').value = quill.root.innerHTML;
                                };
                            });
                        </script>

                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>
        </div>

    </div>

@endsection
