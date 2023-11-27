<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Productos',
        'route' => route('admin.products.index'),
    ],
    [
        'name' => $product->Prod_Name,
    ],
]">

    @livewire('admin.products.product-edit', compact('product'))

</x-admin-layout>