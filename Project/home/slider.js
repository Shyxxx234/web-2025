const lengthImages = document.getElementsByClassName("post__images").length;
const modalWindow = document.getElementsByClassName("page__modal-window")[0];

for (i = 0; i < lengthImages; i++) {
    const sliderLeft = document.getElementsByClassName("post__slider--left")[i];
    const sliderRight = document.getElementsByClassName("post__slider--right")[i];
    const indicator = document.getElementsByClassName("post__indicator")[i];
    const images = document.getElementsByClassName("post__images")[i];

    let image = images.children[0];
    let counter = 1;
    let lastEventTime = 0;
    let quantity = images.childElementCount;
    image.classList.add("post__photo--visible");

    images.addEventListener("click", () => {
        cloneImage = image.cloneNode(true);
        modalWindow.appendChild(cloneImage);
        if (sliderLeft && sliderRight) {
            cloneIndicator = indicator.cloneNode(true);
            cloneSliderLeft = sliderLeft.cloneNode(true);
            cloneSliderRight = sliderRight.cloneNode(true);
            modalWindow.appendChild(cloneSliderLeft);
            modalWindow.appendChild(cloneSliderRight);
            cloneSliderLeft.classList.add("modal_window__slider--left");
            cloneSliderRight.classList.add("modal_window__slider--right");
            modalWindow.appendChild(cloneIndicator);
            cloneIndicator.classList.add("modal_window__indicator");
        };
        modalWindow.classList.add("page__modal-window--active");
        cloneImage.classList.add("post__photo--big");
    });
    modalWindow.addEventListener("click", () => {
        modalWindow.replaceChildren();
        modalWindow.classList.remove("page__modal-window--active");
        cloneImage.classList.remove("post__photo--big");
        modalWindow.removeEventListener("click", () => { });
    });

    if (sliderLeft && sliderRight) {
        sliderLeft.addEventListener("click", () => {
            image.classList.remove("post__photo--visible");
            if (counter > 1) {
                counter--;
                image = image.previousElementSibling;
            } else {
                counter = quantity;
                image = images.children[quantity - 1];
            }
            indicator.textContent = `${counter}/${quantity}`;
            image.classList.add("post__photo--visible");
        });
        sliderRight.addEventListener("click", () => {
            image.classList.remove("post__photo--visible");
            if (counter < quantity) {
                counter++;
                image = image.nextElementSibling;
            } else {
                counter = 1;
                image = images.children[0];
            }
            indicator.textContent = `${counter}/${quantity}`;
            image.classList.add("post__photo--visible");
        });
    }
}

