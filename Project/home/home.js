function addSliderListener(container, modal) {
    const images = container.querySelector(".post__images");
    if (!images || images.children.length == 0) return null;

    const imageElements = images.children;
    const indicator = container.querySelector(".post__indicator");
    const sliderLeft = container.querySelector(".post__slider_left");
    const sliderRight = container.querySelector(".post__slider_right");

    let currentIndex = 0;

    function updateSlider(newIndex) {
        for (let i = 0; i < imageElements.length; i++) {
            imageElements[i].classList.remove("post__photo_visible");
        }

        currentIndex = (newIndex + imageElements.length) % imageElements.length;
        imageElements[currentIndex].classList.add("post__photo_visible");

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

function modalWindow(container, post) {
    const modalWindow = container.querySelector(".page__modal-window");
    const imagesContainer = post.querySelector(".post__images");

    imagesContainer.addEventListener("click", function () {
        const clone = post.querySelector(".post__contains").cloneNode(true);
        const exitButton = container.createElement("img");
        exitButton.src = "../images/button.png";
        exitButton.alt = "Выход";
        exitButton.classList.add("modal-window__exit-button");
        modalWindow.innerHTML = '';
        clone.appendChild(exitButton);
        modalWindow.appendChild(clone);

        currentModalSlider = addSliderListener(clone, true);

        const modalImages = clone.querySelector(".post__images").children;
        for (let i = 0; i < modalImages.length; i++) {
            modalImages[i].classList.add("post__photo_big");
        }

        const modalLeft = clone.querySelector(".post__slider_left");
        const modalRight = clone.querySelector(".post__slider_right");


        if (modalLeft) modalLeft.classList.add("modal_window__slider");
        if (modalRight) modalRight.classList.add("modal_window__slider");

        modalWindow.classList.add("page__modal-window_active");

        container.addEventListener("keydown", function (e) {
            const modalWindow = container.querySelector(".page__modal-window");
            if (e.key === "Escape") {
                modalWindow.classList.remove("page__modal-window_active");
                if (currentModalSlider) {
                    currentModalSlider.destroy();
                    currentModalSlider = null;
                }
            }
        });
        container.addEventListener("click", function (e) {
            const modalWindow = container.querySelector(".page__modal-window");
            if (e.target === modalWindow || e.target === exitButton) {
                modalWindow.classList.remove("page__modal-window_active");
                if (currentModalSlider) {
                    currentModalSlider.destroy();
                    currentModalSlider = null;
                }
            }
        });
    });
}

function buttonMore(post) {
    const text = post.querySelector(".post__text");
    const moreButton = post.querySelector(".post__more-btn");
    let textHeight = text.clientHeight;
    if (textHeight > 36) {
        text.classList.add("post__text_short");
        moreButton.classList.add("post__more-btn_visible");
    }
    let mode = 0;
    moreButton.addEventListener("click", () => {
        text.classList.toggle("post__text_short");
        if (!mode) {
            moreButton.textContent = "скрыть";
            mode = 1;
        } else {
            moreButton.textContent = "ещё";
            mode = 0;
        }
    })
}

const posts = document.getElementsByClassName("post");
const sliders = [];
let currentModalSlider = null;

for (const post of posts) {
    const slider = addSliderListener(post, false);
    if (slider) {
        sliders.push(slider);
    }
    modalWindow(document, post);
    buttonMore(post);
}


