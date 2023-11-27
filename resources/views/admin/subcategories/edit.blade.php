<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Subcategorías',
        'route' => route('admin.subcategories.index'),
    ],
    [
        'name' => $subcategory->Subcat_Name,
    ],
]">

    @livewire('admin.subcategories.subcategory-edit', compact('subcategory'))

</x-admin-layout>