<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Categorías',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => $category->Cate_Name,
    ],
]">

    <div class="row">
        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0">Editar Categoría</h6>
                        <hr />
                        <form class="row g-3" action="{{ route('admin.categories.update', $category) }}" method="POST">
                                @csrf
                                @method('PUT')
                            <div class="col-12">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="Cate_Name" value="{{ old('Cate_Name', $category->Cate_Name) }}" class="form-control" required>
                                @error('Cate_Name')
                                    <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Familia</label>
                                <select class="form-select" name="Cate_Family_ID">
                                    @foreach ($families as $family)
                                        <option value="{{ $family->Family_ID }}"
                                            @selected(old('Cate_Family_ID', $category->Cate_Family_ID) == $family->Family_ID)>
                                            {{ $family->Family_Name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('Cate_Family_ID')
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