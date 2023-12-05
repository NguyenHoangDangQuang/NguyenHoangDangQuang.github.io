document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.border');
    cards.forEach(card => {
        card.addEventListener('click', function () {
            const hiddenContent = this.querySelector('.card-content');
            if (hiddenContent) {
                hiddenContent.classList.toggle('hidden');
            }
            console.log("Hello world!");
        });
    });
});
