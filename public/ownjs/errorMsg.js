
function validateRequired(value,name)
{
  if(value != '')
  {
    return {
    'success' : true,
    'message' : '',
    };
  }
  else
  {
    return {
    'success' : false,
    'message' : name+' is Required',
    };
  }
}

//books
$('#version').change(function()
{
  var val=validateRequired($(this).val(),'Version Name');
  if(val.success == false)
  {
      $('#version_hide').val(0);
    $('.errorversion').html('<font color="red" size="2">'+val.message+'</font>');
  }
  else
  {
      $('#version_hide').val(1);
    $('.errorversion').html('');
  }
});
$('#vers_content').change(function()
{
  var val=validateRequired($(this).val(),'Vers Content');
  if(val.success == false)
  {
      $('#vers_content_hide').val(0);
    $('.errorversion').html('<font color="red" size="2">'+val.message+'</font>');
  }
  else
  {
      $('#vers_content_hide').val(1);
    $('.errorversion').html('');
  }
});
$('#book_name').change(function()
{
  var val=validateRequired($(this).val(),'Book Name');
  if(val.success == false)
  {
      $('#book_name_hide').val(0);
    $('.error_book_name').html('<font color="red" size="2">'+val.message+'</font>');
  }
  else
  {
      $('#book_name_hide').val(1);
    $('.error_book_name').html('');
  }
});
$('#chapter_name').keyup(function()
{
  var val=validateRequired($(this).val(),'Chapter Name');
  if(val.success == false)
  {
      $('#chapter_name_hide').val(0);
    $('.error_chapter_name').html('<font color="red" size="2">'+val.message+'</font>');
  }
  else
  {
      $('#chapter_name_hide').val(1);
    $('.error_chapter_name').html('');
  }
});
$('#book_title').keyup(function()
{
  var val=validateRequired($(this).val(),'Book Title');
  if(val.success == false)
  {
      $('#book_title_hide').val(0);
    $('.errorbooktitle').html('<font color="red" size="2">'+val.message+'</font>');
  }
  else
  {
      $('#book_title_hide').val(1);
    $('.errorbooktitle').html('');
  }
});
$('#book_short_title').keyup(function()
{
  var val=validateRequired($(this).val(),'Book Short Title');
  if(val.success == false)
  {
      $('#book_short_title_hide').val(0);
    $('.errorbookshorttitle').html('<font color="red" size="2">'+val.message+'</font>');
  }
  else
  {
      $('#book_short_title_hide').val(1);
    $('.errorbookshorttitle').html('');
  }
});
//versions
$('#version_num').keyup(function()
  {
    var val=validateRequired($(this).val(),'Version Number');
    if(val.success == false)
    {
        $('#version_num_hide').val(0);
      $('.errorversionnum').html('<font color="red" size="2">'+val.message+'</font>');
    }
    else
    {
        $('#version_num_hide').val(1);
      $('.errorversionnum').html('');
    }
  });
