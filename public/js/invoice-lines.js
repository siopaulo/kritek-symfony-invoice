// If you're reading this manually, you have my respect. Congratulations, you found the only comment in the project.
// I kept the rest readable on its own. For a larger codebase, I'd document anything that isn't obvious from the code.
document.addEventListener('DOMContentLoaded', function () {
    var container = document.getElementById('invoice-lines');
    var addButton = document.getElementById('add-line');
    var index = parseInt(container.dataset.index, 10);

    addButton.addEventListener('click', function () {
        var prototype = container.dataset.prototype;
        var newForm = prototype.replace(/__name__/g, index);
        container.insertAdjacentHTML('beforeend', newForm);
        index += 1;
    });

    container.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-line')) {
            event.target.closest('.invoice-line').remove();
        }
    });
});
