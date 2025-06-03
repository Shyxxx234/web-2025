function createSlider(container, modal) {
    const images = container.querySelector(".post__images");
    if (!images || images.children.length == 0) return null;

    const imageElements = images.children;
    const indicator = container.querySelector(".post__indicator");
    const sliderLeft = container.querySelector(".post__slider--left");
    const sliderRight = container.querySelector(".post__slider--right");

    let currentIndex = 0;

    function updateSlider(newIndex) {
        for (let i = 0; i < imageElements.length; i++) {
            imageElements[i].classList.remove("post__photo--visible");
        }

        currentIndex = (newIndex + imageElements.length) % imageElements.length;
        imageElements[currentIndex].classList.add("post__photo--visible");

        if (indicator && !modal) {
            indicator.textContent = `${currentIndex + 1}/${imageElements.length}`;
        } else if (indicator && modal) {
            indicator.textContent = `${currentIndex + 1} из ${imageElements.length}`;
            indicator.classList.add("modal_window__indicator")
        }
    }

    updateSlider(0);

    function handleLeftClick() {
        updateSlider(currentIndex - 1);
    }

    function handleRightClick() {
        updateSlider(currentIndex + 1);
    }

    if (sliderLeft) {
        sliderLeft.addEventListener("click", handleLeftClick);
    }

    if (sliderRight) {
        sliderRight.addEventListener("click", handleRightClick);
    }
    function destroy() {
        if (sliderLeft) {
            sliderLeft.removeEventListener("click", handleLeftClick);
        }
        if (sliderRight) {
            sliderRight.removeEventListener("click", handleRightClick);
        }
    }

    return {
        updateSlider,
        destroy
    };
}

const posts = document.getElementsByClassName("post");
const sliders = [];
let currentModalSlider = null;

for (const post of posts) {
    const slider = createSlider(post, false);
    if (slider) {
        sliders.push(slider);

        const modalWindow = document.querySelector(".page__modal-window");
        const imagesContainer = post.querySelector(".post__images");

        imagesContainer.addEventListener("click", function () {
            const clone = post.querySelector(".post__contains").cloneNode(true);
            modalWindow.innerHTML = '';
            modalWindow.appendChild(clone);

            if (currentModalSlider) {
                currentModalSlider.destroy();
            }

            currentModalSlider = createSlider(clone, true);

            const modalImages = clone.querySelector(".post__images").children;
            for (let i = 0; i < modalImages.length; i++) {
                modalImages[i].classList.add("post__photo--big");
            }

            const modalLeft = clone.querySelector(".post__slider--left");
            const modalRight = clone.querySelector(".post__slider--right");


            if (modalLeft) modalLeft.classList.add("modal_window__slider");
            if (modalRight) modalRight.classList.add("modal_window__slider");

            modalWindow.classList.add("page__modal-window--active");
            
            document.addEventListener("keydown", function (e) {
                const modalWindow = document.querySelector(".page__modal-window");
                if (e.key === "Escape") {
                    modalWindow.classList.remove("page__modal-window--active");
                    if (currentModalSlider) {
                        currentModalSlider.destroy();
                        currentModalSlider = null;
                    }
                }
            });
            document.addEventListener("click", function (e) {
                const modalWindow = document.querySelector(".page__modal-window");
                if (e.target === modalWindow) {
                    modalWindow.classList.remove("page__modal-window--active");
                    if (currentModalSlider) {
                        currentModalSlider.destroy();
                        currentModalSlider = null;
                    }
                }
            });
        });
    }
}

