<div class="card-body">
    <form class="row g-3" wire:submit="save">
        <div class="col-12">
            <label class="form-label">Nombre</label>
            <input wire:model="subcategory.Subcat_Name" type="text" class="form-control" placeholder="Inserte nombre" required>
            @error('subcategory.Subcat_Name')
                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
            @enderror
        </div>

        <div class="col-12 mb-4">
            <label class="form-label">Familia</label>
            <select class="form-select" wire:model.live="subcategory.Family_ID">
                <option value="" disabled>Seleccione una familia</option>
                @foreach ($families as $family)
                <option value="{{ $family->Family_ID }}" @selected( old('Family_ID') )>
                    {{ $family->Family_Name }}
                </option>
                @endforeach
            </select>
            @error('subcategory.Family_ID')
                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
            @enderror
        </div>

        <div class="col-12 mb-4">
            <label class="form-label">Categoría</label>
            <select class="form-select" name="Subcat_CatID" wire:model.live="subcategory.Subcat_CatID">
                <option value="" disabled>Seleccione una categoría</option>
                @foreach ($this->categories as $category)
                    <option value="{{ $category->Cate_ID }}" @selected( old('Subcat_CatID') )>
                        {{ $category->Cate_Name }}
                    </option>
                @endforeach
            </select>
            @error('subcategory.Subcat_CatID')
                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
            @enderror
        </div>
        <div class="col-12 mt-8">
            <div class="d-grid">
                <button class="btn btn-primary">Agregar Subcategoría</button>
            </div>
        </div>
    </form>

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
        
    @endif --}}

</div>