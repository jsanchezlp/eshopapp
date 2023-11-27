<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Productos',
    ],
]">

    <div class="row row-cols-auto g-3 mt-2 mb-4">
        <div class="col">
            <a href="{{ route('admin.products.create') }}">
                <button type="button" class="btn btn-primary px-5">
                    <i class="lni lni-circle-plus"></i> Agregar Producto
                </button>
            </a>
        </div>
    </div>

    @if ( $products->count() )
        <div class="card">
            <div class="card-header py-3">
                <div class="row align-items-center m-0">
                    <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                        <select class="form-select">
                            <option>All category</option>
                            <option>Fashion</option>
                            <option>Electronics</option>
                            <option>Furniture</option>
                            <option>Sports</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-6">
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-2 col-6">
                        <select class="form-select">
                            <option>Status</option>
                            <option>Active</option>
                            <option>Disabled</option>
                            <option>Show all</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>SKU</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Estatus</th>
                                <th>Fecha de alta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $products as $product )
                            <tr>
                                <td><span>#{{ $product->Prod_Sku }}</span></td>
                                <td class="productlist">
                                    <a class="d-flex align-items-center gap-2" href="#">
                                        <div class="product-box">
                                            <img src="{{ asset('assets/admin/assets/images/products/01.png') }}" alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 product-title">{{ $product->Prod_Name }}</h6>
                                        </div>
                                    </a>
                                </td>
                                <td><span>${{ $product->Prod_Price }}</span></td>
                                <td><span class="badge bg-info text-dark">Activo</span></td>
                                <td><span>5-31-2020</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="text-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                            aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $products->links() }}

            </div>
        </div>
    @else
        <div class="alert border-0 border-info border-start border-4 bg-light-info alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-info"><i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-info">No hay productos registrados.</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

</x-admin-layout>