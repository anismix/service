
$(document).ready(function(){

	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();

	$('select').select2();
	// Form Validation
   /** $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},

		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});*/
	// Form Validation
 /**   $("#add_category").validate({
		rules:{
			name:{
				required:true
			},
			description:{
				required:true,

			},

		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
*/
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#password_validate").validate({
		rules:{
			pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			pwd2:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
    });
    $(".delete-category").click(function(){
    var id= $(this).attr('rel');
    var deleteFunction = $(this).attr('rel1');
    swal({
        title: "Are you sure?",
        text: "Your will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",

      },
      function(){
          window.location.href="/admin/"+deleteFunction+"/"+id;
      });
    });
    $(".deleCu").click(function(){
        var id= $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",

          },
          function(){
              window.location.href="/user/"+deleteFunction+"/"+id;
          });
        });
    $(".delete-post").click(function(){
        var id= $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",

          },
          function(){
              window.location.href="/admin/"+deleteFunction+"/"+id;
          });
        });

        $(".delete-user").click(function(){
            var id= $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
              },
              function(){
                  window.location.href="/admin/"+deleteFunction+"/"+id;
              });
            });
    $(".delete-service").click(function(){
        var id= $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",

          },
          function(){
              window.location.href="/admin/"+deleteFunction+"/"+id;
          });
        });
});
