$(document).ready(function() {
    $('.summernote').summernote({
        height: 100, // Высота редактора
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol']],
            ['insert', ['link']],
        ],
    });
});