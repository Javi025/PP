function eliminarUsuario(id) {
    Swal.fire({
        title: "¿Seguro que quieres eliminar?",
        text: "Esta acción no se puede deshacer",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, eliminar"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "delete.php?id=" + id;
        }
    });
}