$('#version_name').keyup(function()
  {
    var val=validateRequired($(this).val(),'Version Name');
    if(val.success == false)
    {
        $('#version_name_hide').val(0);
      $('.errorversionname').html('<font color="red" size="2">'+val.message+'</font>');
    }
    else
    {
        $('#version_name_hide').val(1);
      $('.errorversionname').html('');
    }
  });
  $('#status').change(function()
  {
    var val=validateRequired($(this).val(),'Status');
    if(val.success == false)
    {
        $('#status_hide').val(0);
      $('.errorstatus').html('<font color="red" size="2">'+val.message+'</font>');
    }
    else
    {
        $('#status_hide').val(1);
      $('.errorstatus').html('');
    }
  });
  $('#meta_keyword').keyup(function()
  {
    var val=validateRequired($(this).val(),'Meta Keywords');
    if(val.success == false)
    {
        $('#meta_keyword_hide').val(0);
      $('.errormetakeyword').html('<font color="red" size="2">'+val.message+'</font>');
    }
    else
    {
        $('#meta_keyword_hide').val(1);
      $('.errormetakeyword').html('');
    }
  });
  $('#meta_description').keyup(function()
  {
    var val=validateRequired($(this).val(),'Meta Description');
    if(val.success == false)
    {
        $('#meta_description_hide').val(0);
      $('.errormetadescription').html('<font color="red" size="2">'+val.message+'</font>');
    }
    else
    {
        $('#meta_description_hide').val(1);
      $('.errormetadescription').html('');
    }
  });
  $('.addchapters').click(function()
  {
    if($('#version_hide').val() == 1 && $('#book_name_hide').val() == 1 && $('#status_hide').val() && $('#meta_keyword_hide').val() == 1 && $('#meta_description_hide').val() == 1 && $('#chapter_name_hide').val() == 1)
    {
      $('#addchaptersform').submit();
    }
  });
    
  $('.addbooks').click(function()
  {
    if($('#version_hide').val() == 1 && $('#book_title_hide').val() == 1 && $('#book_short_title_hide').val() && $('#meta_keyword_hide').val() == 1 && $('#meta_description_hide').val() == 1)
    {
      $('#addversionform').submit();
    }
  });
  $('.addversion').click(function()
  {
   
    if($('#version_name_hide').val() == 1 && $('#status_hide').val() == 1 && $('#status_hide').val() == 1 && $('#meta_description_hide').val() == 1)
    {
        $('#addversionform').submit();
    }
 
  });
  if($('#version_name').val() != '')
  {
    $('#version_name_hide').val(1);
  }
  else
  {
    $('#version_name_hide').val(0);
  }
  if($('#version_num').val() != '')
  {
    $('#version_num_hide').val(1);
  }
  else
  {
    $('#version_num_hide').val(0);
  }
  if($('#status').val() != '')
  {
    $('#status_hide').val(1);
  }
  else
  {
    $('#status_hide').val(0);
  }
  if($('#meta_keyword').val() != '')
  {
    $('#meta_keyword_hide').val(1);
  }
  else
  {
    $('#meta_keyword_hide').val(0);
  }
  if($('#meta_description').val() != '')
  {
    $('#meta_description_hide').val(1);
  }
  else
  {
    $('#meta_description_hide').val(0);
  }
  if($('#chapter_name').val() != '')
  {
    $('#chapter_name_hide').val(1);
  }
  else
  {
    $('#chapter_name_hide').val(0);
  }


  if($('#version').val() != '')
  {
    $('#version_hide').val(1);
  }
  else
  {
    $('#version_hide').val(0);
  }
  if($('#vers_content').val() != '')
  {
    $('#vers_content_hide').val(1);
  }
  else
  {
    $('#vers_content_hide').val(0);
  }
  if($('#book_title').val() != '')
  {
    $('#book_title_hide').val(1);
  }
  else
  {
    $('#book_title_hide').val(0);
  }
  if($('#book_short_title').val() != '')
  {
    $('#book_short_title_hide').val(1);
  }
  else
  {
    $('#book_short_title_hide').val(0);
  }
  if($('#meta_keyword').val() != '')
  {
    $('#meta_keyword_hide').val(1);
  }
  else
  {
    $('#meta_keyword_hide').val(0);
  }
  if($('#meta_description').val() != '')
  {
    $('#meta_description_hide').val(1);
  }
  else
  {
    $('#meta_description_hide').val(0);
  }
  if($('#book_name').val() != '')
  {
    $('#book_name_hide').val(1);
  }
  else
  {
    $('#book_name_hide').val(0);
  }
  $('.editchapters').click(function()
  {
    if($('#version_hide').val() == 1 && $('#book_name_hide').val() == 1 && $('#status_hide').val() == 1 && $('#chapter_name_hide').val() == 1 && $('#meta_keyword_hide').val() == 1 && $('#meta_description_hide').val() == 1)
    {
      $('#updatechaptersform').submit();
    }
  });
  $('.addrecords').click(function()
  {
    if($('#version_hide').val() == 1 && $('#book_name_hide').val() == 1 && $('#status_hide').val() == 1 && $('#chapter_name_hide').val() == 1 && $('#meta_keyword_hide').val() == 1 && $('#meta_description_hide').val() == 1 && $('#vers_content_hide').val() == 1)
    {
      $('#addrecordsform').submit();
    }
  });