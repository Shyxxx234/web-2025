const lengthImages = document.getElementsByClassName("post__images").length;
for (i = 0; i < lengthImages; i++) {
    const sliderLeft = document.getElementsByClassName("post__slider--left")[i];
    const sliderRight = document.getElementsByClassName("post__slider--right")[i];
    const indicator = document.getElementsByClassName("post__indicator")[i];
    const images = document.getElementsByClassName("post__images")[i];

    let image = images.children[0];
    let counter = 1;
    let lastEventTime = 0;
    let quantity = images.childElementCount - 3;
    image.classList.add("post__photo--visible");

    image.addEventListener("click", () => {
            image.classList.add("post__photo--big");
            //image.classList.remove("post__photo--big");
        });


    if (sliderLeft && sliderRight) {
        sliderLeft.addEventListener("click", (e) => {
            const now = Date.now();
            if (now - lastEventTime < 300) {
                e.preventDefault();
                e.stopPropagation();
                return;
            }
            lastEventTime = now;
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

        sliderRight.addEventListener("click", (e) => {
            const now = Date.now();
            if (now - lastEventTime < 300) {
                e.preventDefault();
                e.stopPropagation();
                return;
            }
            lastEventTime = now;
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

