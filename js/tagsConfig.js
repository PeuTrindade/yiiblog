const url = window.location.href;
const urlArray = url.split('=');
const tags = Array.from(document.getElementById('tags').children);
const deleteTags = document.getElementById('deleteTags');

tags.forEach((tag) => {
    if(tag.innerText === urlArray[urlArray.length - 1]){
        tag.children[0].className = 'tagActive';
        deleteTags.className = 'deleteTagsActive';
    }
});