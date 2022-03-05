  $('.custom-file-input').on('change', function(e) {
      console.log($(this));
      $(this).next().text($(this).val());
  });