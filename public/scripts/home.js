function onResponse(response)
{
    return response.json();
}

function likeRefresh(posts)
{
    const likes = document.querySelectorAll('.like');
    for (const like of likes) {
        for (const post of posts) {
            if (like.dataset.postId == post.id) {
                const img = like.querySelector('img');
                img.src = "img/liked.png"
                like.classList.add('selected');
            }
        }
    }
}

function onPosts(posts)
{
    const template = document.querySelector('template');
    const feed = document.querySelector('#feed');
    feed.innerHTML = "";
    for (const data of posts) {
        const post = template.content.querySelector('.post').cloneNode(true);
        post.querySelector('.like').dataset.postId = data.post.id;
        post.querySelector('.content p').textContent = JSON.parse(data.post.content).text;
        if (JSON.parse(data.post.content).picture != null) {
            post.querySelector('.content img').classList.remove('hidden');
            post.querySelector('.content img').src = JSON.parse(data.post.content).picture;
        }
        post.querySelector('.like span').textContent = data.post.num_likes;
        post.querySelector('.name').textContent = data.user.name + " " + data.user.surname;
        post.querySelector('.username').textContent = data.user.username;
        post.querySelector('.user img').src = data.user.picture;
        post.querySelector('.date span').textContent = data.date;
        feed.appendChild(post);
    }

    const likes = document.querySelectorAll('.like img');
    for (const like of likes) {
        like.addEventListener('click', onLikeClick);
    }

    fetch("home/like/check").then(onResponse).then(likeRefresh);
}

fetch("home/post").then(onResponse).then(onPosts);

function refreshPosts()
{
    fetch("home/post").then(onResponse).then(onPosts);
}

function onSubmit(event)
{
    const form_data = {method: 'post', body: new FormData(form)};
    form.text.value = "";
    form.picture.value = "";
    fetch("home/post/add", form_data).then(response => console.log(response.text())).then(refreshPosts);
    form['submit'].disabled = true;
    const str = document.querySelector('.custom-file-upload');
    str.textContent = "Carica un'immagine";
    event.preventDefault();
}

const form = document.forms['post-form'];
form.addEventListener('submit', onSubmit);

function onText(event)
{
    if (text.value.length != 0) {
        form['submit'].disabled = false;
    } else {
        form['submit'].disabled = true;
    }
}

const text = form['text'];
text.addEventListener('keyup', onText);

function onLikeClick(event)
{
    const like = event.currentTarget.parentNode;
    const img = like.querySelector('img');
    if (!like.classList.contains('selected')) {
        img.src = "img/liked.png";
        like.classList.add('selected');
        fetch("home/like/add/" + like.dataset.postId).then(refreshPosts);
    } else {
        like.classList.remove('selected');
        img.src = "img/like.png";
        fetch("home/like/remove/" + like.dataset.postId).then(refreshPosts);
    }
}

function clickUpload(event)
{
    const str = document.querySelector('.custom-file-upload');
    str.textContent = file_upload.files[0].name;
}

const file_upload = document.querySelector('#file-upload');
file_upload.addEventListener('change', clickUpload);

function onMenuClick(event)
{
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.add('open');
    close_area.classList.remove('hidden');
    const page = document.querySelector('.page');
    page.classList.add('opacity');
}

const menu = document.querySelector('#menu');
menu.addEventListener('click', onMenuClick);

function onCloseSidebar(event)
{
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.remove('open');
    close_area.classList.add('hidden');
    const page = document.querySelector('.page');
    page.classList.remove('opacity');
}

const close_img = document.querySelector('.sidebar img');
close_img.addEventListener('click', onCloseSidebar);

const close_area = document.querySelector('.close-sidebar');
close_area.addEventListener('click', onCloseSidebar);