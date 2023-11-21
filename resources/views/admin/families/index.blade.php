<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Familias',
    ],
]">

    @if ($families->count())
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">Familias de productos</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <form class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" class="form-control" placeholder="Inserte nombre" required>
                                    </div>
                                    {{-- <div class="col-12">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" placeholder="Slug name">
                                    </div> --}}
                                    {{-- <div class="col-12">
                                        <label class="form-label">Parent</label>
                                        <select class="form-select">
                                            <option>Fashion</option>
                                            <option>Electronics</option>
                                            <option>Furniture</option>
                                            <option>Sports</option>
                                        </select>
                                    </div> --}}
                                    {{-- <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="3" cols="3" placeholder="Product Description"></textarea>
                                    </div> --}}
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Agregar Familia</button>
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
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($families as $family)
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox"></td>
                                                    <td>#{{ $family->Family_ID }}</td>
                                                    <td>{{ $family->Family_Name }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3 fs-6">
                                                            <a href="javascript:;" class="text-primary"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="" data-bs-original-title="View detail"
                                                                aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                                            <a href="{{ route('admin.families.edit', $family->Family_ID) }}"
                                                                class="text-warning" data-bs-toggle="tooltip"
                                                                data-bs-placement="bottom" title=""
                                                                data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                    class="bi bi-pencil-fill"></i></a>
                                                            <a href="javascript:;" class="text-danger"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="" data-bs-original-title="Delete"
                                                                aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{ $families->links() }}

                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div>
    @else
        <div class="alert border-0 border-info border-start border-4 bg-light-info alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-info"><i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-info">No hay familias de productos registradas.</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

</x-admin-layout>
