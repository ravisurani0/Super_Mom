function loadPreview(input){
    var data = $(input)[0].files; //this file data
    $.each(data, function(index, file){
        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
            var fRead = new FileReader();
            fRead.onload = (function(file){
                return function(e) {
                    var html = "";
                     html += "<div class='col-md-2'>";
                    html += "<img src='"+ e.target.result +"' class='thumb'>"; //create image thumb element
                    html += '</div>'
                    html += "<div class='col-md-2'>";
                     html += '<label> Sort Order</label>';
                     html += '<input class="form-control" type="text" name="imageOrder[]">';
                     html += '</div>';
                    //  html += '</div>';

                    $('#thumb-output').append(html);
                };
            })(file);
            fRead.readAsDataURL(file);
        }
    });
}
function singleImageloadPreview(input){
    var data = $(input)[0].files; //this file data
    $.each(data, function(index, file){
        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
            var fRead = new FileReader();
            fRead.onload = (function(file){
                return function(e) {
                    var html = "";
                        html += "<div class='col-md-2'>";
                        html += "<img src='"+ e.target.result +"' class='thumb'>"; //create image thumb element
                        html += "</div>"
                        html += "</div>";
                    $('#single-image-output').html(html);
                };
            })(file);
            fRead.readAsDataURL(file);
        }
    });
}

function changeFieldType(){
    $('body').on('change', '#field_type', function() {
        let fieldType = $('#field_type').val();
                switch (fieldType) {
                    case 'text':
                        $('#cms_text').show();
                        $('#multiple_image').hide();
                        $('#video').hide();
                        $('#image').hide();
                        $('#video').val(null);
                        $('#multipleimage').val(null);
                        break;
                    case 'image':
                        $('#image').show();
                        $('#multiple_image').hide();
                        $('#video').hide();
                        $('#cms_text').hide();
                        $('#video').val(null);
                        $('#multipleimage').val(null);
                        $('#thumb-output').html('');
                        break;
                    case 'video':
                        $('#video').show();
                        $('#multiple_image').hide();
                        $('#image').hide();
                        $('#cms_text').hide();
                        $('#imagefile').val(null);
                        $('#multipleimage').val(null);
                        $('#thumb-output').html('');
                        break;
                    case 'multiple_image':
                        $('#multiple_image').show();
                        $('#video').hide();
                        $('#image').hide();
                        $('#cms_text').hide();
                        $('#imagefile').val(null);
                        $('#video').val(null);
                        break;
                    default:

        }

    });
}
$(document).on("change", "#video", function(evt) {
    $("#video_Preview").show();
    var $source = $('#video_show');
    $source[0].src = URL.createObjectURL(this.files[0]);
    $source.parent()[0].load();
  });
