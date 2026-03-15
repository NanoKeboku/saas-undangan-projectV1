<div class="wrapper d-flex">
    <aside class="sidebar p-3" style="width: 300px; border-right: 1px solid #ccc; height: 100vh; position: fixed;">
        <h4>Opsi Template</h4>
        <hr>
        <div class="mb-3">
            <button class="btn btn-primary w-100">Beli Sekarang</button>
        </div>
        <div>
            <a href="{{ route('template.edit', $id) }}" class="btn btn-outline-secondary w-100">Edit Template</a>
        </div>
    </aside>

    <main class="content" style="margin-left: 300px; width: calc(100% - 300px);">
        @yield('preview-content')
    </main>
</div>