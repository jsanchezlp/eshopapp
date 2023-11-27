<form action="{{ route('admin.categories.destroy', $category)}}" method="POST">
    @csrf
    @method('DELETE')
        <a href="javascript:void(0);" onclick=" Swal.fire({
            title: '¿Eliminar?',
            text: '¡No podrás revertir esto!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
        if (result.isConfirmed) {
            this.parentNode.submit()
        }
        });" 
        class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
        title="" data-bs-original-title="Delete"
        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
</form>