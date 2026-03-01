document.querySelectorAll('.icon-select').forEach(button => {
    button.addEventListener('click', function () {

        const icon = this.dataset.icon;

        document.getElementById('selectedIcon').value = icon;

        const preview = document.getElementById('iconPreview');
        preview.className = 'fa-solid ' + icon + ' fa-lg';
    });
});