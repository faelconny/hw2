function onResponse(response)
{
    return response.json();
}

function onImage(images)
{
    const images_ = document.querySelectorAll('#profile-picture-box img');
    let i = 0;
    for (let i = 0; i < 9; i++) {
        images_[i].src = images[i].url;
    }
}

fetch("picture/api").then(onResponse).then(onImage);

let selected_url = null;

function onImageClick(event)
{
    box = event.currentTarget;
    selected_url = box.src;
    box.classList.remove('opacity');
    for (const box_ of boxes) {
        if (box_.dataset.id != box.dataset.id) {
            box_.classList.add('opacity');
        }
    }
}

const boxes = document.querySelectorAll('#profile-picture-box img');

for (const box of boxes) {
    box.addEventListener('click', onImageClick);
}

function redirect()
{
    window.location.replace("home");
}

function onButtonClick(event)
{
    if (selected_url != null) {
        fetch("picture/load/" + btoa(selected_url)).then(redirect);
    }
}

const button = document.querySelector('button');
button.addEventListener('click', onButtonClick);