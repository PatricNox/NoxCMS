'use strict';

// Content fading on shifting
const content = document.getElementsByClassName('content')[0];

window.onload = function () {
    setTimeout(function() {
        content.style.opacity = '1';
    }, 200);
}
// Toolbox for Posting Page
const IMGTag = document.getElementById('img-click');
const URLTag = document.getElementById('url-click');
const box    = document.getElementById('post-content');
const cancel = document.getElementById('upload-cancel');
const thumb  = document.getElementById('thumb');
const upload = document.getElementsByClassName('upload-area')[0];

if (IMGTag) {
    IMGTag.addEventListener('click', () => {
        upload.style.display = 'block';
    });
}

const PreviewUpload = function (input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            thumb.setAttribute('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
};

if (URLTag) {
    URLTag.addEventListener('click', () => {
        box.innerHTML += '<a href=""></a>'
    });
}

if (cancel) {
    cancel.addEventListener('click', () => {
        upload.style.display = 'none';
    });
}
