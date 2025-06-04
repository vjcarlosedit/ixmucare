document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modal");
    const modalImage = document.getElementById("modal-image");
    const closeBtn = document.querySelector(".close");
    const prevBtn = document.querySelector(".prev");
    const nextBtn = document.querySelector(".next");
    const images = document.querySelectorAll(".gallery-image");

    let currentIndex = 0;

    function showModal(index) {
        modal.style.display = "flex";
        modalImage.src = images[index].src;
        currentIndex = index;
    }

    function closeModal() {
        modal.style.display = "none";
    }

    function showNext() {
        currentIndex = (currentIndex + 1) % images.length;
        modalImage.src = images[currentIndex].src;
    }

    function showPrev() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        modalImage.src = images[currentIndex].src;
    }

    images.forEach((image, index) => {
        image.addEventListener("click", () => {
            showModal(index);
        });
    });

    closeBtn.addEventListener("click", closeModal);

    nextBtn.addEventListener("click", showNext);
    prevBtn.addEventListener("click", showPrev);

    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });
});
