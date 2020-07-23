function elFinderBrowser (callback, value, meta)
{
  tinymce.activeEditor.windowManager.open({
    file: '/elfinder/manager/?filter=image&tinymce',// use an absolute path!
    title: 'File manager',
    width: 900,
    height: 450,
    resizable: 'yes'
  },
   {
     oninsert: function (file, elf)
     {
       var url, reg, info;

       // URL normalization
       url = file.url;
       reg = /\/[^/]+?\/\.\.\//;
       while(url.match(reg)) {
         url = url.replace(reg, '/');
       }
       // Make file info
       info = file.name + ' (' + elf.formatSize(file.size) + ')';

       // Provide file and text for the link dialog
       if (meta.filetype == 'file') {
         callback(url, {text: info, title: info});
       }

       // Provide image and alt text for the image dialog
       if (meta.filetype == 'image') {
         callback(url, {alt: info});
       }

       // Provide alternative source and posted for the media dialog
       if (meta.filetype == 'media') {
         callback(url);
       }
     }
   });
  return false;
}


function tinymceCreate(selector)
{
    tinymce.init({
      selector: selector,
      language: 'en',
      entity_encoding : 'raw',
      height: 400,
      theme: 'modern',
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'code | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      relative_urls : false,
      remove_script_host : false,
      convert_urls : true,
      file_picker_callback : elFinderBrowser,
      force_br_newlines : false,
      force_p_newlines : false,
      forced_root_block : 'p',
      fix_list_elements: false,
      extended_valid_elements: '*[*]',
      valid_elements : '*[*]',
    });

}