$(document).ready(function(){
    
    /*=============================================
    DISABLED VIEW SOURCE PAGE ( CTRL + U )
    =============================================*/
    // document.onkeydown = function(e) {
    //    if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {
    //        return false;
    //    } else {
    //        return true;
    //    }
    // };
    // $(document).keypress("u",function(e) {
    //   if(e.ctrlKey) {
    // return false;
    // } else {
    // return true;
    // }
    // });

    /*=============================================
    DISABLED F12, RIGHT CLICK, CTRL + SHIFT + I
    =============================================*/
    // window.oncontextmenu = function () {
    // return false;
    // }
    // $(document).keydown(function (event) {
    // if (event.keyCode == 123) {
    // return false;
    // }
    // else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
    // return false;
    // }
    // });

   

    
    
    // Mobile Navigation
    if ($('.nav-menu').length) {
        var $mobile_nav = $('.nav-menu').clone().prop({
          class: 'mobile-nav d-lg-none'
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
        $('body').append('<div class="mobile-nav-overly"></div>');

        $(document).on('click', '.mobile-nav-toggle', function(e) {
            $('body').toggleClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            $('.mobile-nav-overly').toggle();
        });

        $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
            e.preventDefault();
            $(this).next().slideToggle(300);
            $(this).parent().toggleClass('active');
        });

        $(document).click(function(e) {
            var container = $(".mobile-nav, .mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
            }
        });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
        $(".mobile-nav, .mobile-nav-toggle").hide();
    }


    /*================================================
    MONTH PRICE COUNT CODE
    ================================================*/
    $(document).on("change","select.user, select.firm", function(){
       calculatePrice();
    });

    function calculatePrice() {
        var price = $('.planPrice').data('price');
        var selectedUser = parseInt($('select.user').val());
        var selectedFirms = parseInt( $('select.firm').val() );

        var newPrice = parseInt(price) + ( (selectedUser - 1) * 100 ) + ( (selectedFirms - 1) * 100 );
        var m_net = Math.round(parseInt(newPrice) + ( (newPrice * 18) / 100)) ;

        $('.planPrice').text(newPrice);
        $('.m_netamt').text(m_net);
    }
   
   

    /*================================================
    SIX MONTH PRICE COUNT CODE
    ================================================*/
    $(document).on("change","select.userh, select.firmh", function(){
       calculatehalfPrice();
    });

    function calculatehalfPrice() {
        var priceh = $('.halfPrice').data('price');
        var selectedUserh = parseInt($('select.userh').val());
        var selectedFirmsh = parseInt( $('select.firmh').val() );

        var newPriceh = parseInt(priceh) + ( (selectedUserh - 1) * 1000 ) + ( (selectedFirmsh - 1) * 1000 );
        var lt_net = Math.round(parseInt(newPriceh) + ( (newPriceh * 18) / 100)) ;

        $('.halfPrice').text(newPriceh);
        $('.lt_netamt').text(lt_net);
    }

    /*================================================
    YEARLY PRICE COUNT CODE
    ================================================*/
    $(document).on("change","select.plan3user, select.plan3firm", function(){
       calculateyearPrice();
    });

    function calculateyearPrice() {
        var pricey = $('.yearPrice').data('price');
        var selectedUsery = parseInt($('select.plan3user').val());
        var selectedFirmsy = parseInt( $('select.plan3firm').val() );

        var newPricey = parseInt(pricey) + ( (selectedUsery - 1) * 1000 ) + ( (selectedFirmsy - 1) * 1000 );
        var y_net = Math.round(parseInt(newPricey) + ( (newPricey * 18) / 100)) ;

        $('.yearPrice').text(newPricey); 
        $('.y_netamt').text(y_net); 
    }

    /*================= JS CODE  =================*/
    // $(document).on("click","#but_screenshot", function(){
    //    screenshot();
    // });

    // function screenshot(){
    //     html2canvas(document.body,{background: '#fff'}).then(function(canvas) {
    //         // preview
    //         // document.body.appendChild(canvas);
           
    //         // Get base64URL
    //         var base64URL = canvas.toDataURL('image/jpeg').replace('image/jpeg', 'image/octet-stream');
    //         // AJAX request
    //         $.ajax({
    //             url: 'ajaxfile.php',
    //             type: 'post',
    //             data: {image: base64URL},
    //             success: function(data){
    //                alert('Upload successfully');
    //             }
    //         });
    //     });  
    // }

  /*================= JS CODE END   =================*/  

    


    // contact  page extra css
    $('.contactForm').validate({
        rules: {
           name: {
                required: true,
                lettersonly: true,
            },

            email: {
                required: true,
                email: true,
                noSpace:true,     
            },

            phone: {
                required: true,
                number: true,               
                minlength: 10,
                noSpace:true,  
            },

           message: {
                required: true,
            },
            
        },

        submitHandler: function(){
            var contactForm = $('.contactForm').serialize();

            $.ajax({
                url: "contact_mail.php",
                method: "POST",
                data: contactForm,
                beforeSend: function(){  
                    $('.contact_loader').show();
                    $('.contact_send').attr("disabled", true);
                },
                success: function(){
                    $('form').trigger("reset");
                    $('.contact_result').show();
                    setTimeout(function(){  
                        $('.contact_result').hide();  
                    }, 5000);
                },
                complete:function(data){
                    $('.contact_loader').hide();
                    $('.contact_send').attr("disabled", false);
                }
            });
        }
    });


    $('.demoForm').validate({
        rules: {
           name: {
                required:true,
                lettersonly:true,               
            },

            email: {
                required:true,
                email:true, 
                noSpace:true,  
            },

            phone: {
                required: true,
                number: true,               
                minlength: 10,
                noSpace: true,
            },

            product:
            {
                required: true,
                noSpace:true,
            },

            cname: {
                required: true,
                noSpace:true,                
            },

            time: {
                required: true,
                noSpace:true,              
            },
            
        },

        submitHandler: function(){
            var demoForm = $('.demoForm').serialize();

            $.ajax({
                url: "demo_mail.php",
                method: "POST",
                data: demoForm,
                beforeSend: function(){  
                    $('.demo_loader').show();
                    $('.demo_send').attr("disabled", true);
                },
                success: function(){
                    $('form').trigger("reset");
                    $('.demo_result').show();
                    setTimeout(function(){  
                        $('.demo_result').hide();  
                    }, 5000);
                },
                complete:function(data){
                    $('.demo_loader').hide();
                    $('.demo_send').attr("disabled", false);
                }
            });
        }
    });

    $('.login_form').validate({
        rules: {   

            user_cid: {
                required: true,               
                minlength: 10,
            },        

        },
     
    });

    $('.regiForm').validate({
        rules: {
            uname: {
                required: true,
                lettersonly: true,  
            },

            uemail: {
                required: true,
                email: true,
            },

            unumber: {
                required: true,
                number: true,
                minlength: 10,
            },

            uaddress: {
                required: true,               
            },

            ucity: {
                required: true,
                lettersonly: true,
            },
            ustd: {
                required: true,
                number: true,
            },

            uproj: 
            {
                required: true,               
            },

            uproj_plan: 
            {
                required: true,               
            },

            user_cust: 
            {
                required: true,               
            },

            user_firm: 
            {
                required: true,               
            },  

            uref: 
            {
                required: true,               
            }, 
            ugst: 
            {
                required: true,
                capsnum : true,               
            },                     
        },
        messages: {
            uemail: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address.",
            },                      
        },

        submitHandler: function(){           
            var regiForm = $('.regiForm').serialize();         

            $.ajax({                
                url: "registerCode.php",
                method: "POST",
                data: regiForm,
                beforeSend: function(){  
                    $('.reg_loader').show();
                    $('.reg_send').attr("disabled", true);
                },
                success: function(data){
                    if( data ){
                        var registerResult = JSON.parse(data);
                        if( registerResult.error == '0' ){                            
                            $('.reg_loader').hide();
                            $('.alert-success').html(registerResult.message).fadeIn().show();
                            $('form').trigger("reset");
                            $('.reg_send').attr("disabled", false);
                            setTimeout(function(){
                                $('.alert-success').fadeOut('slow');
                            }, 5000);
                        } else {                           
                            $('.reg_loader').hide();
                            $('.alert-danger').html(registerResult.message).fadeIn().show();                           
                            $('.reg_send').attr("disabled", false);
                            setTimeout(function(){
                                $('.alert-danger').fadeOut('slow');
                            }, 5000);
                        }
                    }
                },                
            });
        }
    });

/*================================================
    RESELLER REGISTRATION  FORM CODE
    ================================================*/

    $('.resellForm').validate({
        rules: {
            rname: {
                required: true,
                lettersonly: true,  
            },
            remail: {
                required: true,
                email: true,
            },
            rnumber: {
                required: true,
                number: true,
                minlength: 10,
            },
            rcity: {
                required: true,
                lettersonly: true,
            },                 
                 
        },
        
        submitHandler: function(){           
            var resellForm = $('.resellForm').serialize();         

            $.ajax({                
                url: "reseller_regcode.php",
                method: "POST",
                data: resellForm,
                beforeSend: function(){  
                    $('.resell_loader').show();
                    $('.resell_send').attr("disabled", true);
                },
                success: function(data){
                    if( data ){
                        var resellerResult = JSON.parse(data);
                        if( resellerResult.error == '0' ){                            
                            $('.resell_loader').hide();
                            $('.alert-success').html(resellerResult.message).fadeIn().show();
                            $('form').trigger("reset");
                            $('.resell_send').attr("disabled", false);
                            setTimeout(function(){
                                $('.alert-success').fadeOut('slow');
                            }, 5000);
                        } else {                           
                            $('.resell_loader').hide();
                            $('.alert-danger').html(resellerResult.message).fadeIn().show();                           
                            $('.resell_send').attr("disabled", false);
                            setTimeout(function(){
                                $('.alert-danger').fadeOut('slow');
                            }, 5000);
                        }
                    }
                },                
            });
        }
    });

    

    /*================================================
    CAREER FORM CODE
    ================================================*/
    var currentForm = $('#jobApplyForm');
    currentForm.validate({

        rules: {
           name: {
                required: true,
                lettersonly: true,

            },

            email: {
                required: true,
                email: true,   
            },

            phone: {
                required: true,
                number: true,               
                minlength: 10,
            },

            position: {
                required: true,
            },

            experience:
            {
                required: true,
            },

            filename: 
            {
                required: true,
                extension: "docx|doc|pdf",
            },
        },
        submitHandler:function(){
            var careerForm = new FormData(currentForm[0]);
            $.ajax({
                async: true,
                processData: false,
                contentType: false,
                url: "careerCode.php",
                method: "POST",
                data: careerForm,
                beforeSend: function(){  
                    $('.formLoader').show();
                    $('.btnSend').attr("disabled", true);
                },
                success: function(data){
                    if( data ){
                        var careerResult = JSON.parse(data);
                        if( careerResult.error == '0' ){
                            $('.formLoader').hide();
                            $('.alert-success').html(careerResult.message).fadeIn().show();
                            $('form').trigger("reset");
                            $('.btnSend').attr("disabled", false);
                            setTimeout(function(){
                                $('.alert-success').fadeOut('slow');
                            }, 5000);
                        } else {
                            $('.formLoader').hide();
                            $('.alert-danger').html(careerResult.message).fadeIn().show();
                            $('form').trigger("reset");
                            $('.btnSend').attr("disabled", false);
                            setTimeout(function(){
                                $('.alert-danger').fadeOut('slow');
                            }, 5000);
                        }
                    }
                }
            });
        }

    });    

    $.validator.addMethod("lettersonly",
        function(value, element) {
            return /^[a-z," "]+$/i.test(value);
        }, "Please enter only letters"
    );

    $.validator.addMethod('capsnum', function(value) {
    return value.match(/^[A-Z0-9]+$/);
    }, 'Please enter capital letters and number');


    $.validator.addMethod("noSpace", function(value, element) { 
    return value.indexOf(" ") < 0 && value != ""; 
    }, "No space please and don't leave it empty");
    

     /*=============================================
    Hide Show Payment Reference Div
    =============================================*/

    // $("#rtype").change(function () 
    // {
    //     if ($("#rtype").val() == "Paid Registration") 
    //     {
    //         $("#ifYes").show();
    //     }
    //     else 
    //     {
    //         $("#ifYes").hide();
    //     }
    // });
    
    
    /*================================================
    YOUTUBE VIDEO CODE
    ================================================*/
    $("a.demo").YouTubePopUp({
        autoplay: 1
    });

    
});


    


    

    


    



    


// });
// end


