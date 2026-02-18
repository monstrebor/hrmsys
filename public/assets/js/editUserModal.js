document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', () => {
console.log('Edit button clicked');
        document.getElementById('edit-id').value    = button.dataset.id;
        document.getElementById('edit-name').value  = button.dataset.name;
        document.getElementById('edit-email').value = button.dataset.email;
        document.getElementById('edit-role').value  = button.dataset.role;

        const modal = new bootstrap.Modal(
            document.getElementById('editUserModal')
        );
        modal.show();
    });
});