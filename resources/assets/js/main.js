if (document.readyState === "complete") {
    CKEDITOR.replace('article-ckeditor');
} else {

    document.addEventListener("DOMContentLoaded", function () {
        CKEDITOR.replace('article-ckeditor');
    }, false);
}