// TinyMCE init
tinymce.init({
   selector: 'textarea#tiny'
});
// Prevent Bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
   if ($(e.target).closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
      e.stopImmediatePropagation();
   }
});
