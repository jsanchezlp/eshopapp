<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <h5 class="mb-0">Agregar Nuevo Producto</h5>
            </div>
            <div class="card-body">
                <div class="border p-3 rounded">
                    <form wire:submit="store" class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Título del producto</label>
                            <input wire:model="product.Prod_Name" type="text" class="form-control">
                            @error('product.Prod_Name')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Slug del producto</label>
                            <input wire:model="product.Prod_Slug" type="text" class="form-control" placeholder="ejemplo-slug-producto">
                            @error('product.Prod_Slug')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">SKU</label>
                            <input wire:model="product.Prod_Sku" type="number" min="0" class="form-control" placeholder="12345">
                            @error('product.Prod_Sku')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descripción</label>
                            <textarea wire:model="product.Prod_Description" class="form-control" placeholder="Descripción del producto"
                                cols="4"></textarea>
                            @error('product.Prod_Description')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Imagen</label>
                        </div>
                        <div class="col-12 mt-4">
                            <img src="{{ $product_image ? $product_image->temporaryUrl() : asset('assets/images2/no_image_available.jpg') }}" class="mw-50 img-fluid mx-auto d-block mb-4" >
                            <div class="d-grid col-sm-12 col-md-6 offset-md-3">
                                <label class="btn btn-success font-20">
                                    <i class="lni lni-camera"></i> Agregar imagen
                                    <input type="file" wire:model="product_image" hidden accept="image/*">
                                    @error('product.product_image')
                                        <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Tags</label>
                            <input type="text" class="form-control" placeholder="Enter tags">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Proveedor</label>
                            <select class="form-select" wire:model.live="product.Prod_SuppID">
                                <option value="" disabled>Seleccione proveedor</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->Supp_ID }}">
                                        {{ $supplier->Supp_Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product.Prod_SuppID')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Marca</label>
                            <select class="form-select" wire:model.live="product.Prod_BrandID">
                                <option value="" disabled>Seleccione marca</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->Brand_ID }}">
                                        {{ $brand->Brand_Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product.Prod_BrandID')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Familia</label>
                            <select class="form-select" wire:model.live="family_id">
                                <option value="" disabled>Seleccione una familia</option>
                                @foreach ($families as $family)
                                    <option value="{{ $family->Family_ID }}">
                                        {{ $family->Family_Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('family_id')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Categoría</label>
                            <select class="form-select" wire:model.live="category_id">
                                <option value="" disabled>Seleccione una categoría</option>
                                @foreach ($this->categories as $category)
                                    <option value="{{ $category->Cate_ID }}">
                                        {{ $category->Cate_Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subcategoría</label>
                            <select class="form-select" wire:model.live="product.Prod_SubcatID">
                                <option value="" disabled selected>Seleccione una subcategoría</option>
                                @foreach ($this->subcategories as $subcategory)
                                    <option value="{{ $subcategory->Subcat_ID }}">
                                        {{ $subcategory->Subcat_Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product.Prod_SubcatID')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Precio</label>
                            <input wire:model="product.Prod_Price" type="number" min="0" step="0.01" class="form-control" placeholder="12345">
                            @error('product.Prod_Price')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Stock</label>
                            <input wire:model="product.Prod_Stock" type="number" min="0" class="form-control" placeholder="12345">
                            @error('product.Prod_Stock')
                                <div class="invalid-feedback d-inline">Este campo es obligatorio.</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Publicar en Tienda
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary px-4">Agregar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

@push('js')
    <script>
        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                event.preventDefault();
                    return false;
                }
            });
        });
    </script>
@endpush


