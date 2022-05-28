//Enquiry form validation
  jQuery.validator.addMethod("alpha", function(value, element) {
    return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
    }, "Letters only please");
    
    $.validator.addMethod("pattern", function(value, element, regexpr) {
    return regexpr.test(value);
    }, "Please enter a valid number.");
    
     $("#enquiry_form").validate({
      rules:{
        name:{
        required:true,
        alpha: true,
        minlength:3,
        maxlength:20
        },
        email:{
            required:true,
            email:true
        },
        mo_number:{
            required:true,
            number: true,
            minlength:10,
            maxlength:10,
            pattern :/^[^0]\d*$/
        },
        wh_number:{
            required:true,
            number: true,
            minlength:10,
            maxlength:10,
            pattern :/^[^0]\d*$/
        },
        cl_nm:{
            required : true
        },
        country:{
            required : true
        },
        course:{
            required : true
        },
        img_url:{
            required : true
        },
        message:{
            required:true,
            maxlength:100
        }
      },
      messages:{
        name:{
            required:"Please enter your name",
            alpha:"Please enter only alphabates",
    
        },
        email:{
            required:"Please enter your email"
        },
        mo_number:{
            required :"Please enter your number",
            number:"Enter only numbers"
        },
        wh_number:{
            required :"Please enter your whatsapp number",
            number:"Enter only numbers"
        },
        country:{
            required:"Please enter your country"
        },
        course:{
            required:"Please enter your course"
        },
        cl_nm:{
            required:"Please enter your college or university"
        },
        img_url:{
            required:"Please upload assignment"
        },
        message:{
            required:"Please enter your message"
        }
      }
    });
    
    $( '#enquiry_form' ).each(function(){
    this.reset();
    });
    
    
    
    
    
    //Job opportunity form validation
    
    jQuery.validator.addMethod("alpha", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        }, "Letters only please");
        
        $.validator.addMethod("pattern", function(value, element, regexpr) {
        return regexpr.test(value);
        }, "Please enter a valid number.");
        
         $("#job_opt_form").validate({
          rules:{
            name:{
            required:true,
            alpha: true,
            minlength:3,
            maxlength:20
            },
            email:{
                required:true,
                email:true
            },
            wh_number:{
                required:true,
                number: true,
                minlength:10,
                maxlength:10,
                pattern :/^[^0]\d*$/
            },
            city:{
                required : true
            },
            cv_img:{
                required : true
            },
            smp_img:{
                required : true
            },
            qualification:{
                required:true
            },
            specialization:{
                required:true
            }
          },
          messages:{
            name:{
                required:"Please enter your name",
                alpha:"Please enter only alphabates",
        
            },
            email:{
                required:"Please enter your email"
            },
            wh_number:{
                required :"Please enter your whatsapp number",
                number:"Enter only numbers"
            },
            city:{
                required:"Please enter your city"
            },
            qualification:{
                required:"Please enter your qualification"
            },
            specialization:{
                required:"Please enter your specialization"
            },
            cv_img:{
                required:"Please upload CV"
            },
            smp_img:{
                required:"Please upload sampel paper"
            }
          }
        });
        
        $( '#job_opt_form' ).each(function(){
        this.reset();
        });