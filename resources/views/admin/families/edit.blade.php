<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Familias',
        'route' => route('admin.families.index'),
    ],
    [
        'name' => $family->Family_Name,
    ],
]">

    <div class="row">
        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0">Editar Familia</h6>
                        <hr />
                        <form class="row g-3" action="{{ route('admin.families.update', $family) }}" method="POST">
                                @csrf
                                @method('PUT')
                            <div class="col-12">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="Family_Name" value="{{ old('Family_Name', $family->Family_Name) }}" class="form-control" required>
                                @error('Family_Name')
                                    <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                                @enderror
                            </div>
                            <div class="col-6 offset-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

</x-admin-layout>