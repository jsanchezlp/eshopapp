<div class="row">
    <div class="col-xl-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0">Editar Subcategoría</h6>
                    <hr />
                    <form class="row g-3" wire:submit="update">
                        <div class="col-12">
                            <label class="form-label">Nombre</label>
                            <input wire:model="subcategoryEdit.Subcat_Name" type="text" class="form-control" placeholder="Inserte nombre" required>
                            @error('subcategoryEdit.Subcat_Name')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-4">
                            <label class="form-label">Familia</label>
                            <select class="form-select" wire:model.live="subcategoryEdit.Family_ID">
                                <option value="" disabled>Seleccione una familia</option>
                                @foreach ($families as $family)
                                <option value="{{ $family->Family_ID }}" @selected( old('subcategoryEdit.Family_ID', $family->Family_ID) == $this->subcategory['Family_ID'])>
                                    {{ $family->Family_Name }}
                                </option>
                                @endforeach
                            </select>
                            @error('subcategoryEdit.Family_ID')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-4">
                            <label class="form-label">Categoría</label>
                            <select class="form-select" wire:model.live="subcategoryEdit.Subcat_CatID">
                                <option value="" disabled>Seleccione una categoría</option>
                                @foreach ($this->categories as $category)
                                    <option value="{{ $category->Cate_ID }}" @selected( old('subcategoryEdit.Subcat_CatID', $category->Cate_ID) == $subcategory->Subcat_CatID)>
                                        {{ $category->Cate_Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subcategoryEdit.Subcat_CatID')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-6 offset-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->