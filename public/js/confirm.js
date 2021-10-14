const deleteElement = document.querySelectorAll('.delete');
deleteElement.forEach(form => {
    form.addEventListener('submit', function (e) {
        const name = form.getAttribute('data-title');
        e.preventDefault();
        const answer = window.confirm(`Are you sure you want to delete permanently ${name}`);
        if (answer) this.submit();
    });
});