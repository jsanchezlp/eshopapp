<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Categorías',
    ],
]">

    @if ($categories->count())
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">Categorías de productos</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <form class="row g-3" action="{{ route('admin.categories.store') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" name="Cate_Name" value="{{ old('Cate_Name') }}"
                                            class="form-control" placeholder="Inserte nombre" required>
                                        @error('Cate_Name')
                                            <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="form-label">Familia</label>
                                        <select class="form-select" name="Cate_Family_ID">
                                            @foreach ($families as $family)
                                                <option value="{{ $family->Family_ID }}"
                                                    @selected( old('Cate_Family_ID') )>
                                                    {{ $family->Family_Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('Cate_Family_ID')
                                            <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-8">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Agregar Categoría</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th><input class="form-check-input" type="checkbox"></th>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Familia</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox"></td>
                                                    <td>#{{ $category->Cate_ID }}</td>
                                                    <td>{{ $category->Cate_Name }}</td>
                                                    <td>{{ $category->family->Family_Name }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3 fs-6">
                                                            <a href="{{ route('admin.categories.edit', $category) }}"
                                                                class="text-warning" data-bs-toggle="tooltip"
                                                                data-bs-placement="bottom" title=""
                                                                data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                    class="bi bi-pencil-fill"></i></a>

                                                            @include('admin.categories.form-delete')

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{ $categories->links() }}

                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    @else
        <div class="alert border-0 border-info border-start border-4 bg-light-info alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-info"><i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-info">No hay categorías registradas.</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

</x-admin-layout>