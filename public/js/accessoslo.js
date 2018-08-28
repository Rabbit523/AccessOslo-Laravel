var API, Controllers = {}, Services = {};

API = function () {
  var request = function (type, endpoint, data, callback, rootUrl) {
    var url = (rootUrl !== undefined) ? rootUrl + endpoint : config.server + endpoint;
    $.ajax({
        type: type,
        url: url,
        data: data,
        beforeSend: function (request) {
            request.setRequestHeader("X-CSRF-TOKEN", config.token);
        },
        complete: function (data) {
            callback(JSON.parse(data.responseText));
        }
    });
  }

  var users = function (action, endpoint, data, callback, rootUrl) {
    var url = "users/" + endpoint;
    request(action, url, data, callback, rootUrl);
  };
  var services = function (action, endpoint, data, callback, rootUrl) {
    var url = "services/" + endpoint;
    request(action, url, data, callback, rootUrl);
  };
  var charters = function (action, endpoint, data, callback, rootUrl) {
    var url = "charters/" + endpoint;
    request(action, url, data, callback, rootUrl);
  };
  var stores = function (action, endpoint, data, callback, rootUrl) {
    var url = "stores/" + endpoint;
    request(action, url, data, callback, rootUrl);
  };
  return {
    login: function (email, password, callback) {        
        users("POST", "authenticate", { email: email, password: password }, callback, "/");
    },
    register: function (data, callback) {        
        users("POST", "register", data, callback, "/");
    },
    requestSms: function (phone, callback) {    
        users("POST", "request-sms", phone, callback, "/");
    },
    contact_mail: function (data, callback) {    
        users("POST", "contact-mail", data, callback, "/");
    },
    createUser: function (data, callback) {    
        users("POST", "create", data, callback, "/");
    },
    findUser: function (data, callback) {    
        users("POST", "find", data, callback, "/");
    },
    changePassword: function (data, callback) {    
        users("POST", "password-change", data, callback, "/");
    },
    getCustomer: function (data, callback) {    
        users("POST", "get-customer", data, callback, "/");
    },
    getCustomerProfile: function (data, callback) {    
        users("POST", "get-customerprofile", data, callback, "/");
    },
    verifyCode: function (verify_code, callback) {    
        users("POST", "verify-code", verify_code, callback, "/");
    },
    DeleteLimousine: function (data, callback) {        
        services("POST", "delete-limousine", data, callback, "/");
    },
    DeleteHandling: function (data, callback) {        
        charters("POST", "delete-handling", data, callback, "/");
    },
    DeleteCharters: function (data, callback) {        
        charters("POST", "delete-charters", data, callback, "/");
    },
    add_profile: function (data, callback) {    
        users("POST", "add-profile", data, callback, "/");
    }, 
    update_profile: function (data, callback) {    
        users("POST", "update-profile", data, callback, "/");
    },   
    giveBonus: function (data, callback) {    
        users("POST", "give-bonus", data, callback, "/");
    },   
    createPartner: function (user, callback) {    
        users("POST", "new-partner", user, callback, "/");
    },
    newEmptyLeg: function (data, callback) {    
        charters("POST", "create-emptyleg", data, callback, "/");
    },
    saveEmptyLeg: function (data, callback) {    
        charters("POST", "update-emptyleg", data, callback, "/");
    },
    deleteEmptyLeg: function (id, callback) {    
        charters("POST", "delete-emptyleg", id, callback, "/");
    },
    emptybooking: function (data, callback) {
        charters("POST", "booking-emptyleg", data, callback, "/");
    },
    DeleteMeet: function (data, callback) {
        services('POST', 'delete-meet', data, callback, '/')
    },
    GetBadgeStatus: function (data, callback) {    
        charters("POST", "badge-status", data, callback, "/");
    }, 
    SetBadgeStatus: function (data, callback) {    
        charters("POST", "badge-set", data, callback, "/");
    }, 
    getMemberNotice: function (data, callback) {    
        charters("POST", "get-notice", data, callback, "/");
    }, 
    setMemberNotice: function (data, callback) {    
        charters("POST", "set-notice", data, callback, "/");
    }, 
    deletePosts: function (data, callback) {    
        stores("POST", "delete-post", data, callback, "/");
    },
    deletePage: function (data, callback) {    
        stores("POST", "delete-page", data, callback, "/");
    },
    saveQuestions: function (data, callback) {    
        stores("POST", "security-question", data, callback, "/");
    },
    SavePassenger: function (data, callback) {    
        users("POST", "save-passenger", data, callback, "/");
    },
    SaveCharters: function (data, callback) {    
        charters("POST", "save-charters", data, callback, "/");
    },
    SendCharters: function (data, callback) {    
        charters("POST", "send-charters", data, callback, "/");
    },
    GetCharters: function (data, callback) {    
        charters("POST", "get-charters", data, callback, "/");
    },
    createCharter: function (data, callback) {    
        charters("POST", "create", data, callback, "/");
    },
    saveReview: function (data, callback) {    
        charters("POST", "save-review", data, callback, "/");
    },
    getReview: function (data, callback) {    
        charters("POST", "get-review", data, callback, "/");
    },
    getPartnerReview: function (data, callback) {    
        charters("POST", "get-partner-review", data, callback, "/");
    },
    updateReview: function (data, callback) {    
        charters("POST", "update-review", data, callback, "/");
    },
    createAircraft: function (data, callback) {    
        stores("POST", "create-aircraft", data, callback, "/");
    }, 
    updateAircraft: function (data, callback) {    
        stores("POST", "update-aircraft", data, callback, "/");
    }, 
    deleteAircraft: function (url, callback) {    
        stores("POST", "delete-aircraft", url, callback, "/");
    },
    getAircraftImage: function (data, callback) {    
        stores("POST", "get-aircraft-image", data, callback, "/");
    },
    limousine_booking: function (data, callback) {
        services("POST", "limousine-booking", data, callback, "/");
    },
    meet_book: function (data, callback) {
        services("POST", "meet-booking", data, callback, "/");
    },
    SaveExtraBonus: function (data, callback) {
        services("POST", "extra-bonus", data, callback, "/");
    },
    CheckBonus: function (data, callback) {
        users("POST", "check-bonus", data, callback, "/");
    }
  };
};

Controllers.Login = function () {    
  $("#password").keyup(function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {        
        $("#login-button").click();
    }
  });
  var onLoginComplete = function (response) {         
      if (response.success) {
          var user = response.data.user;         
          if (user.role_id == 2) {
            setTimeout(function () { window.location = "/member/dashboard" }, 1000);            
          } else if (user.role_id == 1) {
            setTimeout(function () { window.location = "/admin/executive-charter" }, 1000);
          } else if(user.role_id == 0){
            setTimeout(function () { window.location = response.data.redirect }, 1000);
          }          
      } else {                    
          alert("Validate is failed! Please check your email and password again!");       
      }
  };
  var login = function (e) {
    e.preventDefault();  
      if (redirect == "no redirect") {
        if ($('#login-form').valid()) {           
            Accessoslo.API.login($("#email").val(), $("#password").val(), onLoginComplete);
        }  
      } else {
        if (redirect == "executive") {
            window.location = "/air-charter/executive-charter";
          } else if (redirect == "group") {
            window.location = "/air-charter/group-charter";  
          } else if (redirect == "helicopter") {
            window.location = "/air-charter/helicopter";
          }
      }
  };
  var init = function () {
    $('#login-form').validate({             
        errorPlacement: function () { },
        errorClass: "label",
        highlight: function (element, errorClass, validClass) {
            $(element).parent().addClass("error");
            $(element).parent().removeClass("success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent().removeClass("error");
            $(element).parent().addClass("success");
        }
    });
    $("#login-button").click(login);
  };
  init();
};

Controllers.SignUp = function () {
    let code = "";
    $("#agree").click( function(){
        if( $(this).is(':checked') ) {            
            $(".agree_check").attr('style', 'border:none;');
        } else {
            $(".agree_check").attr('style', 'border:1px solid red;');
        }
     });
    var OnContinue = function (e) {
        e.preventDefault();
        if ($('#agree').is(":checked")) {            
            if($("#step1_form").valid()) {
                $(".step-1").hide(); $(".step-2").show();
            }
        } else {
            $(".agree_check").attr('style', 'border:1px solid red;');
        }
        
    };
    var onRegisterComplete = function (response) {
        if (response.data == "error") {
            alert("User is already exist!");
        } else {
            $(".step-2").hide(); $(".step-3").show();
        }
    };
    var OnRegister = function (e) {
        e.preventDefault();
        if($("#step2_form").valid()) {
            if($("#password").val() == $("#retype_password").val()) {
                if ($("#phone").intlTelInput("isValidNumber")) {
                    var send_user = {
                        gender: $("#gender").val(),
                        first_name: $("#first_name").val(),
                        last_name: $("#last_name").val(),
                        country: $("#country").val(),
                        city: $("#city").val(),
                        email: $("#email").val(),
                        phone: $("#phone").intlTelInput("getNumber"),
                        password: $("#password").val()
                    };
                    $("#hidden_email").val(send_user.email);
                    $("#hidden_pwd").val(send_user.password);
                    Accessoslo.API.register(send_user, onRegisterComplete);                   
                } else {
                    alert("Invalid Phonenumber!");
                }               
            } 
            else {
                alert("Please enter your password again!");
            }                          
        }
    };
    var onRequestComplete = function (response) { code = response.data; };
    var OnRequest = function () {
        if ($("#step3_form").valid()) {
            if ($("#mobile-number").intlTelInput('isValidNumber')) {
                var sms = {
                    email: $('#email').val(),
                    phone: $('#mobile-number').intlTelInput('getNumber')
                };                                                         
                Accessoslo.API.requestSms(sms, onRequestComplete);
                $(".step-3").hide();$(".step-4").show();
            }                    
        } 
        $("#send_phonenumber").html($('#mobile-number').intlTelInput('getNumber'));
    };    
    var OnVerifyComplete = function (response) {};
    $(".code").keyup(function () {
        if (this.value.length == this.maxLength) {
          $(this).next('.code').focus();
        }
    });
    var OnVerify = function () {        
        var verify_Code = {
            first: $("#first").val(),
            second: $("#second").val(),
            third: $("#third").val(),
            fourth: $("#fourth").val(),
            fifth: $("#fifth").val(),
            sixth: $("#sixth").val(),
        };
        if ($("#step4_form").valid()) {       
            var cast = code.toString().split('');   
            if ((cast[0] == verify_Code.first) && (cast[1] == verify_Code.second) && (cast[2] == verify_Code.third) && (cast[3] == verify_Code.fourth)) {
                if ((cast[4] == verify_Code.fifth) && (cast[5] == verify_Code.sixth)) {
                    var data = {
                        email: $('#email').val(),
                        code: code
                    };                    
                    Accessoslo.API.verifyCode(data, OnVerifyComplete);
                    $(".step-4").hide();$(".step-5").show();
                }
            } else {
                alert("SMS Verification Failed! Please check again!");
            }           
        } else {
            alert("Input validation failed.");
        }        
    };
    var OnReSms = function () {
        $(".step-3").show();$(".step-4").hide();
    };
    var init = function () {
        $("#continue").click(OnContinue);
        $("#register").click(OnRegister);
        $("#request_sms").click(OnRequest);
        $("#verify").click(OnVerify);       
        $("#reSMS").click(OnReSms); 
        $("#mobile-number").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });
        $("#phone").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });
        $("#step1_form").validate({
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
        $("#step2_form").validate({
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
    };
    init();
};

Controllers.Home = function () {    
    var charter_flight = {};
    var book_transport = {};
    var emptyleg = {};
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&date="+date+"&departure="+departure+"&destination="+destination;        
        $(value).attr('href',href);
    });
    var createCharterComplete = function (response) {window.location = "/";};
    var createComplete = function (response) {};
    var findComplete = function (response) {        
        $(".charter-modal").modal("hide");
        if (response.data == "error") {      
            var send_user = {
                gender: $("#gender").val(),
                first_name: $("#first_name").val(),
                last_name: $("#last_name").val(),
                email: charter_flight.email,
                phone: charter_flight.phone 
            };            
            charter_flight.flight_type = "One Way";         
            var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });               
            Accessoslo.API.createUser(send_user, createComplete);            
            Accessoslo.API.createCharter(charter_flight, createCharterComplete);                 
        } else if (response.data == "success") {
            charter_flight.flight_type = "One Way";
            var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });            
            Accessoslo.API.createCharter(charter_flight, createCharterComplete);                 
        }      
    };
    var Confirm = function (e) {
        e.preventDefault(); 
        if ($('#charter_modal_form').validate()) {
            if ($("#charter_tel").intlTelInput('isValidNumber')) {
                charter_flight.contact_person = $("#first_name").val() + $("#last_name").val();
                charter_flight.company = $("#company").val();
                charter_flight.phone = $("#charter_tel").intlTelInput('getNumber');
                charter_flight.email = $("#email").val();                                         
                Accessoslo.API.findUser(charter_flight, findComplete);  
            }        
        }        
    };
    var BookProceed = function (e) {
        e.preventDefault();
        if ($("#flight_form").valid()) {            
            charter_flight.booking_type = $("#booking_type").val();
            charter_flight.departure = $("#flight_departure").val();
            charter_flight.destination =  $("#flight_destination").val();
            charter_flight.date = $("#flight_time").val();
            charter_flight.travellers = $("#flight_passengers").val();                              
            $(".charter-modal").modal("show");
        }         
    };   
    var TrnasportProceed = function (e) {
        e.preventDefault();        
        if ($("#transport_form").valid()) {           
            book_transport.from_address = $("#transport_departure").val();
            book_transport.to_address = $("#transport_destination").val();
            book_transport.type_flight = $("#transport_service").val();
            book_transport.type_car = $("#type_car").val();
            book_transport.date = $("#transport_date").val(); 
            $(".limousine-modal").modal("show"); 
        } 
       
    };
    var Book = function (e) {
        e.preventDefault();
        if($('#limousine_modal_form').validate()) {
            if ($("#limousine_tel").intlTelInput('isValidNumber')) {
                book_transport.contact_person = $("#contact_person").val();            
                book_transport.company = $("#limousine_company").val();
                book_transport.email = $("#limousine_email").val();
                book_transport.phone = $("#limousine_tel").intlTelInput('getNumber'); 
                book_transport.comments = $("#comments").val();         
                Accessoslo.API.findUser(book_transport, findUserComplete);      
            } 
        }
    };
    var findUserComplete = function (response ) {
        $(".limousine-modal").modal("hide");
        if (response.data == "error") {      
            var full_name = book_transport.contact_person;            
            var send_user = {
                "first_name": full_name.split(' ')[0],
                "last_name": full_name.split(' ')[1],
                "email": book_transport.email,
                "phone": book_transport.phone
            };        
            var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });            
            Accessoslo.API.createUser(send_user, createUserComplete);     
            Accessoslo.API.limousine_booking(book_transport, bookingComplete);                       
        } else if (response.data == "success") {
            var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });
            Accessoslo.API.limousine_booking(book_transport, bookingComplete);         
        }      
    };
    var createUserComplete = function (response) {};
    var bookingComplete = function (response) { setTimeout(function () { window.location = "/member/dashboard";}, 0);};
    var EmptylegSearch= function (e) {
        e.preventDefault();       
        if ($("#emptyleg_form").valid()) {                      
            setTimeout(function () { window.location.href= "/emptyleg-search-result?date="+$("#emptyleg_date").val()+"&departure="+$("#emptyleg_departure").val()+"&destination="+$("#emptyleg_destination").val()}, 100);    
        } 
    };
    var flight_details = function(e) {
        var data = $(this).data('source');
        emptyleg = data;
        $("#paypal_amount").val(emptyleg.price);
        $("#from_airport_modal").html(data.departure);
        $("#to_airport_modal").html(data.destination);        
        if(data.currency == "GBP") {
            $("#price_modal").html("£" + data.price);
        } else if (data.currency == "EUR") {
            $("#price_modal").html("€" + data.price);
        } else if (data.currency == "CNY" || data.currency == "JPY") {
            $("#price_modal").html("¥" + data.price);
        } else if (data.currency == "NOK" || data.currency == "DKK") {
            $("#price_modal").html("Kr" + data.price);
        } else {
            $("#price_modal").html("$" + data.price);
        }
        var string = data.end_date.split("/");
        var month = "";
        if (string[0] == "01") {month = "January";} if (string[0] == "07") {month = "July";}
        if (string[0] == "02") {month = "Feburary";} if (string[0] == "08") {month = "August";}
        if (string[0] == "03") {month = "March";} if (string[0] == "09") {month = "September";}
        if (string[0] == "04") {month = "April";} if (string[0] == "10") {month = "October";}
        if (string[0] == "05") {month = "May";} if (string[0] == "11") {month = "November";}
        if (string[0] == "06") {month = "June";} if (string[0] == "12") {month = "December";}
        $("#status_modal").html("Available until " + string[1] + ", " + month + " " + string[2]);
        $("#modal_date_li").html(string[1] + "th" + " " + month + " " + string[2]);
        $("#modal_time_li").html(data.end_time);
        $("#modal_aircraft_li").html(data.aircraft);
        $("#modal_partner_li").html(data.partner_name);
        $("#modal_passenger_li").html(data.seats + " passengers");     
        $("#modal-empty-leg").modal("show");
    };
    var emptyBookingComplete = function (response) {        
        $("#modal-empty-leg").modal('hide');
    };
    var EmptylegBooking= function (e) {
        e.preventDefault();      
        if ($("#request_form").valid()) {
            if ($("#mobile-number").intlTelInput('isValidNumber')) {
                var emptyleg_data = {
                    gender: $("#emptyleg_Mr").val(),
                    contact_person: $("#emptyleg_contact").val(),
                    phone: $("#emptyleg_tel").intlTelInput('getNumber'),
                    email: $("#emptyleg_email").val(),
                    company: $("#emptyleg_company").val(),
                    departure: emptyleg.departure,
                    destination: emptyleg.destination,
                    end_date:emptyleg.end_date,
                    end_time:emptyleg.end_time,
                    partner_name:emptyleg.partner_name,
                    aircraft:emptyleg.aircraft,
                    price: emptyleg.price,
                    is_add: '1'
                };                
                var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });                
                Accessoslo.API.emptybooking(emptyleg_data, emptyBookingComplete);
            } else {
                alert("please input the vaild phone number!");
            }           
        }
    };
    var init = function () {
        if (counts != 0) {
            $(".introduction").attr('style', "margin:-550px 0px 0px !important"); 
            $(".wrapper-tabs").attr('style', "top: 71% !important;"); 
        }
        $("#confirm").click(Confirm);
        $("#book").click(Book);
        $("#flight_proceed").click(BookProceed);
        $("#transport_proceed").click(TrnasportProceed);
        $("#emptyleg_search").click(EmptylegSearch);
        $("#limousine_tel").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });
        $("#charter_tel").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });     
        $("#emptyleg_tel").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });     
        $("#emptyleg_date").datepicker({
            showOtherMonths: true,selectOtherMonths: true,
            onClose: function () {
                $('#emptyleg_form').validate().element("#emptyleg_date");
            }           
        });  
        $("#flight_time").datepicker({
            showOtherMonths: true,selectOtherMonths: true,
            onClose: function () {
                $('#flight_form').validate().element("#flight_time");
            }
        });  
        $("#transport_date").datepicker({
            showOtherMonths: true,selectOtherMonths: true,            
            onClose: function () {
                $('#transport_form').validate().element("#transport_date");
            }
        });      
        $('#flight_form').validate({             
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });     
        $('#transport_form').validate({             
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });   
        $('#emptyleg_form').validate({             
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });           
        $('#charter_modal_form').validate({             
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
        $('#limousine_modal_form').validate({             
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
        $('#request_form').validate({             
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
        $(".flight_details").click(flight_details);   
        $(".request").click(EmptylegBooking);     
    };
    init();
};

Controllers.News = function () {
    var Link = function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        setTimeout(function () { window.location.href = "/about/latest-news/" + id;}, 200);
    };
    var init = function () {
        $(".post_link").click(Link);
    };
    init();
};

Controllers.SingleNews = function () {
    var Link  = function (e) {
        e.preventDefault();
        var id = $(this).data('source');
        setTimeout(function () { window.location.href = "/about/latest-news/" + id;}, 200);
    };

    var init = function () {
        $("#selected_post" + id).attr('style', 'color:#c29834');
        $(".post_title").click(Link);
    };
    init();
};

Controllers.Partners = function () {
    var ViewDetails = function (e) {
        e.preventDefault();      
        var id = $(this).attr('id');
        setTimeout(function () { window.location.href = "/about/single-partner/" + id; }, 200);            
    };   
    var init = function () {
        $(".view_details").click(ViewDetails);
    };
    init();
};

Controllers.SinglePartner = function () {
    var partnerReview = function (response) {
        if (response.data == "error") {
            $(".avg_rate").starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f", initialRating: 0, readOnly: true});
        } else {
            $(".avg_rate").starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f", initialRating: response.data, readOnly: true});
            if (response.data == 5) {
                $(".rate_text").html("EXCELLENT");
            } else if (4<= response.data < 5) {
                $(".rate_text").html("GREAT");
            } else if (3<= response.data < 4) {
                $(".rate_text").html("GOOD");
            } else if (2<= response.data < 3) {
                $(".rate_text").html("NOT GOOD");
            } else if (1<= response.data < 2) {
                $(".rate_text").html("BAD");
            } else {
                $(".rate_text").html("TOO BAD");
            }
        }       
    };
    var init = function () {
        var data = {
            id: id
        };
        Accessoslo.API.getPartnerReview(data, partnerReview);  
        $(".total_rate").each(function(index, obj) {
            $(obj).starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f", initialRating: $(obj).attr("data-initialRating"), readOnly: true});
        });  
    };
    init();
};

Controllers.limousineTransport = function () {    
    var current_rate = {};
    $("#type_car").on('change', function (e) {
        var car = this.value;
        if ($("#type_zone").val() == "OsloToOSL" || $("#type_zone").val() == "OSLToOslo") {
            if (car == "S-klasse") { $("#price").html("Cost: 1500 kr"); $("#amount").val(Math.round(1500 * current_rate.USDEUR / current_rate.USDNOK));}
            else if (car == "Viano") {$("#price").html("Cost: 2200 kr"); $("#amount").val(Math.round(2200 * current_rate.USDEUR / current_rate.USDNOK));}
            else if (car == "Minibuss") {$("#price").html("Cost: 2900 kr"); $("#amount").val(Math.round(2900 * current_rate.USDEUR / current_rate.USDNOK));}
        } else if ($("#type_zone").val() == "AskerToOSL" || $("#type_zone").val() == "OSLToAsker") {
            if (car == "S-klasse") { $("#price").html("Cost: 1900 kr"); $("#amount").val(Math.round(1900 * current_rate.USDEUR / current_rate.USDNOK));}
            else if (car == "Viano") {$("#price").html("Cost: 2600 kr"); $("#amount").val(Math.round(2600 * current_rate.USDEUR / current_rate.USDNOK));}
            else if (car == "Minibuss") {$("#price").html("Cost: 3500 kr"); $("#amount").val(Math.round(3500 * current_rate.USDEUR / current_rate.USDNOK));}
        }        
    });
    var onBookingComplete = function (response) {        
        $("#input_form").submit();
    };
    var booking = function (e) {
        e.preventDefault();        
        if ($("input[name='optradio']:checked").val() == undefined) {
            $(".radio").attr('style', 'border: 1px solid red;');
        } 
        $("input[name='optradio']").change(function (e) {
            $(".radio").attr('style', 'border: none;');
        });      
        if ($("#input_form").valid()) {                                  
            if ($("#mobile-number").intlTelInput('isValidNumber')){
                var data= {
                    contact_person: $("#contact_person").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    email: $("#email").val(),
                    company: $("#company").val(),
                    date: $("#datepicker").val(),
                    type_car: $("#type_car").val(),
                    type_flight: $("input[name='optradio']:checked").val(),
                    from_address: $("#from_address").val(),
                    to_address: $("#to_address").val(),
                    comments: $("#comments").val(),
                    zone: $("#type_zone").val(),
                    price: $("#amount").val()
                };                
                var loading = new Loading({ title: 'Please wait while paypal response.', discription: 'Loading...' });                
                Accessoslo.API.limousine_booking(data, onBookingComplete);
            } else {
                alert("Invalid Phone number!");
            }
        }
        return false;
    };
    var getCurrency = function () {
        var endpoint = 'live'
        var access_key = 'b890b5deda16e0bed27628931e55c65c';    
        $.ajax({
            url: 'http://apilayer.net/api/' + endpoint + '?access_key=' + access_key,   
            dataType: 'jsonp',
            success: function(json) {                
                current_rate = {
                    USDEUR: json.quotes.USDEUR,
                    USDNOK: json.quotes.USDNOK                   
                };                
            }
        });        
    };
    var init = function () {
        getCurrency();
        $("#input_form").validate({
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
        $("#booking-button").click(booking);
        $("#datepicker").datepicker({
            showOtherMonths: true,selectOtherMonths: true,
            onClose: function () {
                $('#input_form').validate().element("#datepicker");
            }
        });     
        $("#mobile-number").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });  

    };
    init();
};

Controllers.MeetGreet = function () {   
    var OnRequestComplete = function (response) {        
        setTimeout(function () { window.location = "/member/dashboard" }, 0);
    };
    var request = function (e) {
        e.preventDefault();
        if ($("#flight_form").valid()) {
            if ($("#meet_phone").intlTelInput("isValidNumber")) {
                var data = {
                    "contact_person": $("#contact_person").val(),
                    "phone": $("#meet_phone").intlTelInput("getNumber"),
                    "email": $("#email").val(),
                    "company": $("#company").val(),
                    "flight_number": $("#flight_number").val(),
                    "airline": $("#airline").val(),
                    "date": $("#meet_datepicker").val(),
                    "time": $("#timepicker").val(),
                    "luggage": $("#luggage").val(),
                    "travelers": $("#travelers").val(),
                    "booking_reference": $("#booking_reference").val(),
                    "meet_service": $("#meet_service").val(),
                    "product": $("#product").val(),
                    "departure_time": $("#departure_timepicker").val(),
                    'connect_flight_number': $("#flight_no").val(),
                    "comments": $("#comments").val()
                };        
                var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });                     
                Accessoslo.API.meet_book(data, OnRequestComplete);
                return false;
            } else {
                alert("Invalid phone number!");
            }
        }
    };
    var RedirectPaypal = function (response) {        
        $("#item_number").val(response.data.booking.id);
        $("#flight_form").submit();
    };
    $("#book").click(function (e) {
        e.preventDefault();
        var loading = new Loading({ title: 'Please wait while paypal response.', discription: 'Loading...' });
        if ($("#flight_form").valid()) {
            if ($("#meet_phone").intlTelInput("isValidNumber")) {
                var data = {
                    "contact_person": $("#contact_person").val(),
                    "phone": $("#meet_phone").intlTelInput("getNumber"),
                    "email": $("#email").val(),
                    "company": $("#company").val(),
                    "flight_number": $("#flight_number").val(),
                    "airline": $("#airline").val(),
                    "date": $("#meet_datepicker").val(),
                    "time": $("#timepicker").val(),
                    "luggage": $("#luggage").val(),
                    "travelers": $("#travelers").val(),
                    "booking_reference": $("#booking_reference").val(),
                    "meet_service": $("#meet_service").val(),
                    "product": $("#product").val(),
                    "departure_time": $("#departure_timepicker").val(),
                    'connect_flight_number': $("#flight_no").val(),
                    "comments": $("#comments").val()
                };                                   
                Accessoslo.API.meet_book(data, RedirectPaypal);
            }
        }               
        return false;
    });
    $("#travelers").on('change', function (e) {
        e.preventDefault();
        if ($(this).val() < 17) {
            $("#book").attr('style', 'display:inline-block;');
            $("#request").attr('style', 'display:none;');    
            $("#price").attr('style', 'display:inline-block;');         
            var price = $("#travelers").val() * 50;
            $("#price").html("price: " + price + "€"); 
            $("#amount").val(price);                    
        } else {
            $("#book").attr('style', 'display:none;');
            $("#request").attr('style', 'display:inline-block;');
            $("#price").attr('style', 'display:none;');           
        }         
    });    
    var init = function () {                
        $("#request").click(request);
        $("#meet_datepicker").datepicker({
            showOtherMonths: true,selectOtherMonths: true,
            onClose: function () {
                $('#flight_form').validate().element("#meet_datepicker");
            }
        });
        $("#timepicker").wickedpicker({
            onClose: function () {
                $('#flight_form').validate().element("#meet_datepicker");
            }
        });
        $("#departure_timepicker").wickedpicker({
            onClose: function () {
                $('#flight_form').validate().element("#meet_datepicker");
            }
        });
        $("#meet_phone").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });
        $('#flight_form').validate({             
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        }); 
    };
    init();
};

Controllers.ContactUs = function () {
    var OnVerifyComplete = function () {
        setTimeout(function () { window.location = "/" }, 0);
    };
    var OnSend = function () {       
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),
                };
                var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });                
                Accessoslo.API.contact_mail(send_data, OnVerifyComplete);
            } else {
                alert("Invalid Phone number!");
            }   
        }             
    };
    var init = function () {
        $("#send").click(OnSend);      
        $("#mobile-number").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        }); 
        $("#form_contr").validate({
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
    };
    init();
};

Controllers.AdminExecutive = function () {    
    var estimate_cost = ""; var additional_fee = "";  var total_cost = ""; var aircraft = ""; var bonus = "";
    var pagination_items = $(".pagination li a");    
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/executive-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search"}, 100); 
    });
    $("#status").on('change', function (e) {
        e.preventDefault();
        var status = "";
        if ($("#status").val() == "awaiting") {            
            status = "awaiting"; 
        } else if ($("#status").val() == "sent") {
            status = "sent"; 
        } else if ($("#status").val() == "paid") {
            status = "paid";
        }
        setTimeout(function () { window.location.href= "/admin/executive-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search"}, 50);        
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                          
            setTimeout(function () { window.location.href= "/admin/executive-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search}, 50); 
        }
    });
    var GetInfoComplete = function (response) {       
        if (response.data.charters) {
            $("#aircraft" + response.data.id).val(response.data.charters.aircraft);            
            $("#estimate_cost" + response.data.id).val(response.data.charters.estimate_cost);
            $("#additional_fee" + response.data.id).val(response.data.charters.additional_fee);
            $("#total_cost" + response.data.id).val(response.data.charters.total_cost);
            estimate_cost = response.data.charters.estimate_cost;
            additional_fee = response.data.charters.additional_fee;
            total_cost = response.data.charters.total_cost;
            aircraft = response.data.charters.aircraft;
        } else {
            $("#estimate_cost").val("");
            $("#additional_fee").val("");
            $("#total_cost").val("");
        }
    };
    var getCheckBonus = function (response) {
        bonus = response.data.bonus;
        $("#total_bonus" + response.data.id).val(bonus);
    }
    $(".toggle").click(function () {
        var data = $(this).data('info');
        Accessoslo.API.CheckBonus(data, getCheckBonus);    
        var send_data = { id: data.id, charter_type: "executive charter" };               
        Accessoslo.API.GetCharters(send_data, GetInfoComplete);
    });
    var SetComplete = function (response) {};
    var GetComplete = function (response) {     
        if (response.data.group_badge != 0) {$(".group_badge").attr('style', "display:inline;");$(".group_badge").html(response.data.group_badge);}
        if (response.data.helicopter_badge != 0) {$(".helicopter_badge").attr('style', "display:inline;");$(".helicopter_badge").html(response.data.helicopter_badge);}
        if (response.data.cargo_badge != 0) {$(".cargo_badge").attr('style', "display:inline;");$(".cargo_badge").html(response.data.cargo_badge);}
        if (response.data.meet_badge != 0) {$(".meet_badge").attr('style', "display:inline;");$(".meet_badge").html(response.data.meet_badge);}
        if (response.data.limousine_badge != 0) {$(".limousine_badge").attr('style', "display:inline;");$(".limousine_badge").html(response.data.limousine_badge);}
        if (response.data.handling_badge != 0) {$(".handling_badge").attr('style', "display:inline;");$(".handling_badge").html(response.data.handling_badge);}
        if (response.data.passenger_badge != 0) {$(".passenger_badge").attr('style', "display:inline;");$(".passenger_badge").html(response.data.passenger_badge);}
        if (response.data.private_badge != 0) {$(".private_badge").attr('style', "display:inline;");$(".private_badge").html(response.data.private_badge);}
        if (response.data.event_badge != 0) {$(".event_badge").attr('style', "display:inline;");$(".event_badge").html(response.data.event_badge);}
        if (response.data.emptyleg_badge != 0) {$(".emptyleg_badge").attr('style', "display:inline;");$(".emptyleg_badge").html(response.data.emptyleg_badge);}
        var data = {"dest": "badgeshowing", "type": "executive"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    $('input[name="estimate_cost"]').change(function(){estimate_cost = this.value; });
    $('input[name="additional_fee"]').change(function(){additional_fee = this.value; });
    $('input[name="total_cost"]').change(function(){total_cost = this.value;});
    $('select[name="aircraft"]').change(function (){aircraft = this.value;});
    var SaveComplete = function (response){window.location = "/admin/executive-charter";
};
    var Save = function (e) {
        e.preventDefault();
        var data1 = $(this).data('save');
        if (additional_fee == "") additional_fee = 0;
        var cost = parseInt(estimate_cost) + parseInt(additional_fee);       
        if ($('#aircraft' + data1.id).val()) {            
            var data = {
                charter_id: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost: Math.round(Math.round(cost + cost * 12 / 100)),
                contact_person: data1.contact_person,
                email: data1.email,
                author: user.first_name + " " + user.last_name,
                charter_type: "executive charter"
            };       
            if (bonus != 0) {
                data.total_cost = data.total_cost - bonus / 10;
            }
            var loading = new Loading({ discription: 'Loading...' });            
            Accessoslo.API.SaveCharters(data, SaveComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var SendComplete = function (response){$("#aircraft").val("");$(".estimate_cost").val("");$(".additional_fee").val("");$(".total_cost").val("");window.location = "/admin/executive-charter";};
    var Send = function (e) {
        e.preventDefault();
        var data1 = $(this).data('send');
        if($('#aircraft' + data1.id).val()){
            var data = {
                booking_no: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost: total_cost,
                contact_person: data1.contact_person,
                email: data1.email,
                charter_type: 'executive charter'
            };           
            var loading = new Loading({ discription: 'Loading...' });            
            Accessoslo.API.SendCharters(data, SendComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var BonusComplete = function (response) { alert("bonus is saved."); };
    $('.send_bonus').click(function () {
        var data1 = $(this).data('send');
        if($('#total_bonus' + data1.id).val()) {
            var data = {
                email: data1.email,               
                extra_bonus: $('#total_bonus' + data1.id).val()
            };           
            Accessoslo.API.SaveExtraBonus(data, BonusComplete);
        }        
    });
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "executive"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".executive_badge").hide();
        $("#datepicker").val(startDate + " - " + endDate);
        $("#datepicker").daterangepicker();
        $(".save").click(Save);
        if (user.role_id == '0') {
            $(".send").click(Send);
        }
    };
    init();
};

Controllers.AdminGroup = function () {    
    var estimate_cost = ""; var additional_fee = "";  var total_cost = "";  var aircraft = ""; var bonus = "";
    var pagination_items = $(".pagination li a");    
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/group-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search"}, 100); 
    });
    $("#status").on('change', function (e) {
        e.preventDefault();
        var status = "";
        if ($("#status").val() == "awaiting") {            
            status = "awaiting"; 
        } else if ($("#status").val() == "sent") {
            status = "sent"; 
        } else if ($("#status").val() == "paid") {
            status = "paid";
        }
        setTimeout(function () { window.location.href= "/admin/group-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search"}, 50);        
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                          
            setTimeout(function () { window.location.href= "/admin/group-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search}, 50); 
        }
    });
    var GetInfoComplete = function (response) {
        if (response.data.charters) {
            $("#aircraft" + response.data.id).val(response.data.charters.aircraft);
            $("#estimate_cost" + response.data.id).val(response.data.charters.estimate_cost);
            $("#additional_fee" + response.data.id).val(response.data.charters.additional_fee);
            $("#total_cost" + response.data.id).val(response.data.charters.total_cost);
            estimate_cost = response.data.charters.estimate_cost;
            additional_fee = response.data.charters.additional_fee;
            total_cost = response.data.charters.total_cost;
            aircraft = response.data.charters.aircraft;
        } else {
            $("#estimate_cost").val("");
            $("#additional_fee").val("");
            $("#total_cost").val("");
        }
    };
    var getCheckBonus = function (response) {
        bonus = response.data.bonus;
        $("#total_bonus" + response.data.id).val(bonus);
    }
    $(".toggle").click(function () {
        var data = $(this).data('info');
        Accessoslo.API.CheckBonus(data, getCheckBonus);
        var send_data = { id: data.id, charter_type: "group charter" };
        Accessoslo.API.GetCharters(send_data, GetInfoComplete);
    });
    var SetComplete = function (response) {};
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {$(".executive_badge").attr('style', "display:inline;");$(".executive_badge").html(response.data.executive_badge);}
        if (response.data.helicopter_badge != 0) {$(".helicopter_badge").attr('style', "display:inline;");$(".helicopter_badge").html(response.data.helicopter_badge);}
        if (response.data.cargo_badge != 0) {$(".cargo_badge").attr('style', "display:inline;");$(".cargo_badge").html(response.data.cargo_badge);}
        if (response.data.meet_badge != 0) {$(".meet_badge").attr('style', "display:inline;");$(".meet_badge").html(response.data.meet_badge);}
        if (response.data.limousine_badge != 0) {$(".limousine_badge").attr('style', "display:inline;");$(".limousine_badge").html(response.data.limousine_badge);}
        if (response.data.handling_badge != 0) {$(".handling_badge").attr('style', "display:inline;");$(".handling_badge").html(response.data.handling_badge);}
        if (response.data.passenger_badge != 0) {$(".passenger_badge").attr('style', "display:inline;");$(".passenger_badge").html(response.data.passenger_badge);}
        if (response.data.private_badge != 0) {$(".private_badge").attr('style', "display:inline;");$(".private_badge").html(response.data.private_badge);}
        if (response.data.event_badge != 0) {$(".event_badge").attr('style', "display:inline;");$(".event_badge").html(response.data.event_badge);}
        if (response.data.emptyleg_badge != 0) {$(".emptyleg_badge").attr('style', "display:inline;");$(".emptyleg_badge").html(response.data.emptyleg_badge);}
        var data = {
            "dest": "badgeshowing",
            "type": "group"
        };
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    $('input[name="estimate_cost"]').change(function(){estimate_cost = this.value;});
    $('input[name="additional_fee"]').change(function(){additional_fee = this.value;});
    $('input[name="total_cost"]').change(function(){total_cost = this.value;});
    $('select[name="aircraft"]').change(function (){aircraft = this.value;});
    var SaveComplete = function (response){window.location = "/admin/group-charter";};
    var Save = function (e) {
        e.preventDefault();
        var data1 = $(this).data('save');
        if (additional_fee == "") additional_fee = 0;
        var cost = parseInt(estimate_cost) + parseInt(additional_fee);
        if ($('#aircraft' + data1.id).val()) {          
            var data = {                
                charter_id: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost:  Math.round(cost + cost * 12 / 100),
                contact_person: data1.contact_person,
                email: data1.email,
                author: user.first_name + " " + user.last_name,
                charter_type: "group charter"
            };      
            if (bonus != 0) {
                data.total_cost = data.total_cost - bonus / 10;
            }
            var loading = new Loading({ discription: 'Loading...' });            
            Accessoslo.API.SaveCharters(data, SaveComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var SendComplete = function (response){$("#aircraft").val("");$(".estimate_cost").val("");$(".additional_fee").val("");$(".total_cost").val("");window.location = "/admin/group-charter";};
    var Send = function (e) {
        e.preventDefault();
        var data1 = $(this).data('send');
        if ($('#aircraft' + data1.id).val()) {           
            var data = {
                booking_no: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost: total_cost,
                contact_person: data1.contact_person,
                email: data1.email,
                charter_type: "group charter"
            };                 
            var loading = new Loading({ discription: 'Loading...' });            
            Accessoslo.API.SendCharters(data, SendComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var BonusComplete = function (response) { alert("bonus is saved."); };
    $('.send_bonus').click(function () {
        var data1 = $(this).data('send');
        if($('#total_bonus' + data1.id).val()) {
            var data = {
                email: data1.email,
                extra_bonus: $('#total_bonus' + data1.id).val()
            };
            Accessoslo.API.SaveExtraBonus(data, BonusComplete);
        }        
    });
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "group"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".group_badge").hide();
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
        $(".save").click(Save);
        if (user.role_id == '0') {
            $(".send").click(Send);
        }
    };
    init();
};

Controllers.AdminHelicopter = function () {    
    var estimate_cost = ""; var additional_fee = "";  var total_cost = ""; var aircraft = "";
    var bonus = "";
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/helicopter-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search"}, 100); 
    });
    $("#status").on('change', function (e) {
        e.preventDefault();
        var status = "";
        if ($("#status").val() == "awaiting") {            
            status = "awaiting"; 
        } else if ($("#status").val() == "sent") {
            status = "sent"; 
        } else if ($("#status").val() == "paid") {
            status = "paid";
        }
        setTimeout(function () { window.location.href= "/admin/helicopter-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search"}, 50);        
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                          
            setTimeout(function () { window.location.href= "/admin/helicopter-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search}, 50); 
        }
    });
    var GetInfoComplete = function (response) {
        if (response.data.charters) {
            $("#aircraft" + response.data.id).val(response.data.charters.aircraft);
            $("#estimate_cost" + response.data.id).val(response.data.charters.estimate_cost);
            $("#additional_fee" + response.data.id).val(response.data.charters.additional_fee);
            $("#total_cost" + response.data.id).val(response.data.charters.total_cost);
            estimate_cost = response.data.charters.estimate_cost;
            additional_fee = response.data.charters.additional_fee;
            total_cost = response.data.charters.total_cost;
            aircraft = response.data.charters.aircraft;
        } else {
            $("#estimate_cost").val("");
            $("#additional_fee").val("");
            $("#total_cost").val("");
        }
    };
    var getCheckBonus = function (response) {
        bonus = response.data.bonus;
        $("#total_bonus" + response.data.id).val(bonus);
    }
    $(".toggle").click(function () {
        var data = $(this).data('info');
        Accessoslo.API.CheckBonus(data, getCheckBonus);
        var send_data = { id: data.id, charter_type: "helicopter charter" };
        Accessoslo.API.GetCharters(send_data, GetInfoComplete);
    });
    var SetComplete = function (response) {};
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }     
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.private_badge != 0) {
            $(".private_badge").attr('style', "display:inline;");
            $(".private_badge").html(response.data.private_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "helicopter"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    $('input[name="estimate_cost"]').change(function(){estimate_cost = this.value; });
    $('input[name="additional_fee"]').change(function(){additional_fee = this.value; });
    $('input[name="total_cost"]').change(function(){total_cost = this.value;});
    $('select[name="aircraft"]').change(function (){aircraft = this.value;});
    var SaveComplete = function (response){window.location = "/admin/helicopter-charter";};
    var Save = function (e) {
        e.preventDefault();
        var data1 = $(this).data('save');
        if (additional_fee == "") additional_fee = 0;
        var cost = parseInt(estimate_cost) + parseInt(additional_fee);
        if ($('#aircraft' + data1.id).val()) { 
            var data = {
                charter_id: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost: Math.round(cost + cost * 12 / 100),
                contact_person: data1.contact_person,
                email: data1.email,
                author: user.first_name + " " + user.last_name,
                charter_type: "helicopter charter"
            };
            if (bonus != 0) {
                data.total_cost = data.total_cost - bonus / 10;
            }
            var loading = new Loading({ discription: 'Loading...' });            
            Accessoslo.API.SaveCharters(data, SaveComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var SendComplete = function (response){$("#aircraft").val("");$(".estimate_cost").val("");$(".additional_fee").val("");$(".total_cost").val("");window.location = "/admin/helicopter-charter";};
    var Send = function (e) {
        e.preventDefault();
        var data1 = $(this).data('send');
        if($('#aircraft' + data1.id ).val()){          
            var data = {
                booking_no: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,            
                total_cost: total_cost,
                contact_person: data1.contact_person,
                email: data1.email,
                charter_type: 'helicopter charter'
            };   
            var loading = new Loading({ discription: 'Loading...' });            
            Accessoslo.API.SendCharters(data, SendComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var BonusComplete = function (response) { alert("bonus is saved."); };
    $('.send_bonus').click(function () {
        var data1 = $(this).data('send');
        if($('#total_bonus' + data1.id).val()) {
            var data = {
                email: data1.email,
                extra_bonus: $('#total_bonus' + data1.id).val()
            };
            Accessoslo.API.SaveExtraBonus(data, BonusComplete);
        }        
    });
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "helicopter"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".helicopter_badge").hide();
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
        $(".save").click(Save);
        if (user.role_id == '0') {
            $(".send").click(Send);
        }
    };
    init();
};

Controllers.AdminCargo = function () {    
    var estimate_cost = ""; var additional_fee = "";  var total_cost = ""; var aircraft = ""; var bonus = "";
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/cargo-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search"}, 100); 
    });
    $("#status").on('change', function (e) {
        e.preventDefault();
        var status = "";
        if ($("#status").val() == "awaiting") {            
            status = "awaiting"; 
        } else if ($("#status").val() == "sent") {
            status = "sent"; 
        } else if ($("#status").val() == "paid") {
            status = "paid";
        }
        setTimeout(function () { window.location.href= "/admin/cargo-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search"}, 50);        
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                          
            setTimeout(function () { window.location.href= "/admin/cargo-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search}, 50); 
        }
    });
    var GetInfoComplete = function (response) {
        if (response.data.charters) {
            $("#aircraft" + response.data.id).val(response.data.charters.aircraft);
            $("#estimate_cost" + response.data.id).val(response.data.charters.estimate_cost);
            $("#additional_fee" + response.data.id).val(response.data.charters.additional_fee);
            $("#total_cost" + response.data.id).val(response.data.charters.total_cost);
            estimate_cost = response.data.charters.estimate_cost;
            additional_fee = response.data.charters.additional_fee;
            total_cost = response.data.charters.total_cost;
            aircraft = response.data.charters.aircraft;
        } else {
            $("#estimate_cost").val("");
            $("#additional_fee").val("");
            $("#total_cost").val("");
        }
    };
    var getCheckBonus = function (response) {
        bonus = response.data.bonus;
        $("#total_bonus" + response.data.id).val(bonus);
    }
    $(".toggle").click(function () {
        var data = $(this).data('info');
        Accessoslo.API.CheckBonus(data, getCheckBonus);
        var send_data = { id: data.id, charter_type: "cargo charter" };
        Accessoslo.API.GetCharters(send_data, GetInfoComplete);
    });
    var SetComplete = function (response) {};
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }       
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.private_badge != 0) {
            $(".private_badge").attr('style', "display:inline;");
            $(".private_badge").html(response.data.private_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "cargo"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    $('input[name="estimate_cost"]').change(function(){estimate_cost = this.value; });
    $('input[name="additional_fee"]').change(function(){additional_fee = this.value; });
    $('input[name="total_cost"]').change(function(){total_cost = this.value;});
    $('select[name="aircraft"]').change(function (){aircraft = this.value;});
    var SaveComplete = function (response){window.location = "/admin/cargo-charter";};
    var Save = function (e) {
        e.preventDefault();
        var data1 = $(this).data('save'); 
        if (additional_fee == "") additional_fee = 0;
        var cost = parseInt(estimate_cost) + parseInt(additional_fee); 
        if($('#aircraft' + data1.id).val()){    
            var data = {
                charter_id: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost: Math.round(cost + cost * 12 / 100),
                contact_person: data1.contact_person,
                email: data1.email,
                author: user.first_name + " " + user.last_name,
                charter_type: "cargo charter"
            };
            if (bonus != 0) {
                data.total_cost = data.total_cost - bonus / 10;
            }
            var loading = new Loading({ discription: 'Saving...' });           
            Accessoslo.API.SaveCharters(data, SaveComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var SendComplete = function (response){$("#aircraft").val("");$(".estimate_cost").val("");$(".additional_fee").val("");$(".total_cost").val("");window.location = "/admin/cargo-charter";};
    var Send = function (e) {
        e.preventDefault();
        var data1 = $(this).data('send');
        if($('#aircraft' + data1.id).val()){
            var data = {
                booking_no: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,            
                total_cost: total_cost,
                contact_person: data1.contact_person,
                email: data1.email,
                charter_type: "cargo charter"
            };  
            var loading = new Loading({ discription: 'Sending...' });            
            Accessoslo.API.SendCharters(data, SendComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var BonusComplete = function (response) { alert("bonus is saved."); };
    $('.send_bonus').click(function () {
        var data1 = $(this).data('send');
        if($('#total_bonus' + data1.id).val()) {
            var data = {
                email: data1.email,
                extra_bonus: $('#total_bonus' + data1.id).val()
            };
            Accessoslo.API.SaveExtraBonus(data, BonusComplete);
        }        
    });
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "cargo"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".cargo_badge").hide();
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
        $(".save").click(Save);
        if (user.role_id == '0') {
            $(".send").click(Send);
        }
    };
    init();
};

Controllers.AdminMeet = function () {    
    var estimate_cost = ""; var additional_fee = "";  var total_cost = ""; var aircraft = ""; 
    var bonus = "";
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/meet-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search"}, 100); 
    });
    $("#status").on('change', function (e) {
        e.preventDefault();
        var status = "";
        if ($("#status").val() == "awaiting") {            
            status = "awaiting"; 
        } else if ($("#status").val() == "sent") {
            status = "sent"; 
        } else if ($("#status").val() == "paid") {
            status = "paid";
        }
        setTimeout(function () { window.location.href= "/admin/meet-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search"}, 50);        
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                          
            setTimeout(function () { window.location.href= "/admin/meet-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search}, 50); 
        }
    });
    var GetInfoComplete = function (response) {
        if (response.data.charters) {
            $("#aircraft" + response.data.id).val(response.data.charters.aircraft);
            $("#estimate_cost" + response.data.id).val(response.data.charters.estimate_cost);
            $("#additional_fee" + response.data.id).val(response.data.charters.additional_fee);
            $("#total_cost" + response.data.id).val(response.data.charters.total_cost);
            estimate_cost = response.data.charters.estimate_cost;
            additional_fee = response.data.charters.additional_fee;
            total_cost = response.data.charters.total_cost;
            aircraft = response.data.charters.aircraft;
        } else {
            $("#estimate_cost").val("");
            $("#additional_fee").val("");
            $("#total_cost").val("");
        }
    };
    var getCheckBonus = function (response) {
        bonus = response.data.bonus;
        $("#total_bonus" + response.data.id).val(bonus);
    }
    $(".toggle").click(function () {
        var data = $(this).data('info');
        Accessoslo.API.CheckBonus(data, getCheckBonus);
        var send_data = { id: data.id, charter_type: "meet charter"};
        Accessoslo.API.GetCharters(send_data, GetInfoComplete);
    });
    $('input[name="estimate_cost"]').change(function(){estimate_cost = this.value; });
    $('input[name="additional_fee"]').change(function(){additional_fee = this.value; });
    $('input[name="total_cost"]').change(function(){total_cost = this.value;});
    $('select[name="aircraft"]').change(function (){aircraft = this.value;});
    var SaveComplete = function (response){window.location = "/admin/meet-greet";};
    var Save = function (e) {
        e.preventDefault();
        var data1 = $(this).data('save');
        if (additional_fee == "") additional_fee = 0;
        var cost = parseInt(estimate_cost) + parseInt(additional_fee); 
        if($('#aircraft' + data1.id).val()){    
            var data = {
                charter_id: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost: Math.round(cost + cost * 12 / 100),
                contact_person: data1.contact_person,
                email: data1.email,
                author: user.first_name + " " + user.last_name,
                charter_type: "meet charter"
            };
            if (bonus != 0) {
                data.total_cost = data.total_cost - bonus / 10;
            }          
            var loading = new Loading({ discription: 'Saving...' });            
            Accessoslo.API.SaveCharters(data, SaveComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var SendComplete = function (response){$("#aircraft").val("");$(".estimate_cost").val("");$(".additional_fee").val("");$(".total_cost").val("");window.location = "/admin/meet-greet";};
    var Send = function (e) {
        e.preventDefault();        
        var data1 = $(this).data('send');
        if($('#aircraft' + data1.id).val()){          
            var data = {
                booking_no: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,            
                total_cost: total_cost,
                contact_person: data1.contact_person,
                email: data1.email,
                charter_type: "meet charter"
            };              
            var loading = new Loading({ discription: 'Sending...' });            
            Accessoslo.API.SendCharters(data, SendComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var SetComplete = function (response) {};
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.private_badge != 0) {
            $(".private_badge").attr('style', "display:inline;");
            $(".private_badge").html(response.data.private_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "meet"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    var viewDetails = function (e) {
        e.preventDefault();
        var data = $(this).data('source');
        $("#booking-id").html("#00" + data.id);
        $("#company").html(data.company);$("#contact_person").html(data.contact_person);$("#email").html(data.email);$("#phone").html(data.phone);
        $("#date").html(data.date);$("#meet_service").html(data.meet_service);$("#product").html(data.product);$("#luggage").html(data.luggage);
        $("#travelers").html(data.travelers);$("#flight_number").html(data.flight_number);$("#airline").html(data.airline);$("#time").html(data.time);
        $("#booking_reference").html(data.booking_reference);$("#departure_time").html(data.departure_time);$("#connect_flight_number").html(data.connect_flight_number);$("#time").html(data.time);
        $("#comments").html(data.comments);
        $("#modal_detail").modal("show");
    };
    var BonusComplete = function (response) { alert("bonus is saved."); };
    $('.send_bonus').click(function () {
        var data1 = $(this).data('send');
        if($('#total_bonus' + data1.id).val()) {
            var data = {
                email: data1.email,
                extra_bonus: $('#total_bonus' + data1.id).val()
            };
            Accessoslo.API.SaveExtraBonus(data, BonusComplete);
        }        
    });
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "meet"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".meet_badge").hide();
        $(".comments").click(viewDetails);
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
        $(".save").click(Save);
        if (user.role_id == '0') {
            $(".send").click(Send);
        }
    };
    init();
};

Controllers.AdminLimousine = function () {    
    var estimate_cost = ""; var additional_fee = "";  var total_cost = ""; var aircraft = ""; var bonus = "";
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/airport-search-limousine?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search"}, 100); 
    });
    $("#status").on('change', function (e) {
        e.preventDefault();
        var status = "";
        if ($("#status").val() == "awaiting") {            
            status = "awaiting"; 
        } else if ($("#status").val() == "sent") {
            status = "sent"; 
        } else if ($("#status").val() == "paid") {
            status = "paid";
        }
        setTimeout(function () { window.location.href= "/admin/airport-search-limousine?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search"}, 50);        
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                          
            setTimeout(function () { window.location.href= "/admin/airport-search-limousine?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search}, 50); 
        }
    });
    var GetInfoComplete = function (response) {
        if (response.data.charters) {
            $("#aircraft" + response.data.id).val(response.data.charters.aircraft);
            $("#estimate_cost" + response.data.id).val(response.data.charters.estimate_cost);
            $("#additional_fee" + response.data.id).val(response.data.charters.additional_fee);
            $("#total_cost" + response.data.id).val(response.data.charters.total_cost);
            estimate_cost = response.data.charters.estimate_cost;
            additional_fee = response.data.charters.additional_fee;
            total_cost = response.data.charters.total_cost;
            aircraft = response.data.charters.aircraft;
        } else {
            $("#estimate_cost").val("");
            $("#additional_fee").val("");
            $("#total_cost").val("");
        }
    };
    var getCheckBonus = function (response) {
        bonus = response.data.bonus;
        $("#total_bonus" + response.data.id).val(bonus);
    }
    $(".toggle").click(function () {
        var data = $(this).data('info');
        Accessoslo.API.CheckBonus(data, getCheckBonus);
        var send_data = { id: data.id, charter_type: "limousine transport" };        
        Accessoslo.API.GetCharters(send_data, GetInfoComplete);
    });
    $('input[name="estimate_cost"]').change(function(){estimate_cost = this.value; });
    $('input[name="additional_fee"]').change(function(){additional_fee = this.value; });
    $('input[name="total_cost"]').change(function(){total_cost = this.value;});
    $('select[name="aircraft"]').change(function (){aircraft = this.value;});
    var SaveComplete = function (response){window.location = "/admin/airport-limousine";};
    var Save = function (e) {
        e.preventDefault();
        var data1 = $(this).data('save');  
        if (additional_fee == "") additional_fee = 0;
        var cost = parseInt(estimate_cost) + parseInt(additional_fee);
        if($('#aircraft' + data1.id).val()){    
            var data = {
                charter_id: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost: Math.round(cost + cost * 12 / 100),
                contact_person: data1.contact_person,
                email: data1.email,
                author: user.first_name + " " + user.last_name,
                charter_type: "limousine transport"
            };
            if (bonus != 0) {
                data.total_cost = data.total_cost - bonus / 10;
            }         
            var loading = new Loading({ discription: 'Saving...' });              
            Accessoslo.API.SaveCharters(data, SaveComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var SendComplete = function (response){alert("send successed");$("#aircraft").val("");$(".estimate_cost").val("");$(".additional_fee").val("");$(".total_cost").val("");window.location = "/admin/airport-limousine";};
    var Send = function (e) {
        e.preventDefault();
        var data1 = $(this).data('send');
        if($('#aircraft' + data1.id).val()){
            var data = {
                booking_no: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,            
                total_cost: total_cost,
                contact_person: data1.contact_person,
                email: data1.email,
                charter_type: "limousine transport"
            };            
            var loading = new Loading({ discription: 'Sending...' });                         
            Accessoslo.API.SendCharters(data, SendComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var viewDetails = function (e) {
        e.preventDefault();
        var data = $(this).data('source');
        $("#id").html("#00" + data.id);
        $("#type_flight").html(data.type_flight);$("#date").html(data.date);$("#contact_person").html(data.contact_person);$("#from_address").html(data.from_address);
        $("#phone").html(data.phone);$("#to_address").html(data.to_address);$("#email").html(data.email);$("#type_car").html(data.type_car);
        $("#company").html(data.company);$("#comments").html(data.comments);
        $("#modal-limousine").modal("show");
    };
    var SetComplete = function (response) {};
    var GetComplete = function (response) {        
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }     
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.private_badge != 0) {
            $(".private_badge").attr('style', "display:inline;");
            $(".private_badge").html(response.data.private_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "limousine"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    var BonusComplete = function (response) { alert("bonus is saved."); };
    $('.send_bonus').click(function () {
        var data1 = $(this).data('send');
        if($('#total_bonus' + data1.id).val()) {
            var data = {
                email: data1.email,
                extra_bonus: $('#total_bonus' + data1.id).val()
            };
            Accessoslo.API.SaveExtraBonus(data, BonusComplete);
        }        
    });
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "limousine"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".limousine_badge").hide();
        $(".comments").click(viewDetails);
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
        $(".save").click(Save);
        if (user.role_id == '0') {
            $(".send").click(Send);
        }
    };
    init();
};

Controllers.AdminHandling = function () {    
    var estimate_cost = ""; var additional_fee = "";  var total_cost = ""; var aircraft = ""; var bonus = ""; 
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/handling-requests-search?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search"}, 100); 
    });
    $("#status").on('change', function (e) {
        e.preventDefault();
        var status = "";
        if ($("#status").val() == "awaiting") {            
            status = "awaiting"; 
        } else if ($("#status").val() == "sent") {
            status = "sent"; 
        } else if ($("#status").val() == "paid") {
            status = "paid";
        }
        setTimeout(function () { window.location.href= "/admin/handling-requests-search?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search"}, 50);        
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                          
            setTimeout(function () { window.location.href= "/admin/handling-requests-search?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search}, 50); 
        }
    });
    var GetInfoComplete = function (response) {
        if (response.data.charters) {
            $("#aircraft" + response.data.id).val(response.data.charters.aircraft);
            $("#estimate_cost" + response.data.id).val(response.data.charters.estimate_cost);
            $("#additional_fee" + response.data.id).val(response.data.charters.additional_fee);
            $("#total_cost" + response.data.id).val(response.data.charters.total_cost);
            estimate_cost = response.data.charters.estimate_cost;
            additional_fee = response.data.charters.additional_fee;
            total_cost = response.data.charters.total_cost;
            aircraft = response.data.charters.aircraft;
        } else {
            $("#estimate_cost").val("");
            $("#additional_fee").val("");
            $("#total_cost").val("");
        }
    };
    var getCheckBonus = function (response) {
        bonus = response.data.bonus;
        $("#total_bonus" + response.data.id).val(bonus);
    }
    $(".toggle").click(function () {
        var data = $(this).data('info');
        Accessoslo.API.CheckBonus(data, getCheckBonus);
        var send_data = { id: data.id, charter_type: "handling request" };        
        Accessoslo.API.GetCharters(send_data, GetInfoComplete);
    });
    
    $('input[name="estimate_cost"]').change(function(){estimate_cost = this.value; });
    $('input[name="additional_fee"]').change(function(){additional_fee = this.value; });
    $('input[name="total_cost"]').change(function(){total_cost = this.value;});
    $('select[name="aircraft"]').change(function (){aircraft = this.value;});
    var SaveComplete = function (response){window.location = "/admin/handling-requests";};
    var Save = function (e) {
        e.preventDefault();
        var data1 = $(this).data('save'); 
        if (additional_fee == "") additional_fee = 0;
        var cost = parseInt(estimate_cost) + parseInt(additional_fee); 
        if($('#aircraft' + data1.id).val()){    
            var data = {
                charter_id: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost: Math.round(cost + cost * 12 / 100),
                contact_person: data1.person,
                email: data1.email,
                author: user.first_name + " " + user.last_name,
                charter_type: "handling request"
            };
            if (bonus != 0) {
                data.total_cost = data.total_cost - bonus / 10;
            }           
            var loading = new Loading({ discription: 'Saving...' });            
            Accessoslo.API.SaveCharters(data, SaveComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var SendComplete = function (response){alert("send successed");$("#aircraft").val("");$(".estimate_cost").val("");$(".additional_fee").val("");$(".total_cost").val("");window.location = "/admin/handling-requests";};
    var Send = function (e) {
        e.preventDefault();
        var data1 = $(this).data('send');
        if($('#aircraft' + data1.id).val()){
            var data = {
                booking_no: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,            
                total_cost: total_cost,
                contact_person: data1.person,
                email: data1.email,
                charter_type: "handling request"
            };              
            var loading = new Loading({ discription: 'Sending...' });           
            Accessoslo.API.SendCharters(data, SendComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var viewDetails = function (e) {
        e.preventDefault();
        var data = $(this).data('source');     
        $("#airport").val(data.airport);   
        $("#company").val(data.company);$("#crew_config1").val(data.crew_config1);$("#crew_config2").val(data.crew_config2);$("#aircraft").val(data.aircraft);
        $("#flight_type").val(data.flight_type);$("#hotac").val(data.hotac);$("#catering").val(data.catering);$("#person").val(data.person);
        $("#inbound_flight").val(data.inbound_flight);$("#inbound_date").val(data.inbound_date);$("#inbound_orig").val(data.inbound_orig);
        $("#inbound_captain").val(data.inbound_captain);$("#inbound_utc").val(data.inbound_utc);$("#inbound_pax").val(data.inbound_pax);
        $("#outbound_flight").val(data.outbound_flight);$("#outbound_date").val(data.outbound_date);$("#outbound_orig").val(data.outbound_orig);
        $("#outbound_captain").val(data.outbound_captain);$("#outbound_utc").val(data.outbound_utc);$("#outbound_pax").val(data.outbound_pax);
        $("#comments").val(data.comments);
        $("#modal-handling-request").modal("show");
    };
    var close = function () {
        $("#modal-handling-request").modal("hide");
    };
    var SetComplete = function (response) {};
    var GetComplete = function (response) {     
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }      
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.private_badge != 0) {
            $(".private_badge").attr('style', "display:inline;");
            $(".private_badge").html(response.data.private_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "handling"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    var BonusComplete = function (response) { alert("bonus is saved."); };
    $('.send_bonus').click(function () {
        var data1 = $(this).data('send');
        if($('#total_bonus' + data1.id).val()) {
            var data = {
                email: data1.email,
                extra_bonus: $('#total_bonus' + data1.id).val()
            };
            Accessoslo.API.SaveExtraBonus(data, BonusComplete);
        }        
    });
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "handling"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".handling_badge").hide();
        $(".comments").click(viewDetails);
        $("#close").click(close);
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
        $(".save").click(Save);
        if (user.role_id == '0') {
            $(".send").click(Send);
        }
    };
    init();
};

Controllers.AdminPassenger = function () {    
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/air-search-passenger?startDate="+startDate+"&endDate="+endDate+"&search="+"search"}, 100); 
    }); 
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                          
            setTimeout(function () { window.location.href= "/admin/air-search-passenger?startDate="+startDate+"&endDate="+endDate+"&search="+search}, 50); 
        }
    });  
    var SetComplete = function (response) {};
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.private_badge != 0) {
            $(".private_badge").attr('style', "display:inline;");
            $(".private_badge").html(response.data.private_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "passenger"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "passenger"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".passenger_badge").hide();
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
    };
    init();
};

Controllers.AdminPrivate = function () {    
    var estimate_cost = ""; var additional_fee = "";  var total_cost = ""; var aircraft = ""; var bonus = ""; 
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate;
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/private-search-travel?startDate="+startDate+"&endDate="+endDate}, 100); 
    });    
    var viewComments = function (e) {
        e.preventDefault();
        var data = $(this).data('source');
        $("#name").html(data.first_name + " "+ data.last_name);
        $("#comments").html(data.comments);
        $("#modal-comment").modal("show");
        return false;
    };
    var SetComplete = function (response) {};
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }        
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "private"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    var GetInfoComplete = function (response) {
        if (response.data.charters) {
            $("#aircraft" + response.data.id).val(response.data.charters.aircraft);
            $("#estimate_cost" + response.data.id).val(response.data.charters.estimate_cost);
            $("#additional_fee" + response.data.id).val(response.data.charters.additional_fee);
            $("#total_cost" + response.data.id).val(response.data.charters.total_cost);
            estimate_cost = response.data.charters.estimate_cost;
            additional_fee = response.data.charters.additional_fee;
            total_cost = response.data.charters.total_cost;
            aircraft = response.data.charters.aircraft;
        } else {
            $("#estimate_cost").val("");
            $("#additional_fee").val("");
            $("#total_cost").val("");
        }
    };
    var getCheckBonus = function (response) {
        bonus = response.data.bonus;
        $("#total_bonus" + response.data.id).val(bonus);
    }
    $(".toggle").click(function () {
        var data = $(this).data('info');
        Accessoslo.API.CheckBonus(data, getCheckBonus);
        var send_data = { id: data.id, charter_type: "destination oslo" };        
        Accessoslo.API.GetCharters(send_data, GetInfoComplete);
    });
    $('input[name="estimate_cost"]').change(function(){estimate_cost = this.value; });
    $('input[name="additional_fee"]').change(function(){additional_fee = this.value; });
    $('input[name="total_cost"]').change(function(){total_cost = this.value;});
    $('select[name="aircraft"]').change(function (){aircraft = this.value;});
    var SaveComplete = function (response){window.location = "/admin/private-travel";};
    var Save = function (e) {
        e.preventDefault();
        var data1 = $(this).data('save');
        if (additional_fee == "") additional_fee = 0;       
        var cost = parseInt(estimate_cost) + parseInt(additional_fee); 
        if($('#aircraft' + data1.id).val()){    
            var data = {
                charter_id: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost: Math.round(cost + cost * 12 / 100),
                contact_person: data1.first_name + " " + data1.last_name,
                email: data1.email,
                author: user.first_name + " " + user.last_name,
                charter_type: "destination oslo"
            };
            if (bonus != 0) {
                data.total_cost = data.total_cost - bonus / 10;
            }          
            var loading = new Loading({ discription: 'Saving...' });            
            Accessoslo.API.SaveCharters(data, SaveComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var SendComplete = function (response){$("#aircraft").val("");$(".estimate_cost").val("");$(".additional_fee").val("");$(".total_cost").val("");window.location = "/admin/private-travel";};
    var Send = function (e) {
        e.preventDefault();
        var data1 = $(this).data('send');
        if($('#aircraft' + data1.id).val()){
            var data = {
                booking_no: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,            
                total_cost: total_cost,
                contact_person: data1.person,
                email: data1.email,
                charter_type: "destination oslo"
            };              
            var loading = new Loading({ discription: 'Sending...' });            
            Accessoslo.API.SendCharters(data, SendComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var BonusComplete = function (response) { alert("bonus is saved."); };
    $('.send_bonus').click(function () {
        var data1 = $(this).data('send');
        if($('#total_bonus' + data1.id).val()) {
            var data = {
                email: data1.email,
                extra_bonus: $('#total_bonus' + data1.id).val()
            };
            Accessoslo.API.SaveExtraBonus(data, BonusComplete);
        }        
    });
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "private"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".private_badge").hide();
        $(".save").click(Save);
        $(".send").click(Send);
        $(".view_comments").click(viewComments);
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
    };
    init();
};

Controllers.AdminEvent = function () {    
    var estimate_cost = ""; var additional_fee = "";  var total_cost = ""; var aircraft = ""; var bonus = ""; 
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate;
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/group-search-travel?startDate="+startDate+"&endDate="+endDate}, 100); 
    });    
    var viewComments = function (e) {
        e.preventDefault();
        var data = $(this).data('source');
        $("#name").html(data.first_name + " "+ data.last_name);
        $("#comments").html(data.comments);
        $("#modal-comment").modal("show");
        return false;
    };
    var SetComplete = function (response) {};
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.private_badge != 0) {
            $(".private_badge").attr('style', "display:inline;");
            $(".private_badge").html(response.data.private_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    var GetInfoComplete = function (response) {
        if (response.data.charters) {
            $("#aircraft" + response.data.id).val(response.data.charters.aircraft);
            $("#estimate_cost" + response.data.id).val(response.data.charters.estimate_cost);
            $("#additional_fee" + response.data.id).val(response.data.charters.additional_fee);
            $("#total_cost" + response.data.id).val(response.data.charters.total_cost);
            estimate_cost = response.data.charters.estimate_cost;
            additional_fee = response.data.charters.additional_fee;
            total_cost = response.data.charters.total_cost;
            aircraft = response.data.charters.aircraft;
        } else {
            $("#estimate_cost").val("");
            $("#additional_fee").val("");
            $("#total_cost").val("");
        }
    };
    var getCheckBonus = function (response) {
        bonus = response.data.bonus;
        $("#total_bonus" + response.data.id).val(bonus);
    }
    $(".toggle").click(function () {
        var data = $(this).data('info');
        Accessoslo.API.CheckBonus(data, getCheckBonus);
        var send_data = { id: data.id, charter_type: "event and group" };        
        Accessoslo.API.GetCharters(send_data, GetInfoComplete);
    });
    $('input[name="estimate_cost"]').change(function(){estimate_cost = this.value; });
    $('input[name="additional_fee"]').change(function(){additional_fee = this.value; });
    $('input[name="total_cost"]').change(function(){total_cost = this.value;});
    $('select[name="aircraft"]').change(function (){aircraft = this.value;});
    var SaveComplete = function (response){window.location = "/admin/group-travel";};
    var Save = function (e) {
        e.preventDefault();
        var data1 = $(this).data('save');
        if (additional_fee == "") additional_fee = 0;
        var cost = parseInt(estimate_cost) + parseInt(additional_fee); 
        if($('#aircraft' + data1.id).val()){    
            var data = {
                charter_id: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,
                total_cost: Math.round(cost + cost * 12 / 100),
                contact_person: data1.first_name + " " + data1.last_name,
                email: data1.email,
                author: user.first_name + " " + user.last_name,
                charter_type: "event and group"
            };
            if (bonus != 0) {
                data.total_cost = data.total_cost - bonus / 10;
            }          
            var loading = new Loading({ discription: 'Saving...' });            
            Accessoslo.API.SaveCharters(data, SaveComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var SendComplete = function (response){$("#aircraft").val("");$(".estimate_cost").val("");$(".additional_fee").val("");$(".total_cost").val("");window.location = "/admin/group-travel";};
    var Send = function (e) {
        e.preventDefault();
        var data1 = $(this).data('send');
        if($('#aircraft' + data1.id).val()){
            var data = {
                booking_no: data1.id,
                aircraft: aircraft,
                estimate_cost: estimate_cost,
                additional_fee: additional_fee,            
                total_cost: total_cost,
                contact_person: data1.person,
                email: data1.email,
                charter_type: "event and group"
            };              
            var loading = new Loading({ discription: 'Sending...' });            
            Accessoslo.API.SendCharters(data, SendComplete);
        } else {
            $('#aircraft' + data1.id).attr('style','border:1px solid #e21717');
        }
    };
    var BonusComplete = function (response) { alert("bonus is saved."); };
    $('.send_bonus').click(function () {
        var data1 = $(this).data('send');
        if($('#total_bonus' + data1.id).val()) {
            var data = {
                email: data1.email,
                extra_bonus: $('#total_bonus' + data1.id).val()
            };
            Accessoslo.API.SaveExtraBonus(data, BonusComplete);
        }        
    });
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".save").click(Save);
        $(".send").click(Send);
        $(".event_badge").hide();
        $(".view_comments").click(viewComments);
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
    };
    init();
};

Controllers.AdminCustomers = function () {
    var OnResponse = function (response) {        
        setTimeout(function () { window.location.href= "/admin/single-customer/" + response.data.user_id}, 100);        
    };
    var viewDetails = function () {
        var data = {'id': this.id,"destination": "get"};
        Accessoslo.API.getCustomer(data, OnResponse);
    };
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }      
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
    };
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
       $(".view_details").click(viewDetails); 
    };

    init();
};

Controllers.AdminSingleCustomer = function () {
    var OnResponse = function (response) {
        alert(response.data.gender + ". " + response.data.first_name + " " + response.data.last_name + "'s bonus point is " + response.data.bonus );
    };
    $(".give_bonus").click(function (e) {
        e.preventDefault();
        var data = {'email': user_email,"bonus": $(".total_bonus").val()};
        Accessoslo.API.giveBonus(data, OnResponse);
    });
    var init = function () {
        
    };
    init();
};

Controllers.AdminPartners = function () {
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                 
            setTimeout(function () { window.location = "/admin/partners-search?search="+search}, 50); 
        }
    });
    var addNew = function (e) {
        e.preventDefault();
        $("#phone").intlTelInput("setNumber", "");
        $("#partner_name").val("");
        $("#contact_person").val("");
        $("#email").val("");
        $("#post_box").val("");
        $("#site_url").val("");
        $("#partner_datepicker").val("");
        $("#coverage").val("");
        $("#avg_flight").val("");
        $("#operate_since").val("");
        $("#password").val("");
        $("#repassword").val("");
        $("#permission").prop("checked", false);
        $("input[name=optionvalidaoc][value=" + "yes" + "]").prop('checked', false); 
        $("input[name=optionvalidaoc][value=" + "no" + "]").prop('checked', false); 
        $("#modal-partners").modal('show');
    };
    var viewDetails = function (e) {
        e.preventDefault();
        var data = $(this).data('source');
        if(data.permission == "true") {
            $("#permission").prop("checked", true);         
        } else {
            $("#permission").prop("checked", false);
        }
        if(data.valid == "yes") {
            $("input[name=optionvalidaoc][value=" + data.valid + "]").prop('checked', true); 
        } else {
            $("input[name=optionvalidaoc][value=" + data.valid + "]").prop('checked', true); 
        }
        $("#phone").intlTelInput("setNumber", data.phone);
        $("#partner_name").val(data.partner_name);
        $("#contact_person").val(data.contact_person);
        $("#post_box").val(data.post_box);
        $("#site_url").val(data.site_url);
        $("#email").val(data.email);
        $("#partner_datepicker").val(data.last_audit);
        $("#coverage").val(data.coverage);
        $("#avg_flight").val(data.average_flight);
        $("#operate_since").val(data.operate_since);
        $("#modal-partners").modal('show');
    };
    var OnResponse = function (response) {
        setTimeout(function () { window.location = "/admin/partners" }, 100);        
    };
    var save = function (e) {
        e.preventDefault();
        var permission = ""; var valid = "";
        if($("#permission").is(":checked")) { permission = "true"; } else { permission = "false"; }
        if($("input[name=optionvalidaoc][value=" + "yes" + "]").is(":checked")) { valid = "true"; } else { valid = "false"; }
        if ($("#phone").intlTelInput("isValidNumber")) {
            var new_partner = {
                'first_name': $("#contact_person").val().split(" ")[0],
                'last_name': $("#contact_person").val().split(" ")[1],
                'phone': $("#phone").intlTelInput("getNumber"),
                'email': $("#email").val(),
                'post_box': $("#post_box").val(),
                'site_url': $("#site_url").val(),
                'password': $("#password").val(),
                'partner_name': $("#partner_name").val(),
                'contact_person': $("#contact_person").val(),
                'last_audit': $("#partner_datepicker").val(),
                'coverage': $("#coverage").val(),
                'average_flight': $("#avg_flight").val(),
                'operate_since': $("#operate_since").val(),
                'permission': permission,
                'valid': valid
            };
            Accessoslo.API.createPartner(new_partner, OnResponse);
            $("#modal-partners").modal('hide');
        } else {
            alert("Invalid phone number!");
        }
    };
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
    };
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".more_details").click(viewDetails); 
        $("#addNew").click(addNew);
        $("#save").click(save);
        $("#partner_datepicker").datepicker({showOtherMonths: true,selectOtherMonths: true});
        $("#phone").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });        
    };
    init();
};

Controllers.AdminEmptyLeg = function () {
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&search="+search;
        $(value).attr('href',href);
    });
    var is_changed = false;
    var changed_price = "";
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                          
            setTimeout(function () { window.location.href= "/admin/empty-leg-search?search="+search}, 50); 
        }
    });
    var New = function (e) {
        e.preventDefault();
        $("#is_new").show();
        $("#add").show();
        $("#is_edit").hide();
        $("#save").hide();
        $("#empty_phone").intlTelInput("setNumber", "");
        $("#partner_name").val("");
        $("#departure").val("");
        $("#email").val("");
        $("#flight_no").val("");
        $("#destination").val("");
        $("#empty_datepicker").val("");
        $("#empty_timepicker").val("");
        $("#aircraft").val("");
        $("#seats").val("");
        $("#price").val("");
        $("#modal-empty-leg").modal("show");
    };
    var responseSave = function (response) {
        setTimeout(function () { window.location = "/admin/empty-leg" }, 100);  
    };
    var Add = function (e) {
        e.preventDefault();
        if ($("#empty_phone").intlTelInput('isValidNumber') && $("#currency").val() !="") {
            var newEmptyLeg = {
                'partner_name': $("#partner_name").val(),
                'flight_no': $("#flight_no").val(),
                'email': $("#email").val(),
                'phone': $("#empty_phone").intlTelInput('getNumber'),
                'end_date': $("#empty_datepicker").val(),
                'end_time': $("#empty_timepicker").val(),
                'aircraft': $("#aircraft").val(),
                'seats': $("#seats").val(),
                'departure': $("#departure").val(),
                'destination': $("#destination").val(),
                'price': $("#price").val(),
                'currency': $("#currency").val(),
                'day': '',
                'month':'',
                'year': ''
            };
            var string = $("#empty_datepicker").val().split("/");
            newEmptyLeg.day = string[1]; newEmptyLeg.year = string[2]; 
            if (string[0] == "01") {newEmptyLeg.month = "January";} if (string[0] == "07") {newEmptyLeg.month = "July";}
            if (string[0] == "02") {newEmptyLeg.month = "Feburary";} if (string[0] == "08") {newEmptyLeg.month = "August";}
            if (string[0] == "03") {newEmptyLeg.month = "March";} if (string[0] == "09") {newEmptyLeg.month = "September";}
            if (string[0] == "04") {newEmptyLeg.month = "April";} if (string[0] == "10") {newEmptyLeg.month = "October";}
            if (string[0] == "05") {newEmptyLeg.month = "May";} if (string[0] == "11") {newEmptyLeg.month = "November";}
            if (string[0] == "06") {newEmptyLeg.month = "June";} if (string[0] == "12") {newEmptyLeg.month = "December";}
            Accessoslo.API.newEmptyLeg(newEmptyLeg, responseSave);
            $("#modal-empty-leg").modal("hide");
        } else {
            alert("Invalid phone number!");
        }        
    };
    var responseUpdate = function (response) {};
    var Save = function (e) {
        e.preventDefault();
        if ($("#empty_phone").intlTelInput('isValidNumber') && $("#currency").val() !="") {
            var newEmptyLeg = {
                'partner_name': $("#partner_name").val(),
                'flight_no': $("#flight_no").val(),
                'email': $("#email").val(),
                'phone': $("#empty_phone").intlTelInput('getNumber'),
                'end_date': $("#empty_datepicker").val(),
                'end_time': $("#empty_timepicker").val(),
                'aircraft': $("#aircraft").val(),
                'seats': $("#seats").val(),
                'departure': $("#departure").val(),
                'destination': $("#destination").val(),
                'price': $("#price").val(),
                'currency': $("#currency").val(),
                'day': '',
                'month':'',
                'year': ''
            };
            var string = $("#empty_datepicker").val().split("/");
            newEmptyLeg.day = string[1]; newEmptyLeg.year = string[2]; 
            if (string[0] == "01") {newEmptyLeg.month = "January";} if (string[0] == "07") {newEmptyLeg.month = "July";}
            if (string[0] == "02") {newEmptyLeg.month = "Feburary";} if (string[0] == "08") {newEmptyLeg.month = "August";}
            if (string[0] == "03") {newEmptyLeg.month = "March";} if (string[0] == "09") {newEmptyLeg.month = "September";}
            if (string[0] == "04") {newEmptyLeg.month = "April";} if (string[0] == "10") {newEmptyLeg.month = "October";}
            if (string[0] == "05") {newEmptyLeg.month = "May";} if (string[0] == "11") {newEmptyLeg.month = "November";}
            if (string[0] == "06") {newEmptyLeg.month = "June";} if (string[0] == "12") {newEmptyLeg.month = "December";}
            Accessoslo.API.saveEmptyLeg(newEmptyLeg, responseUpdate);
            $("#modal-empty-leg").modal("hide");
        } else {
            alert("Invaild phone number");
        }        
    };
    var Edit = function (e) {
        e.preventDefault();
        var data = $(this).data('source');
        $("#is_new").hide();
        $("#is_edit").show();
        $("#add").hide();
        $("#save").show();
        $("#is_partner").val(data.partner_name);
        $("#empty_phone").intlTelInput("setNumber", data.phone);
        $("#partner_name").val(data.partner_name);
        $("#departure").val(data.departure);
        $("#email").val(data.email);
        $("#flight_no").val(data.flight_no);
        $("#destination").val(data.destination);
        $("#empty_datepicker").val(data.end_date);
        $("#empty_timepicker").val(data.end_time);
        $("#aircraft").val(data.aircraft);
        $("#seats").val(data.seats);
        $("#price").val(data.price);
        $("#currency").val(data.currency);
        $("#modal-empty-leg").modal("show");

        $('#currency').on('change', function(e){
            e.preventDefault();       
            var currency = $("#currency").val();
            var endpoint = 'live'
            var access_key = 'b890b5deda16e0bed27628931e55c65c';            
            $.ajax({
                url: 'http://apilayer.net/api/' + endpoint + '?access_key=' + access_key,   
                dataType: 'jsonp',
                success: function(json) {                 
                    var old_currency = "USD" + data.currency;   
                    if (currency == "EUR") {    
                        if (is_changed) {
                            var price = changed_price * (json.quotes.USDEUR / json.quotes[old_currency]);                                                     
                            $("#price").val((Math.round(price)).toString());                              
                        } else {
                            var price = data.price * (json.quotes.USDEUR / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());        
                        }                                                        
                    } else  if (currency == "USD") { 
                        if (is_changed) {
                            var price = changed_price / json.quotes[old_currency];                            
                            $("#price").val((Math.round(price)).toString());  
                        } else {
                            var price = data.price / json.quotes[old_currency];                            
                            $("#price").val((Math.round(price)).toString());        
                        }                          
                    } else  if (currency == "NOK") {       
                        if (is_changed) {
                            var price = changed_price * (json.quotes.USDNOK / json.quotes[old_currency]);                            
                            $("#price").val((Math.round(price)).toString());  
                        } else {
                            var price = data.price * (json.quotes.USDNOK / json.quotes[old_currency]);                            
                            $("#price").val((Math.round(price)).toString());        
                        }                    
                    } else  if (currency == "GBP") {   
                        if (is_changed) {
                            var price = changed_price * (json.quotes.USDGBP / json.quotes[old_currency]);                            
                            $("#price").val((Math.round(price)).toString());  
                        } else {
                            var price = data.price * (json.quotes.USDGBP / json.quotes[old_currency]);                            
                            $("#price").val((Math.round(price)).toString());        
                        }                         
                    } else  if (currency == "CAD") {   
                        if (is_changed) {
                            var price = changed_price * (json.quotes.USDCAD / json.quotes[old_currency]);                           
                            $("#price").val((Math.round(price)).toString());  
                        } else {
                            var price = data.price * (json.quotes.USDCAD / json.quotes[old_currency]);                            
                            $("#price").val((Math.round(price)).toString());        
                        }                               
                    } else  if (currency == "AUD") {     
                        if (is_changed) {
                            var price = changed_price * (json.quotes.USDAUD / json.quotes[old_currency]);                           
                            $("#price").val((Math.round(price)).toString());  
                        } else {
                            var price = data.price * (json.quotes.USDAUD / json.quotes[old_currency]);                           
                            $("#price").val((Math.round(price)).toString());        
                        }                     
                    } else  if (currency == "CNY") {
                        if (is_changed) {
                            var price = changed_price * (json.quotes.USDCNY / json.quotes[old_currency]);                            
                            $("#price").val((Math.round(price)).toString());  
                        } else {
                            var price = data.price * (json.quotes.USDCNY / json.quotes[old_currency]);                           
                            $("#price").val((Math.round(price)).toString());        
                        }                          
                    } else  if (currency == "JPY") {
                        if (is_changed) {
                            var price = changed_price * (json.quotes.USDJPY / json.quotes[old_currency]);                            
                            $("#price").val((Math.round(price)).toString());  
                        } else {
                            var price = data.price * (json.quotes.USDJPY / json.quotes[old_currency]);                           
                            $("#price").val((Math.round(price)).toString());        
                        }                         
                    } else  if (currency == "DKK") {
                        if (is_changed) {
                            var price = changed_price * (json.quotes.USDDKK / json.quotes[old_currency]);                            
                            $("#price").val((Math.round(price)).toString());  
                        } else {
                            var price = data.price * (json.quotes.USDDKK / json.quotes[old_currency]);                            
                            $("#price").val((Math.round(price)).toString());        
                        }                               
                    }
                }
            });   
        }); 
        $('#price').on('change', function(e){
            e.preventDefault();       
            is_changed = true;
            changed_price = $('#price').val();
        }); 
    };
    var responseDelete = function (response) {
        setTimeout(function () { window.location = "/admin/empty-leg" }, 100);  
    };
    var Delete = function (e) {
        e.preventDefault();
        var data = {'id': $(this).data('id'),"destination": "get"};
        alert("Are you sure to delete?");
        Accessoslo.API.deleteEmptyLeg(data, responseDelete);
    };
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
    }; 
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $("#New").click(New);        
        $("#add").click(Add);
        $("#save").click(Save);
        $(".edit").click(Edit);
        $(".delete").click(Delete);
        $("#empty_timepicker").wickedpicker();
        $("#empty_datepicker").datepicker({showOtherMonths: true,selectOtherMonths: true});
        $("#currency").currencySelect();
        $("#empty_phone").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });        
    };
    init();    
};

Controllers.AdminEmptylegBooking = function () {
    var pagination_items = $(".pagination li a");    
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {  
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];           
        setTimeout(function () { window.location.href= "/admin/emptyleg-search-charter?startDate="+startDate+"&endDate="+endDate+"&search="+"search"}, 100); 
    });    
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                          
            setTimeout(function () { window.location.href= "/admin/emptyleg-search-charter?startDate="+startDate+"&endDate="+endDate+"&search="+search}, 50); 
        }
    });  
    var SetComplete = function (response) {};
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {$(".executive_badge").attr('style', "display:inline;");$(".executive_badge").html(response.data.executive_badge);}
        if (response.data.group_badge != 0) {$(".group_badge").attr('style', "display:inline;");$(".group_badge").html(response.data.group_badge);}
        if (response.data.helicopter_badge != 0) {$(".helicopter_badge").attr('style', "display:inline;");$(".helicopter_badge").html(response.data.helicopter_badge);}
        if (response.data.cargo_badge != 0) {$(".cargo_badge").attr('style', "display:inline;");$(".cargo_badge").html(response.data.cargo_badge);}
        if (response.data.meet_badge != 0) {$(".meet_badge").attr('style', "display:inline;");$(".meet_badge").html(response.data.meet_badge);}
        if (response.data.limousine_badge != 0) {$(".limousine_badge").attr('style', "display:inline;");$(".limousine_badge").html(response.data.limousine_badge);}
        if (response.data.handling_badge != 0) {$(".handling_badge").attr('style', "display:inline;");$(".handling_badge").html(response.data.handling_badge);}
        if (response.data.passenger_badge != 0) {$(".passenger_badge").attr('style', "display:inline;");$(".passenger_badge").html(response.data.passenger_badge);}
        if (response.data.private_badge != 0) {$(".private_badge").attr('style', "display:inline;");$(".private_badge").html(response.data.private_badge);}
        if (response.data.event_badge != 0) {$(".event_badge").attr('style', "display:inline;");$(".event_badge").html(response.data.event_badge);}
        var data = {"dest": "badgeshowing", "type": "emptyleg"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };    
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "emptyleg"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".emptyleg_badge").hide();
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
    };
    init();
};

Controllers.AdminPages = function () {   
    var Onnew = function (e) {
        e.preventDefault();
        setTimeout(function () {
            window.location.href = "/admin/single-page/" + 0
        }, 100);
    };
    var edit = function (e) {        
        e.preventDefault();     
        var id = $(this).data('id');   
        setTimeout(function () { window.location.href= "/admin/single-page/" + id}, 100);  
    };
    var deleteResponse = function (response) {
        setTimeout(function () { window.location.href= "/admin/pages"}, 100);  
    };
    var Ondelete = function (e) {
        e.preventDefault();
        var id = $(this).data('id');   
        var deleteData = {"dest": "delete page", "value": id}; 
        alert("Are you sure to delete page?");
        Accessoslo.API.deletePage(deleteData, deleteResponse);
    };
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
    };
    var init = function () {        
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".edit").click(edit);
        $(".delete").click(Ondelete);
        $(".new_page").click(Onnew);
    };
    init();
};

Controllers.AdminPosts = function () {
    var New = function (e) {
        e.preventDefault();
        setTimeout(function () { window.location.href= "/admin/single-post/new"}, 100);  
    };
    var edit = function (e) {        
        e.preventDefault();     
        var id = $(this).data('id');   
        setTimeout(function () { window.location.href= "/admin/single-post/" + id}, 100);  
    };
    var deleteResponse = function (response) {
        setTimeout(function () { window.location.href= "/admin/posts"}, 100);  
    };
    var Ondelete = function (e) {
        e.preventDefault();
        var id = $(this).data('id');    
        var deleteData = {"dest": "delete post", "id": id};
        alert("Do you really want to delete this post?");
        Accessoslo.API.deletePosts(deleteData, deleteResponse);
    };
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
    };
    var init = function() {
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".edit").click(edit);
        $(".delete").click(Ondelete);
        $(".new_post").click(New);
    };
    init();
};

Controllers.AdminAircraftCars = function() {
    Dropzone.autoDiscover = false;
    var id = "";
    var is_new = true;
    var parent_id = "";

    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {                 
            setTimeout(function () { window.location = "/admin/aircrafts-cars-search?search="+search}, 50); 
        }
    });
    var onImageUploadSuccess = function (file, response) {};
    var onSendingImage = function (file, xhr, formData) {  
        if (is_new) {    
            formData.append("id", id);
        } else {
            formData.append("id", parent_id);
        }
    };
    var createResponse = function (response) {
        if (is_new) {
            id = response.data.id;
            var dropzone = new Dropzone("#image-uploader", {
                url: "/aircraft-image",
                acceptedFiles: 'image/png, image/jpeg',
                headers: { 'X-CSRF-TOKEN': config.token }            
            });
            dropzone.on("sending", onSendingImage);
            dropzone.on("success", onImageUploadSuccess);
        }
    };
    var ImageUpload = function(e) {
        e.preventDefault();
        if($("#modal-form").valid()) {
            Dropzone.autoDiscover = true;
        }
    };
    $("#capacity").on('change', function () { 
        if (is_new) {
            var data = {
                partner_name: $("#partner_name").val(),
                type: $("#aircraft").val(),
                capacity: $("#capacity").val()
            };
            Accessoslo.API.createAircraft(data, createResponse);  
        }
    });
    $(".close").on('click', function() {
        for (let i=0; i<5; i++) {
            $('#img' + i).attr('src','');
        }
    });
    var deleteResponse = function(response) {alert("delete image successed!")};
    $("#delete1").on('click', function() {
        if($("#img0").attr("src") !="") {
            var url={url:$("#img0").attr("src")};
            Accessoslo.API.deleteAircraft(url, deleteResponse);
        }
    });
    $("#delete2").on('click', function() {
        if($("#img1").attr("src") !="") {
            var url={url:$("#img1").attr("src")};
            Accessoslo.API.deleteAircraft(url, deleteResponse);
        }
    });
    $("#delete3").on('click', function() {
        if($("#img2").attr("src") !="") {
            var url={url:$("#img2").attr("src")};
            Accessoslo.API.deleteAircraft(url, deleteResponse);
        }
    });
    $("#delete4").on('click', function() {
        if($("#img3").attr("src") !="") {
            var url={url:$("#img3").attr("src")};
            Accessoslo.API.deleteAircraft(url, deleteResponse);
        }
    });
    $("#delete5").on('click', function() {
        if($("#img4").attr("src") !="") {
            var url={url:$("#img4").attr("src")};
            Accessoslo.API.deleteAircraft(url, deleteResponse);
        }
    });
    var Create = function (e) {
        e.preventDefault();
        is_new = true;
        $("#is_new").show();
        $("#is_edit").hide();
        $("#add").show();
        $("#save").hide();
        $("#preview").hide();
        $("#modal-aircrafts").modal('show');
    }; 
    var Add = function (e) {
        e.preventDefault();
        if($("#modal-form").valid()) {
            Dropzone.autoDiscover = true;
            $("#modal-aircrafts").modal('hide');
        }
    };
    var getSuccess = function (response) {
        for (let i=0; i<response.data.counts; i++) {
            $('#img' + i).attr('src',response.data.urls[i].url);
        }
        $("#modal-aircrafts").modal('show');
    };
    var Edit = function (e) {
        is_new = false;
        e.preventDefault();
        $("#is_new").hide();$("#is_edit").show();$("#add").hide();$("#save").show();$("#preview").show();
        var data = $(this).data('source');
        parent_id = data.id;
        setTimeout(initDropzone, 100);
        $("#partner_name").val(data.partner_name);
        $("#aircraft").val(data.type);
        $("#capacity").val(data.capacity);      
        Accessoslo.API.getAircraftImage(data, getSuccess);  
    };
    var initDropzone = function () {
        if (!is_new) {
            var dropzone = new Dropzone("#image-uploader", {
                url: "/aircraft-image",
                acceptedFiles: 'image/png, image/jpeg',
                headers: { 'X-CSRF-TOKEN': config.token }            
            });
            dropzone.on("sending", onSendingImage);
            dropzone.on("success", onImageUploadSuccess);
        }       
    };
    var updateSuccess = function (response) {};
    var Save = function (e) {
        e.preventDefault();
        $("#modal-aircrafts").modal('hide');
        for (let i=0; i<5; i++) {
            $('#img' + i).attr('src','');
        }
        var data = {
            id: parent_id,
            partner_name: $("#partner_name").val(),
            type: $("#aircraft").val(),
            capacity: $("#capacity").val()
        };
        Accessoslo.API.updateAircraft(data, updateSuccess);  
    };
    var GetComplete = function (response) {
        if (response.data.executive_badge != 0) {
            $(".executive_badge").attr('style', "display:inline;");
            $(".executive_badge").html(response.data.executive_badge);
        }
        if (response.data.group_badge != 0) {
            $(".group_badge").attr('style', "display:inline;");
            $(".group_badge").html(response.data.group_badge);
        }
        if (response.data.helicopter_badge != 0) {
            $(".helicopter_badge").attr('style', "display:inline;");
            $(".helicopter_badge").html(response.data.helicopter_badge);
        }
        if (response.data.cargo_badge != 0) {
            $(".cargo_badge").attr('style', "display:inline;");
            $(".cargo_badge").html(response.data.cargo_badge);
        }
        if (response.data.meet_badge != 0) {
            $(".meet_badge").attr('style', "display:inline;");
            $(".meet_badge").html(response.data.meet_badge);
        }
        if (response.data.limousine_badge != 0) {
            $(".limousine_badge").attr('style', "display:inline;");
            $(".limousine_badge").html(response.data.limousine_badge);
        }
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }
        if (response.data.event_badge != 0) {
            $(".event_badge").attr('style', "display:inline;");
            $(".event_badge").html(response.data.event_badge);
        }
    }; 
    var init = function() {      
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete); 
        $(".create").click(Create);    
        $(".edit").click(Edit);
        $("#add").click(Add);
        $("#save").click(Save);
        $("#image-uploader").click(ImageUpload);
        $(".upload-image").attr('disabled', true);     
        $('#modal-form').validate({             
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        }); 
    };
    init();
};

Controllers.MemberPassengerSettings = function () {
    var OnSaveComplete = function (response) {
        alert("Add passenger is done!");
        setTimeout(function () { window.location = "/member/passenger-settings" }, 100);            
    };
    var AddPassenger = function (e) {
        e.preventDefault();
        if($("#input-form").valid()) {
            var new_passenger = {
                user_id: user.id,
                gender: $("#gender").val(),
                first_name: $("#first_name").val(),
                last_name: $("#last_name").val(),               
                birth: $("#birth").val(),
                nationality: $("#nationality").val()
            };  
            Accessoslo.API.SavePassenger(new_passenger, OnSaveComplete);
        } 
    };    
    var OnNoticeCount = function (response) {    
        $(".member_notice").attr("style", "display:inline;");
        $(".member_notice").html(response.data);      
    };
    var init = function () {
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        var data = {'id': user.id,"destination": "get",'email':user.email};  
        Accessoslo.API.getMemberNotice(data, OnNoticeCount);    
        $("#nationality").countrySelect({preferredCountries: ['no', 'se', 'gb', 'de', 'us']});
        $("#birth").datepicker({
            showOtherMonths: true,selectOtherMonths: true,
            onClose: function () {
                form.validate().element("#datepicker");
            }
        });        
        $("#add_passenger").click(AddPassenger);       
        $("#input-form").validate({
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });    
    };
    init();
};

Controllers.MemberManageAccount = function () {
    var OnCurrentPassword = function (response) {
        if (response.success) {
            alert("Your password is changed!");
        } else {
            alert("Old password does not match!");
        }         
    };
    var ChangePassword = function (e) {
        e.preventDefault();
        if($("#password_form").valid()) {
            if ($("#new_password").val() == $("#confirm_password").val()) {
                var send_data = {
                    user_id: user.id,
                    old_password: $("#current_password").val(),
                    new_password: $("#new_password").val()
                };
                Accessoslo.API.changePassword(send_data, OnCurrentPassword);
            } else {
                alert("Input a new password again.");
            }           
        } 
    };
    var OnSaveComplete = function (response) {
        alert("Sikkerhetsspørsmålene dine blir lagret helt.");
        $("#question1").val("");
        $("#pwd_que1").val("");
        $("#question2").val("");
        $("#pwd_que2").val("");
    };
    var Save = function (e) {
        e.preventDefault();
        if($("#security_form").valid()) {
            var questions = {
                "question1": $("#question1").val(),
                "pwd_que1": $("#pwd_que1").val(),
                "question2": $("#question2").val(),
                "pwd_que2": $("#pwd_que2").val(),
                "user_id": user.id
            };
            Accessoslo.API.saveQuestions(questions, OnSaveComplete);
        }       
    };
    var OnNoticeCount = function (response) {        
        $(".member_notice").attr("style", "display:inline;");
        $(".member_notice").html(response.data);        
    };
    var init = function () {
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        var data = {'id': user.id,"destination": "get",'email':user.email};  
        Accessoslo.API.getMemberNotice(data, OnNoticeCount);    
        $("#changePassword").click(ChangePassword);
        $("#save").click(Save);
        $("#password_form").validate({
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
        $("#security_form").validate({
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });    
    };
    init();
};

Controllers.MemberEmptyLeg = function () {
    var emptyleg = {};
    var flight_details = function(e) {
        var data = $(this).data('source');
        emptyleg = data;
        $("#from_airport_modal").html(data.departure);
        $("#to_airport_modal").html(data.destination);        
        if(data.currency == "GBP") {
            $("#price_modal").html("£" + data.price);
        } else if (data.currency == "EUR") {
            $("#price_modal").html("€" + data.price);
        } else if (data.currency == "CNY" || data.currency == "JPY") {
            $("#price_modal").html("¥" + data.price);
        } else if (data.currency == "NOK" || data.currency == "DKK") {
            $("#price_modal").html("Kr" + data.price);
        } else {
            $("#price_modal").html("$" + data.price);
        }
        var string = data.end_date.split("/");
        var month = "";
        if (string[0] == "01") {month = "January";} if (string[0] == "07") {month = "July";}
        if (string[0] == "02") {month = "Feburary";} if (string[0] == "08") {month = "August";}
        if (string[0] == "03") {month = "March";} if (string[0] == "09") {month = "September";}
        if (string[0] == "04") {month = "April";} if (string[0] == "10") {month = "October";}
        if (string[0] == "05") {month = "May";} if (string[0] == "11") {month = "November";}
        if (string[0] == "06") {month = "June";} if (string[0] == "12") {month = "December";}
        $("#status_modal").html("Available until " + string[1] + ", " + month + " " + string[2]);
        $("#modal_date_li").html(string[1] + "th" + " " + month + " " + string[2]);
        $("#modal_time_li").html(data.end_time);
        $("#modal_aircraft_li").html(data.aircraft);
        $("#modal_partner_li").html(data.partner_name);
        $("#modal_passenger_li").html(data.seats + " passengers");     
        $("#modal-empty-leg").modal("show");
    };
    var EmptyBookingComplete = function (response) {        
        console.log(response);
        // alert("Booking Emptyleg is completed! Please check your email. Thanks.");
    };
    var EmptylegBooking= function (e) {
        e.preventDefault();
        if ($("#request_form").valid()) {
            var emptyleg_data = {
                gender: $("#Mr").val(),
                contact_person: $("#contact_person").val(),
                phone: $("#phone").intlTelInput('getNumber'),
                email: $("#email").val(),
                company: $("#company").val(),
                departure: emptyleg.departure,
                destination: emptyleg.destination,
                end_date:emptyleg.end_date,
                end_time:emptyleg.end_time,
                partner_name:emptyleg.partner_name,
                aircraft:emptyleg.aircraft,
                price: emptyleg.price,
                currency: emptyleg.currency,
                is_add: '1'
            };       
            Accessoslo.API.emptybooking(emptyleg_data, EmptyBookingComplete); 
            $("#modal-empty-leg").modal("hide");
        }
    };
    var OnNoticeCount = function (response) {        
        $(".member_notice").attr("style", "display:inline;");
        $(".member_notice").html(response.data);    
    };
    $(".contact_us").click(function(e) {
        e.preventDefault();
        setTimeout(function () {
            window.location.href = "/about/contact-us"
        }, 50);
    });
    var init = function () {
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        var data = {'id': user.id,"destination": "get",'email':user.email};  
        Accessoslo.API.getMemberNotice(data, OnNoticeCount);    
        $(".flight_details").click(flight_details);   
        $(".request").click(EmptylegBooking); 
        $("#phone").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });     
        $('#request_form').validate({             
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });     
    };
    init();
};

Controllers.MemberDashboard = function () {
    var OnNoticeCount = function (response) {               
        $(".member_notice").attr("style", "display:inline;");
        $(".member_notice").html(response.data);
        $("#upcoming_notice").html(response.data);       
    };
    var init = function () {
        var data = {'id': user.id,"destination": "get",'email':user.email};    
        Accessoslo.API.getMemberNotice(data, OnNoticeCount);    
        $("#dashboard_list").attr('style', 'display: inline-block;');
    };
    init();
};

Controllers.carouselTab = function () {
    var content, pageWidth, current, totalPages;
    var navigateBack = function () {
        if (current > 0) {
            current--;
            if (current != 0) {
                $(".carousel-wrapper .navigation .next").removeClass("hidden").addClass("show");
            } else if (current == 0) {
                $(".carousel-wrapper .navigation .next").removeClass("hidden").addClass("show");                
            }
            navigate();
        }
    };
    var navigateNext = function () {
        if (current < totalPages - 1) {
            current++;
            if (current >= 0) {
                $(".carousel-wrapper .navigation .prev").removeClass("hidden").addClass("show");                
                if (current == totalPages - 1) {
                    $(".carousel-wrapper .navigation .next").addClass("hidden");
                }
            }
            navigate();
        }
    };
    var navigate = function () {
        content.css("left", -current * pageWidth);
    };
    var initNavigation = function () {
        current = 0;
        $(".carousel-wrapper .navigation .prev").click(navigateBack);
        $(".carousel-wrapper .navigation .next").click(navigateNext);
    };
    var init = function () {
        var itemsPerPage,widthItems;
        widthItems = $(".nav-tabs li").outerWidth();
        pageWidth = $(".carousel-tabs").outerWidth();
        itemsPerPage = Math.round(pageWidth / widthItems);
        content = $(".carousel-tabs .nav-tabs");
        totalPages = $(".nav-tabs li").length / itemsPerPage;
        content.css("width", totalPages * pageWidth);
        initNavigation();
        navigate();
    };
    init();
};

Controllers.MakeNewRequest = function () {
    var OnNoticeCount = function (response) {      
        $(".member_notice").attr("style", "display:inline;");
        $(".member_notice").html(response.data);
    };
    var init = function () {
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        var data = {'id': user.id,"destination": "get",'email':user.email};  
        Accessoslo.API.getMemberNotice(data, OnNoticeCount);  
        new Accessoslo.Controllers.carouselTab();
    };
    init();
};

Controllers.MemeberLimousine = function () {
    $("#continue").click(function () {
        if ($("#step1_form").valid()) {
          $(".step-1").attr('style', 'display:none');
          $(".step-2").attr('style', 'display:block');
        }
    });
    $("#type_car").on('change', function (e) {
        var car = this.value;
        var rate = current_rate.USDEUR / current_rate.USDNOK;     
        if ($("#type_zone").val() == "OsloToOSL" || $("#type_zone").val() == "OSLToOslo") {
            if (car == "S-klasse") { $("#price").html("Cost: 1500 kr"); $("#amount").val(Math.round(1500 * rate));}
            else if (car == "Viano") {$("#price").html("Cost: 2200 kr"); $("#amount").val(Math.round(2200 * rate));}
            else if (car == "Minibuss") {$("#price").html("Cost: 2900 kr"); $("#amount").val(Math.round(2900 * rate));}
        } else if ($("#type_zone").val() == "AskerToOSL" || $("#type_zone").val() == "OSLToAsker") {
            if (car == "S-klasse") { $("#price").html("Cost: 1900 kr"); $("#amount").val(Math.round(1900 * rate));}
            else if (car == "Viano") {$("#price").html("Cost: 2600 kr"); $("#amount").val(Math.round(2600 * rate));}
            else if (car == "Minibuss") {$("#price").html("Cost: 3500 kr"); $("#amount").val(Math.round(3500 * rate));}
        }
    });
    $("input[name='optradio']").change(function (e) {
        $(".radio").attr('style', 'border: none;');           
    });
    var onBookingComplete = function (response) {        
        $("#item_number").val(response.data.id);
        $(".limousine-form").submit();
    };
    $("#book").click(function (e) {        
        e.preventDefault();
        if ($("input[name='optradio']:checked").val() == undefined) {
            $(".radio").attr('style', 'border: 1px solid red;');
        }              
        if ($("#step2_form").valid()) {
            if($("#phone").intlTelInput("isValidNumber")) {
                var data= {
                    contact_person: $("#contact_person").val(),               
                    phone: $("#phone").intlTelInput("getNumber"),
                    email: $("#email").val(),
                    company: $("#company").val(),
                    date: $("#datepicker").val(),
                    type_car: $("#type_car").val(),
                    type_flight: $("input[name='optradio']:checked").val(),
                    from_address: $("#from_address").val(),
                    to_address: $("#to_address").val(),
                    comments: $("#comments").val(),
                    zone: $("#type_zone").val(),
                    total_cost: $("#amount").val()
                };                
                var loading = new Loading({ title: 'Please wait while paypal response.', discription: 'Loading...' });                
                Accessoslo.API.limousine_booking(data, onBookingComplete);
            } else {
                alert("You must fill in all fields.");
            }     
        }
        return false;
    });
    var getCurrency = function () {
        var endpoint = 'live'
        var access_key = 'b890b5deda16e0bed27628931e55c65c';    
        $.ajax({
            url: 'http://apilayer.net/api/' + endpoint + '?access_key=' + access_key,   
            dataType: 'jsonp',
            success: function(json) {                
                current_rate = {
                    USDEUR: json.quotes.USDEUR,
                    USDNOK: json.quotes.USDNOK                   
                };                
            }
        });        
    };
    var init = function () {
        getCurrency();
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        $("#datepicker").datepicker({
          showOtherMonths: true,selectOtherMonths: true,
          onClose: function () {
            $("#step1_form").validate().element("#datepicker");
          }
        });
        $("#phone").intlTelInput({
          allowDropdown: true,
          autoHideDialCode: false,
          autoPlaceholder: "polite",
          dropdownContainer: "body",
          preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
          utilsScript: "/js/vendor/utils.js"
        });
        $("#step1_form").validate({
          errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
        $("#step2_form").validate({
          errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
    };
    init();
};

Controllers.MemberMeetgreet = function () {
    $("#meet_continue").click(function (e) {
        if ($("#meet1_form").valid()) {
            if($("#meet_phone").intlTelInput("isValidNumber")) { 
                $("#meet1_form").attr('style', 'display:none');
                $("#meet2_form").attr('style', 'display:block');
            } else {
                alert("Invalid Phone number!");
            }
        }
    });
    $("#meet_travelers").on('change', function (e) {
        e.preventDefault();
        if ($(this).val() < 16) {
            $("#meet_book").attr('style', 'display:inline-block;');
            $("#meet_request").attr('style', 'display:none;');    
            $("#price").attr('style', 'display:inline-block;');        
            var price = $("#meet_travelers").val() * 50;
            $("#price").html("price: " + price + "€"); 
            $("#amount").val(price);                    
        } else {
            $("#meet_book").attr('style', 'display:none;');
            $("#meet_request").attr('style', 'display:inline-block;');
            $("#price").attr('style', 'display:none;');           
        }         
    });
    $("#meet_request").click(function (e) {
        e.preventDefault();
        var data = {
            "contact_person": $("#meet_contact_person").val(),
            "phone": $("#meet_phone").intlTelInput("getNumber"),
            "email": $("#meet_email").val(),
            "company": $("#meet_company").val(),
            "flight_number": $("#flight_number").val(),
            "airline": $("#airline").val(),
            "date": $("#meet_datepicker").val(),
            "time": $("#meet_timepicker").val(),
            "luggage": $("#meet_luggage").val(),
            "travelers": $("#meet_travelers").val(),
            "booking_reference": $("#booking_reference").val(),
            "meet_service": $("#meet_service").val(),
            "product": $("#meet_product").val(),
            "departure_time": $("#meet_departure_timepicker").val(),
            'connect_flight_number': $("#meet_flight_no").val(),
            "comments": $("#meet_comments").val()
        };              
        var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });   
        Accessoslo.API.meet_book(data, OnBookComplete);
        return false;     
    });
    $("#meet_book").click(function (e) {
        e.preventDefault();
        var loading = new Loading({ title: 'Please wait while paypal response.', discription: 'Loading...' });
        var data = {
            "contact_person": $("#meet_contact_person").val(),
            "phone": $("#meet_phone").intlTelInput("getNumber"),
            "email": $("#meet_email").val(),
            "company": $("#meet_company").val(),
            "flight_number": $("#flight_number").val(),
            "airline": $("#airline").val(),
            "date": $("#meet_datepicker").val(),
            "time": $("#meet_timepicker").val(),
            "luggage": $("#meet_luggage").val(),
            "travelers": $("#meet_travelers").val(),
            "booking_reference": $("#booking_reference").val(),
            "meet_service": $("#meet_service").val(),
            "product": $("#meet_product").val(),
            "departure_time": $("#meet_departure_timepicker").val(),
            'connect_flight_number': $("#meet_flight_no").val(),
            "comments": $("#meet_comments").val()
        };        
        Accessoslo.API.meet_book(data, RedirectToPaypal);        
        return false;
    });
    var OnBookComplete = function (response) {          
        setTimeout(function () { window.location = "/member/dashboard" }, 500);
    };
    var RedirectToPaypal = function (response) {
        $("#item_number").val(response.data.booking.id);
        $("#meet2_form").submit();
    };
    var init = function () {
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        $("#meet_datepicker").datepicker({
          showOtherMonths: true,selectOtherMonths: true,
          onClose: function () {
            $("#step2_form").validate().element("#meet_datepicker");
          }
        });
        $("#meet_timepicker").wickedpicker();
        $("#meet_departure_timepicker").wickedpicker();
        $("#meet_phone").intlTelInput({
          allowDropdown: true,
          autoHideDialCode: false,
          autoPlaceholder: "polite",
          dropdownContainer: "body",
          preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
          utilsScript: "/js/vendor/utils.js"
        });
        $("#meet1_form").validate({
          errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
        $("#meet2_form").validate({
          errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            }
        });
    };
    init();
};

Controllers.MemberRequestHistory = function () {
    var pagination_items = $(".pagination li a");
    pagination_items.each(function (index, value) {
        var href = $(value).attr('href') + "&type=" + charters + "&display_mode=" + display_mode;
        $(value).attr('href', href);
    });
    $('#charters').on('change', function(e){
        e.preventDefault();
        var charters = "";
        if ($("#charters").val() == "executive") {
            charters = "executive";
        } else if ($("#charters").val() == "group") {
            charters = "group";  
        } else if ($("#charters").val() == "helicopter") {
            charters = "helicopter";       
        } 
        setTimeout(function () { window.location.href= "/member/request-history-type/?type=" + charters + "&display_mode=" + display_mode}, 50);        
    });
    $('#currency').on('change', function(e){
        e.preventDefault();       
        var currency = $("#currency").val();
        var endpoint = 'live'
        var access_key = 'b890b5deda16e0bed27628931e55c65c';               
        $.ajax({
            url: 'http://apilayer.net/api/' + endpoint + '?access_key=' + access_key,   
            dataType: 'jsonp',
            success: function(json) {                           
                $( ".cost" ).each(function( index, element ) {
                    let val = $(this).data('val');
                    if (currency == "EUR") {  
                        $(this).html("€" + val);                                                        
                    } else  if (currency == "USD") {                        
                        $(this).html("$" + Math.round(val / json.quotes.USDEUR));                                
                    } else  if (currency == "NOK") {                        
                        $(this).html("kr" + Math.round(val * json.quotes.USDNOK / json.quotes.USDEUR));                                       
                    } else  if (currency == "GBP") {                          
                        $(this).html("£" + Math.round(val * json.quotes.USDGBP / json.quotes.USDEUR));                          
                    } else  if (currency == "CAD") {                          
                        $(this).html("$" + Math.round(val * json.quotes.USDCAD / json.quotes.USDEUR));                                              
                    } else  if (currency == "AUD") {                           
                        $(this).html("$" + Math.round(val * json.quotes.USDAUD / json.quotes.USDEUR));                  
                    } else  if (currency == "CNY") {                        
                        $(this).html("¥" + Math.round(val * json.quotes.USDCNY / json.quotes.USDEUR));                     
                    } else  if (currency == "JPY") {                   
                        $(this).html("¥" + Math.round(val * json.quotes.USDJPY / json.quotes.USDEUR));                       
                    } else  if (currency == "DKK") {                     
                        $(this).html("kr" + Math.round(val * json.quotes.USDDKK / json.quotes.USDEUR));                        
                    }  
                });                         
            }
        });   
    });    
    $(".new_request").on('click', function(e){
        e.preventDefault();
        setTimeout(function () {
            window.location.href = "/member/make-request"
        }, 50);
    });
    $('#display1').click(function (e) {
        display_mode = "mode1";
        setTimeout(function () {
            window.location.href = "/member/request-history-type?type=" + charters + "&display_mode=" + display_mode
        }, 50);
    });
    $('#display2').click(function (e) {
        display_mode = "mode2";
        setTimeout(function () {
            window.location.href = "/member/request-history-type?type=" + charters + "&display_mode=" + display_mode
        }, 50);
    });
    var BookingReceipt = function(e) {
        e.preventDefault();        
        var data = $(this).data("source");
        var string = data.created_at.split("-");
        var daystring = string[2].split(" ");
        var string1 = data.date.split("/");
        var month = "";
        if (string[1] == "01" || string1[0] == "01") {month = "January";} if (string[1] == "07" || string1[0] == "07") {month = "July";}
        if (string[1] == "02" || string1[0] == "02") {month = "Feburary";} if (string[1] == "08" || string1[0] == "08") {month = "August";}
        if (string[1] == "03" || string1[0] == "03") {month = "March";} if (string[1] == "09" || string1[0] == "09") {month = "September";}
        if (string[1] == "04" || string1[0] == "04") {month = "April";} if (string[1] == "10" || string1[0] == "10") {month = "October";}
        if (string[1] == "05" || string1[0] == "05") {month = "May";} if (string[1] == "11" || string1[0] == "11") {month = "November";}
        if (string[1] == "06" || string1[0] == "06") {month = "June";} if (string[1] == "12" || string1[0] == "12") {month = "December";}
        $("#created_date").html(daystring[0] + ", " + month + " " + string[0]);
        $("#created_time").html(daystring[1]);
        $("#travel_date").html(string1[1] + ", " + month + " " + string1[2]);
        if (data.booking_type == "executive") {
            $("#charter_type").html("Executive Aircraft Charter");
        } else if (data.booking_type == "group") {
            $("#charter_type").html("Group Aircraft Charter");
        } else if (data.booking_type == "helicopter") {
            $("#charter_type").html("Helicopter Aircraft Charter");
        }
        $("#booking_no").html(data.id);
        $("#departure").html(data.departure);
        $("#destination").html(data.destination);
        $("#travelers").html(data.travellers);
        $("#contact_person").html("Hi, " + data.contact_person + ". ");
        $("#invoice_no").html(data.id);
        $("#price").html("€" + data.total_cost);
        $("#bookingReceipt").modal("show");
    };
    var UpdateReviewResponse = function (response) {
        alert("Updating the review is completed!");
    };
    var reviewResponse = function (response) {
        alert("Sending the review is completed!");
    };
    $(".send_review").click(function(e) {
        e.preventDefault();
        var data_id = $(".flight_experience").attr('id');
        var review = {
            total_rate: $(".flight_experience").starRating('getRating'),
            highlight: $(".highlight").val(),
            atmosphere: $(".atmosphere").val(),
            testimonial: $(".testimonial").starRating('getRating'),            
            partner_name: $(".title").val(),
            customer_name: user.first_name + " " + user.last_name,
            data_id: data_id.substr(17,19)
        };
        console.log(review);
        // $("#writeReview").modal('hide');
        // if (new_review) {
        //     Accessoslo.API.saveReview(review, reviewResponse);    
        // } else {
        //     Accessoslo.API.updateReview(review, UpdateReviewResponse); 
        // }        
    });
    var GetReviewResponse = function (response) {
        if (response.data) {
            new_review = false;
            $("#flight_experience" + response.data.data_id).starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f", initialRating: response.data.total_rate});
            $("#testimonial" + response.data.data_id).starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f", initialRating: response.data.testimonial});
            $(".highlight").val(response.data.highlight);
            $(".atmosphere").val(response.data.atmosphere);
        } else {
            $("#flight_experience" + data_id).starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f" });
            $("#testimonial" + data_id).starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f" });           
            $(".highlight").val("");
            $(".atmosphere").val("");
        }
    };
    var WriteReview = function (e) {
        e.preventDefault();
        var data = $(this).data("source");    
        $(".title").html(data.partner_name);
        $(".title").val(data.partner_name);
        $(".total").html('<div class="flight_experience"></div>');
        $(".rank").html('<div class="testimonial"></div>');        
        $(".flight_experience").attr('id', "flight_experience" + data.id);
        $(".testimonial").attr('id', "testimonial" + data.id);
        data_id = data.id;
        var getReview = {
            contact_person: data.contact_person,
            data_id: data.id
        };
        Accessoslo.API.getReview(getReview, GetReviewResponse);
        $("#writeReview").modal('show');
    };
    var OnNoticeCount = function (response) {
        $(".member_notice").attr("style", "display:inline;");
        $(".member_notice").html(response.data);      
    };
    var init = function () {
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        var data = {'id': user.id,"destination": "get",'email':user.email};  
        Accessoslo.API.getMemberNotice(data, OnNoticeCount);    
        $("#currency").currencySelect();
        $(".booking_receipt").click(BookingReceipt);
        $(".write_review").click(WriteReview);
        if (display_mode == "mode1") {
            $(".item1").addClass('active');
        } else if (display_mode == "mode2") {
            $(".item2").addClass('active');
            $(".pagination").attr('style', 'position:absolute;bottom:-72px;left:14px;');
        }    
    };
    init();
};

Controllers.MemberUpcomingRequest = function () {  
    var new_review = true;  
    var data_id = "";
    let current_rate = {};
    let is_emptyleg = false;
    var pagination_items = $(".pagination li a");
    pagination_items.each(function (index, value) {
        var href = $(value).attr('href') + "&charter=" + type + "&status=" + "all-status" + "&show_mode=" + display_mode; 
        $(value).attr('href', href);
    });
    $('#charters').on('change', function(e){
        e.preventDefault();
        var charter = "";
        if ($("#charters").val() == "executive") {            
            charter = "executive"; 
        } else if ($("#charters").val() == "group") {
            charter = "group"; 
        } else if ($("#charters").val() == "helicopter") {
            charter = "helicopter";
        } if ($("#charters").val() == "emptyleg") {
            charter = "emptyleg"; 
            is_emptyleg = true;
        } else if ($("#charters").val() == "limousine") {
            charter = "limousine";
        } else if ($("#charters").val() == "handling") {
            charter = "handling"; 
        } else if ($("#charters").val() == "meet") {
            charter = "meet"; 
        } 
        setTimeout(function () {
            window.location.href = "/member/upcoming-request-type?charter=" + charter + "&status=" + "all-status" + "&show_mode=" + display_mode 
        }, 50);
    });
    $("#estimations").on('change', function (e) {
        e.preventDefault();
        var status = "";
        if ($("#estimations").val() == "awaiting") {            
            status = "awaiting"; 
        } else if ($("#estimations").val() == "sent") {
            status = "sent"; 
        } else if ($("#estimations").val() == "paid") {
            status = "paid";
        }
        setTimeout(function () {
            window.location.href = "/member/upcoming-request-type?charter=" + type + "&status=" + status + "&show_mode=" + display_mode 
        }, 50);
    });
    var getCurrency = function () {
        var endpoint = 'live'
        var access_key = 'b890b5deda16e0bed27628931e55c65c';    
        $.ajax({
            url: 'http://apilayer.net/api/' + endpoint + '?access_key=' + access_key,   
            dataType: 'jsonp',
            success: function(json) {                
                current_rate = {
                    USDEUR: json.quotes.USDEUR,
                    USDNOK: json.quotes.USDNOK,
                    USDGBP: json.quotes.USDGBP,
                    USDCAD: json.quotes.USDCAD,
                    USDAUD: json.quotes.USDAUD,
                    USDCNY: json.quotes.USDCNY,
                    USDJPY: json.quotes.USDJPY,
                    USDDKK: json.quotes.USDDKK
                };                
            }
        });        
    };
    $('#currency').on('change', function(e){
        e.preventDefault();
        var currency = $("#currency").val();
        $( ".cost" ).each(function( index, element ) {
            let val = $(this).data('val'); 
            let symbol = $(this).data('symbol');            
            if (currency == "EUR") {                  
                if (is_emptyleg) {
                    if (symbol == "1") { $(this).html("€" + Math.round(val * current_rate.USDEUR));}
                    if (symbol == "2") { $(this).html("€" + Math.round(val * current_rate.USDEUR / current_rate.USDCAD));}
                    if (symbol == "3") { $(this).html("€" + Math.round(val * current_rate.USDEUR / current_rate.USDAUD));}
                    if (symbol == "4") { $(this).html("€" + Math.round(val * current_rate.USDEUR / current_rate.USDCNY));}
                    if (symbol == "5") { $(this).html("€" + Math.round(val * current_rate.USDEUR / current_rate.USDJPY));}
                    if (symbol == "6") { $(this).html("€" + Math.round(val * current_rate.USDEUR / current_rate.USDDKK));}
                    if (symbol == "7") { $(this).html("€" + Math.round(val * current_rate.USDEUR / current_rate.USDNOK));}
                    if (symbol == "8") { $(this).html("€" + Math.round(val * current_rate.USDEUR / current_rate.USDGBP));}
                } else {
                    $(this).html("€" + val);
                }                
            } else  if (currency == "USD") {
                if (is_emptyleg) {        
                    if (symbol == "0") { $(this).html("$" + Math.round(val / current_rate.USDEUR)); }          
                    if (symbol == "1") { $(this).html("$" + val);}
                    if (symbol == "2") { $(this).html("$" + Math.round(val / current_rate.USDCAD));}
                    if (symbol == "3") { $(this).html("$" + Math.round(val / current_rate.USDAUD));}
                    if (symbol == "4") { $(this).html("$" + Math.round(val / current_rate.USDCNY));}
                    if (symbol == "5") { $(this).html("$" + Math.round(val / current_rate.USDJPY));}
                    if (symbol == "6") { $(this).html("$" + Math.round(val / current_rate.USDDKK));}
                    if (symbol == "7") { $(this).html("$" + Math.round(val / current_rate.USDNOK));}
                    if (symbol == "8") { $(this).html("$" + Math.round(val / current_rate.USDGBP));}
                } else {
                    $(this).html("$" + Math.round(val / current_rate.USDEUR));
                }                
            } else if (currency == "NOK") {
                if (is_emptyleg) {
                    if (symbol == "0") { $(this).html("kr" + Math.round(val * current_rate.USDNOK / current_rate.USDEUR));}
                    if (symbol == "1") { $(this).html("kr" + Math.round(val * current_rate.USDNOK));}
                    if (symbol == "2") { $(this).html("kr" + Math.round(val * current_rate.USDNOK / current_rate.USDCAD));}
                    if (symbol == "3") { $(this).html("kr" + Math.round(val * current_rate.USDNOK / current_rate.USDAUD));}
                    if (symbol == "4") { $(this).html("kr" + Math.round(val * current_rate.USDNOK / current_rate.USDCNY));}
                    if (symbol == "5") { $(this).html("kr" + Math.round(val * current_rate.USDNOK / current_rate.USDJPY));}
                    if (symbol == "6") { $(this).html("kr" + Math.round(val * current_rate.USDNOK / current_rate.USDDKK));}
                    if (symbol == "7") { $(this).html("kr" +val);}
                    if (symbol == "8") { $(this).html("kr" + Math.round(val * current_rate.USDNOK / current_rate.USDGBP));}
                } else {
                    $(this).html("kr" + Math.round(val * current_rate.USDNOK / current_rate.USDEUR));
                }                
            } else if (currency == "GBP") {
                if (is_emptyleg) {
                    if (symbol == "0") { $(this).html("£" + Math.round(val * current_rate.USDGBP / current_rate.USDEUR));}
                    if (symbol == "1") { $(this).html("£" + Math.round(val * current_rate.USDGBP));}
                    if (symbol == "2") { $(this).html("£" + Math.round(val * current_rate.USDGBP / current_rate.USDCAD));}
                    if (symbol == "3") { $(this).html("£" + Math.round(val * current_rate.USDGBP / current_rate.USDAUD));}
                    if (symbol == "4") { $(this).html("£" + Math.round(val * current_rate.USDGBP / current_rate.USDCNY));}
                    if (symbol == "5") { $(this).html("£" + Math.round(val * current_rate.USDGBP / current_rate.USDJPY));}
                    if (symbol == "6") { $(this).html("£" + Math.round(val * current_rate.USDGBP / current_rate.USDDKK));}
                    if (symbol == "7") { $(this).html("£" + Math.round(val * current_rate.USDGBP / current_rate.USDNOK));}
                    if (symbol == "8") { $(this).html("£" + val);}
                } else {
                    $(this).html("£" + Math.round(val * current_rate.USDGBP / current_rate.USDEUR));
                }
            } else if (currency == "CAD") {
                if (is_emptyleg) {
                    if (symbol == "0") { $(this).html("$" + Math.round(val * current_rate.USDCAD / current_rate.USDEUR));}
                    if (symbol == "1") { $(this).html("$" + Math.round(val * current_rate.USDCAD));}
                    if (symbol == "2") { $(this).html("$" + val);}
                    if (symbol == "3") { $(this).html("$" + Math.round(val * current_rate.USDCAD / current_rate.USDAUD));}
                    if (symbol == "4") { $(this).html("$" + Math.round(val * current_rate.USDCAD / current_rate.USDCNY));}
                    if (symbol == "5") { $(this).html("$" + Math.round(val * current_rate.USDCAD / current_rate.USDJPY));}
                    if (symbol == "6") { $(this).html("$" + Math.round(val * current_rate.USDCAD / current_rate.USDDKK));}
                    if (symbol == "7") { $(this).html("$" + Math.round(val * current_rate.USDCAD / current_rate.USDNOK));}
                    if (symbol == "8") { $(this).html("$" + Math.round(val * current_rate.USDCAD / current_rate.USDGBP));}
                } else {
                    $(this).html("$" + Math.round(val * current_rate.USDCAD / current_rate.USDEUR));
                }
            } else if (currency == "AUD") {
                if (is_emptyleg) {
                    if (symbol == "0") { $(this).html("$" + Math.round(val * current_rate.USDAUD / current_rate.USDEUR));}
                    if (symbol == "1") { $(this).html("$" + Math.round(val * current_rate.USDAUD));}
                    if (symbol == "2") { $(this).html("$" + Math.round(val * current_rate.USDAUD / current_rate.USDCAD));}
                    if (symbol == "3") { $(this).html("$" + val);}
                    if (symbol == "4") { $(this).html("$" + Math.round(val * current_rate.USDAUD / current_rate.USDCNY));}
                    if (symbol == "5") { $(this).html("$" + Math.round(val * current_rate.USDAUD / current_rate.USDJPY));}
                    if (symbol == "6") { $(this).html("$" + Math.round(val * current_rate.USDAUD / current_rate.USDDKK));}
                    if (symbol == "7") { $(this).html("$" + Math.round(val * current_rate.USDAUD / current_rate.USDNOK));}
                    if (symbol == "8") { $(this).html("$" + Math.round(val * current_rate.USDAUD / current_rate.USDGBP));}
                } else {                
                    $(this).html("$" + Math.round(val * current_rate.USDAUD / current_rate.USDEUR));
                }
            } else if (currency == "CNY") {
                if (is_emptyleg) {
                    if (symbol == "0") { $(this).html("¥" + Math.round(val * current_rate.USDCNY / current_rate.USDEUR));}
                    if (symbol == "1") { $(this).html("¥" + Math.round(val * current_rate.USDCNY));}
                    if (symbol == "2") { $(this).html("¥" + Math.round(val * current_rate.USDCNY / current_rate.USDCAD));}
                    if (symbol == "3") { $(this).html("¥" + Math.round(val * current_rate.USDCNY / current_rate.USDAUD));}
                    if (symbol == "4") { $(this).html("¥" + val);}
                    if (symbol == "5") { $(this).html("¥" + Math.round(val * current_rate.USDCNY / current_rate.USDJPY));}
                    if (symbol == "6") { $(this).html("¥" + Math.round(val * current_rate.USDCNY / current_rate.USDDKK));}
                    if (symbol == "7") { $(this).html("¥" + Math.round(val * current_rate.USDCNY / current_rate.USDNOK));}
                    if (symbol == "8") { $(this).html("¥" + Math.round(val * current_rate.USDCNY / current_rate.USDGBP));}
                } else {
                    $(this).html("¥" + Math.round(val * current_rate.USDCNY / current_rate.USDEUR));
                }
            } else if (currency == "JPY") {
                if (is_emptyleg) {
                    if (symbol == "0") { $(this).html("¥" + Math.round(val * current_rate.USDJPY / current_rate.USDEUR));}
                    if (symbol == "1") { $(this).html("¥" + Math.round(val * current_rate.USDJPY));}
                    if (symbol == "2") { $(this).html("¥" + Math.round(val * current_rate.USDJPY / current_rate.USDCAD));}
                    if (symbol == "3") { $(this).html("¥" + Math.round(val * current_rate.USDJPY / current_rate.USDAUD));}
                    if (symbol == "4") { $(this).html("¥" + Math.round(val * current_rate.USDJPY / current_rate.USDCNY));}
                    if (symbol == "5") { $(this).html("¥" + val);}
                    if (symbol == "6") { $(this).html("¥" + Math.round(val * current_rate.USDJPY / current_rate.USDDKK));}
                    if (symbol == "7") { $(this).html("¥" + Math.round(val * current_rate.USDJPY / current_rate.USDNOK));}
                    if (symbol == "8") { $(this).html("¥" + Math.round(val * current_rate.USDJPY / current_rate.USDGBP));}
                } else {                
                    $(this).html("¥" + Math.round(val * current_rate.USDJPY / current_rate.USDEUR));
                }
            } else if (currency == "DKK") {
                if (is_emptyleg) {
                    if (symbol == "0") { $(this).html("kr" + Math.round(val * current_rate.USDDKK / current_rate.USDEUR));}
                    if (symbol == "1") { $(this).html("kr" + Math.round(val * current_rate.USDDKK));}
                    if (symbol == "2") { $(this).html("kr" + Math.round(val * current_rate.USDDKK / current_rate.USDCAD));}
                    if (symbol == "3") { $(this).html("kr" + Math.round(val * current_rate.USDDKK / current_rate.USDAUD));}
                    if (symbol == "4") { $(this).html("kr" + Math.round(val * current_rate.USDDKK / current_rate.USDCNY));}
                    if (symbol == "5") { $(this).html("kr" + Math.round(val * current_rate.USDDKK / current_rate.USDDKK));}
                    if (symbol == "6") { $(this).html("kr" + val);}
                    if (symbol == "7") { $(this).html("kr" + Math.round(val * current_rate.USDDKK / current_rate.USDNOK));}
                    if (symbol == "8") { $(this).html("kr" + Math.round(val * current_rate.USDDKK / current_rate.USDGBP));}
                } else {
                    $(this).html("kr" + Math.round(val * current_rate.USDDKK / current_rate.USDEUR));
                }
            }  
        });                          
    });    
    $(".new_request").on('click', function (e) {
        e.preventDefault();
        setTimeout(function () {
            window.location.href = "/member/make-request"
        }, 50);
    });
    $('#display1').click(function(e) {
        display_mode = "mode1";      
        setTimeout(function () {
            window.location.href = "/member/upcoming-request-type?charter=" + type + "&status=" + "all-status" + "&show_mode=" + display_mode 
        }, 50);
    });
    $('#display2').click(function (e) {
        display_mode = "mode2";        
        setTimeout(function () {
            window.location.href = "/member/upcoming-request-type?charter=" + type + "&status=" + "all-status" + "&show_mode=" + display_mode 
        }, 50);
    });
    var UpdateReviewResponse = function (response) {
        alert("Updating the review is completed!");
    };
    var reviewResponse = function (response) {
        alert("Sending the review is completed!");
    };
    $(".send_review").click(function(e) {
        e.preventDefault();
        var data_id = $(".flight_experience").attr('id');
        var review = {
            total_rate: $(".flight_experience").starRating('getRating'),
            highlight: $(".highlight").val(),
            atmosphere: $(".atmosphere").val(),
            testimonial: $(".testimonial").starRating('getRating'),            
            partner_name: $(".title").val(),
            customer_name: user.first_name + " " + user.last_name,
            data_id: data_id.substr(17,19)
        };
        $("#writeReview").modal('hide');
        if (new_review) {
            Accessoslo.API.saveReview(review, reviewResponse);    
        } else {
            Accessoslo.API.updateReview(review, UpdateReviewResponse); 
        }        
    });
    $(".paypal").click(function (e) {
        e.preventDefault();
        $("#confirmRequest").modal('hide');
        var loading = new Loading({ title: 'Please waiting while response on paypal.', discription: 'Loading...' });
        $("#flight_form").submit();        
        return false;
    });
    var ConfirmPay = function (e) {
        e.preventDefault();        
        var data = $(this).data("source");        
        $("#confirm_booking_no").html(data.id);
        $("#item_number").val(data.id);
        $("#confirm_departure").html(data.departure);
        $("#confirm_destination").html(data.destination);
        $("#confirm_travelers").html(data.travellers);
        $("#confirm_contact_person").html("Hi, " + data.contact_person + ". ");
        var string = data.created_at.split("-");
        var daystring = string[2].split(" ");
        var string1 = "";
        if (data.booking_type == "executive") {
            $("#confirm_charter_type").html("Executive Aircraft Charter");
            $("#item").val("Executive Charter");
            $("#type").val("charters");
            string1 = data.date.split("/");
        } else if (data.booking_type == "group") {
            $("#confirm_charter_type").html("Group Aircraft Charter");
            $("#item").val("Group Charter");
            $("#type").val("charters");
            string1 = data.date.split("/");
        } else if (data.booking_type == "helicopter") {
            $("#confirm_charter_type").html("Helicopter Aircraft Charter");
            $("#item").val("Helicopter Charter");
            $("#type").val("charters");
            string1 = data.date.split("/");
        }        
        if ($(this).data('type') == "empty"){ 
            $("#confirm_charter_type").html("Emptyleg Charter");
            $("#item").val("Emptyleg Flight");
            $("#type").val("empty");
            string1 = data.end_date.split("/");
        }
        if ($(this).data('type') == "meet"){ 
            $("#confirm_charter_type").html("Meet & Greet");
            $("#type").val("meet");
            $("#item").val("Meet & Greet");
            string1 = data.date.split("/");
            $("#confirm_travelers").html(data.travelers);
            $("#conform_from").html('Meet Service');
            $("#conform_to").html('Luggage');
            $("#confirm_departure").html(data.meet_service);
            $("#confirm_destination").html(data.luggage);
        }
        if ($(this).data('type') == "limousine"){
            $("#confirm_charter_type").html("Limousine Transport Charter");
            $("#item").val("Limousine Transport");
            $("#type").val("limousine");
            $("#confirm_departure").html(data.from_address);
            $("#confirm_destination").html(data.to_address);
            $("#last_tag").html("Type of Car");
            $("#confirm_travelers").html(data.type_car);
        }
        if ($(this).data('type') == "handling"){
            $("#confirm_charter_type").html("Handling Request");
            $("#item").val("Handling Request");
            $("#type").val("handling");
            string1 = data.inbound_date.split("/");
            $("#confirm_from").html('Airport');
            $("#confirm_to").html('Aircraft');
            $("#confirm_departure").html(data.airport);
            $("#confirm_destination").html(data.aircraft);
            $("#last_tag").html("Company");
            $("#confirm_travelers").html(data.company);
            $("#confirm_contact_person").html("Hi, " + data.person + ". ");
        }
        var month = "";

        if (string[1] == "01" ) {month = "January";} if (string[1] == "07" ) {month = "July";}
        if (string[1] == "02" ) {month = "Feburary";} if (string[1] == "08" ) {month = "August";}
        if (string[1] == "03" ) {month = "March";} if (string[1] == "09" ) {month = "September";}
        if (string[1] == "04" ) {month = "April";} if (string[1] == "10" ) {month = "October";}
        if (string[1] == "05" ) {month = "May";} if (string[1] == "11" ) {month = "November";}
        if (string[1] == "06" ) {month = "June";} if (string[1] == "12" ) {month = "December";}
        $("#confirm_created_date").html(daystring[0] + ", " + month + " " + string[0]);
        $("#confirm_created_time").html(daystring[1]);
        if (string1[0] == "01") {month = "January";} if (string1[0] == "07") {month = "July";}
        if (string1[0] == "02") {month = "Feburary";} if (string1[0] == "08") {month = "August";}
        if (string1[0] == "03") {month = "March";} if (string1[0] == "09") {month = "September";}
        if (string1[0] == "04") {month = "April";} if (string1[0] == "10") {month = "October";}
        if (string1[0] == "05") {month = "May";} if (string1[0] == "11") {month = "November";}
        if (string1[0] == "06") {month = "June";} if (string1[0] == "12") {month = "December";}
        $("#confirm_travel_date").html(string1[1] + ", " + month + " " + string1[2]);
        
        if ($(this).data('type') == "empty"){
            if (data.currency == "EUR") {
                $("#confirm_price").html("€" + data.price);
                $("#amount").val(data.price);
            } else if (data.currency == "USD" ) {                
                $("#confirm_price").html("$" + data.price);
                $("#amount").val(Math.round(data.price * current_rate.USDEUR)); 
            } else if (data.currency == "CAD" ) {
                $("#confirm_price").html("$" + data.price);
                $("#amount").val(Math.round(data.price * current_rate.USDEUR / current_rate.USDCAD));
            } else if (data.currency == "AUD" ) {
                $("#confirm_price").html("$" + data.price);
                $("#amount").val(Math.round(data.price * current_rate.USDEUR / current_rate.USDAUD)); 
            } else if (data.currency == "CNY" ) {
                $("#confirm_price").html("¥" + data.price);
                $("#amount").val(Math.round(data.price * current_rate.USDEUR / current_rate.USDCNY)); 
            } else if (data.currency == "JPY" ) {
                $("#confirm_price").html("¥" + data.price);
                $("#amount").val(Math.round(data.price * current_rate.USDEUR / current_rate.USDJPY));
            } else if (data.currency == "NOK" ) {
                $("#confirm_price").html("kr" + data.price);
                $("#amount").val(Math.round(data.price * current_rate.USDEUR / current_rate.USDNOK));
            } else if (data.currency == "DKK" ) {
                $("#confirm_price").html("kr" + data.price);
                $("#amount").val(Math.round(data.price * current_rate.USDEUR / current_rate.USDDKK));
            } else if (data.currency == "GBP" ) {
                $("#confirm_price").html("£" + data.price);
                $("#amount").val(Math.round(data.price * current_rate.USDEUR / current_rate.USDGBP));
            }            
        } else {
            $("#confirm_price").html("€" + data.total_cost);
            $("#amount").val(data.total_cost);
        }  
        $("#request_no").val(data.id);
        $("#confirmRequest").modal('show');
    };
    var ViewDetails = function (e) {
        e.preventDefault();
        $("#title1").html("VIEW");$("#title2").html("DETAILS");
        var data = $(this).data("source");
        var string = data.created_at.split("-");
        var daystring = string[2].split(" ");
        var string1 = data.date.split("/");
        var month = "";
        if (string[1] == "01" || string1[0] == "01") {month = "January";} if (string[1] == "07" || string1[0] == "07") {month = "July";}
        if (string[1] == "02" || string1[0] == "02") {month = "Feburary";} if (string[1] == "08" || string1[0] == "08") {month = "August";}
        if (string[1] == "03" || string1[0] == "03") {month = "March";} if (string[1] == "09" || string1[0] == "09") {month = "September";}
        if (string[1] == "04" || string1[0] == "04") {month = "April";} if (string[1] == "10" || string1[0] == "10") {month = "October";}
        if (string[1] == "05" || string1[0] == "05") {month = "May";} if (string[1] == "11" || string1[0] == "11") {month = "November";}
        if (string[1] == "06" || string1[0] == "06") {month = "June";} if (string[1] == "12" || string1[0] == "12") {month = "December";}
        $("#created_date").html(daystring[0] + ", " + month + " " + string[0]);
        $("#created_time").html(daystring[1]);
        $("#travel_date").html(string1[1] + ", " + month + " " + string1[2]);
        if (data.booking_type == "executive") {
            $("#charter_type").html("Executive Aircraft Charter");
        } else if (data.booking_type == "group") {
            $("#charter_type").html("Group Aircraft Charter");
        } else if (data.booking_type == "helicopter") {
            $("#charter_type").html("Helicopter Aircraft Charter");
        } 
        $("#booking_no").html(data.id);
        $("#departure").html(data.departure);
        $("#destination").html(data.destination);
        $("#travelers").html(data.travellers);        
        $("#contact_person").html("Hi, " + data.contact_person + ". ");
        $("#price").html("€" + data.total_cost);
        $("#viewDetails").modal('show');
    };
    var CancelRequest = function (e) {
        e.preventDefault();
        var data = $(this).data("source");
        var type = $(this).data("type");        
        $(".cancel").attr('target', data.id);
        $(".cancel").attr('name', type);
        $("#cancelRequest").modal('show');
    };
    var GetReviewResponse = function (response) {
        if (response.data) {
            new_review = false;
            $("#flight_experience" + response.data.data_id).starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f", initialRating: response.data.total_rate});
            $("#testimonial" + response.data.data_id).starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f", initialRating: response.data.testimonial});
            $(".highlight").val(response.data.highlight);
            $(".atmosphere").val(response.data.atmosphere);
        } else {
            $("#flight_experience" + data_id).starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f" });
            $("#testimonial" + data_id).starRating({ starSize: 20, starShape: 'rounded', ratedFill: "#f1c40f" });           
            $(".highlight").val("");
            $(".atmosphere").val("");
        }
    };
    var WriteReview = function (e) {
        e.preventDefault();
        var data = $(this).data("source");
        $(".title").html(data.partner_name);
        $(".title").val(data.partner_name);
        $(".total").html('<div class="flight_experience"></div>');
        $(".rank").html('<div class="testimonial"></div>');        
        $(".flight_experience").attr('id', "flight_experience" + data.id);
        $(".testimonial").attr('id', "testimonial" + data.id);
        data_id = data.id;
        var getReview = {
            contact_person: data.contact_person,
            data_id: data.id
        };        
        Accessoslo.API.getReview(getReview, GetReviewResponse);
        $("#writeReview").modal('show');
    };
    var BookingReceipt = function (e) {
        e.preventDefault();
        $("#title1").html("BOOKING");$("#title2").html("RECEIPT");
        var data = $(this).data("source");
        var string = data.created_at.split("-");
        var daystring = string[2].split(" ");
         
        var string1 = data.date.split("/");
        
        var month = "";
        if (string[1] == "01" || string1[0] == "01") {month = "January";} if (string[1] == "07" || string1[0] == "07") {month = "July";}
        if (string[1] == "02" || string1[0] == "02") {month = "Feburary";} if (string[1] == "08" || string1[0] == "08") {month = "August";}
        if (string[1] == "03" || string1[0] == "03") {month = "March";} if (string[1] == "09" || string1[0] == "09") {month = "September";}
        if (string[1] == "04" || string1[0] == "04") {month = "April";} if (string[1] == "10" || string1[0] == "10") {month = "October";}
        if (string[1] == "05" || string1[0] == "05") {month = "May";} if (string[1] == "11" || string1[0] == "11") {month = "November";}
        if (string[1] == "06" || string1[0] == "06") {month = "June";} if (string[1] == "12" || string1[0] == "12") {month = "December";}
        $("#created_date").html(daystring[0] + ", " + month + " " + string[0]);
        $("#created_time").html(daystring[1]);
        $("#travel_date").html(string1[1] + ", " + month + " " + string1[2]);
        if (data.booking_type == "executive") {
            $("#charter_type").html("Executive Aircraft Charter");
        } else if (data.booking_type == "group") {
            $("#charter_type").html("Group Aircraft Charter");
        } else if (data.booking_type == "helicopter") {
            $("#charter_type").html("Helicopter Aircraft Charter");
        }
        $("#booking_no").html(data.id);
        $("#departure").html(data.departure);
        $("#destination").html(data.destination);
        $("#travelers").html(data.travellers);
        $("#contact_person").html("Hi, " + data.contact_person + ". ");
        $("#price").html("€" + data.total_cost);

        $("#viewDetails").modal('show');
    };
    var HandlingViewDetails = function (e) {
        e.preventDefault();
        var data = $(this).data("source");
        if (data.status == "awaiting") {
            $("#handling_title1").html("VIEW");$("#handling_title2").html("DETAILS");
            $(".total-box").attr('style', 'display:none;');
        } else {
            $("#handling_title1").html("BOOKING");$("#handling_title2").html("RECEIPT"); 
            $("#handling_price").html("€" + data.total_cost);           
        }
        var string = data.created_at.split("-");
        var daystring = string[2].split(" ");
        var string1 = data.inbound_date.split("/");        
        var month = "";
        if (string[1] == "01" || string1[0] == "01") {month = "January";} if (string[1] == "07" || string1[0] == "07") {month = "July";}
        if (string[1] == "02" || string1[0] == "02") {month = "Feburary";} if (string[1] == "08" || string1[0] == "08") {month = "August";}
        if (string[1] == "03" || string1[0] == "03") {month = "March";} if (string[1] == "09" || string1[0] == "09") {month = "September";}
        if (string[1] == "04" || string1[0] == "04") {month = "April";} if (string[1] == "10" || string1[0] == "10") {month = "October";}
        if (string[1] == "05" || string1[0] == "05") {month = "May";} if (string[1] == "11" || string1[0] == "11") {month = "November";}
        if (string[1] == "06" || string1[0] == "06") {month = "June";} if (string[1] == "12" || string1[0] == "12") {month = "December";}
        $("#handling_created_date").html(daystring[0] + ", " + month + " " + string[0]);
        $("#handling_created_time").html(daystring[1]);
        $("#handling_travel_date").html(string1[1] + ", " + month + " " + string1[2]);       
        $("#handling_booking_no").html(data.id);
        $("#handling_airport").html(data.airport);
        $("#handling_parnter_name").html(data.partner_name);
        $("#handling_aircraft").html(data.aircraft);
        $("#handling_contact_person").html("Hi, " + data.person + ". ");
        $("#HandlingViewDetails").modal('show');
    };
    var LimousineViewDetails = function (e) {
        e.preventDefault();
        var data = $(this).data("source");
        if (data.status == "awaiting") {
            $("#limousine_title1").html("VIEW");$("#limousine_title2").html("DETAILS");
            $(".total-box").attr('style', 'display:none;');
        } else {
            $("#limousine_title1").html("BOOKING");$("#limousine_title2").html("RECEIPT"); 
            $("#limousine_price").html("€" + data.total_cost);           
        }
        var string = data.created_at.split("-");
        var daystring = string[2].split(" ");
        var string1 = data.date.split("/");        
        var month = "";
        if (string[1] == "01" || string1[0] == "01") {month = "January";} if (string[1] == "07" || string1[0] == "07") {month = "July";}
        if (string[1] == "02" || string1[0] == "02") {month = "Feburary";} if (string[1] == "08" || string1[0] == "08") {month = "August";}
        if (string[1] == "03" || string1[0] == "03") {month = "March";} if (string[1] == "09" || string1[0] == "09") {month = "September";}
        if (string[1] == "04" || string1[0] == "04") {month = "April";} if (string[1] == "10" || string1[0] == "10") {month = "October";}
        if (string[1] == "05" || string1[0] == "05") {month = "May";} if (string[1] == "11" || string1[0] == "11") {month = "November";}
        if (string[1] == "06" || string1[0] == "06") {month = "June";} if (string[1] == "12" || string1[0] == "12") {month = "December";}
        $("#limousine_created_date").html(daystring[0] + ", " + month + " " + string[0]);
        $("#limousine_created_time").html(daystring[1]);
        $("#limousine_travel_date").html(string1[1] + ", " + month + " " + string1[2]);       
        $("#limousine_booking_no").html(data.id);
        $("#limousine_from_address").html(data.from_address);
        $("#limousine_to_address").html(data.to_address);
        $("#limousine_type_car").html(data.type_car);
        $("#limousine_contact_person").html("Hi, " + data.contact_person + ". ");
        $("#LimousineViewDetails").modal('show');
    };
    var MeetViewDetails = function (e) {
        e.preventDefault();
        var data = $(this).data("source");
        if (data.status == "awaiting") {
            $("#meet_title1").html("VIEW");$("#meet_title2").html("DETAILS");
            $(".total-box").attr('style', 'display:none;');
        } else {
            $("#meet_title1").html("BOOKING");$("#meet_title2").html("RECEIPT"); 
            $("#meet_price").html("€" + data.total_cost);           
        }
        var string = data.created_at.split("-");
        var daystring = string[2].split(" ");
        var string1 = data.date.split("/");        
        var month = "";
        if (string[1] == "01" || string1[0] == "01") {month = "January";} if (string[1] == "07" || string1[0] == "07") {month = "July";}
        if (string[1] == "02" || string1[0] == "02") {month = "Feburary";} if (string[1] == "08" || string1[0] == "08") {month = "August";}
        if (string[1] == "03" || string1[0] == "03") {month = "March";} if (string[1] == "09" || string1[0] == "09") {month = "September";}
        if (string[1] == "04" || string1[0] == "04") {month = "April";} if (string[1] == "10" || string1[0] == "10") {month = "October";}
        if (string[1] == "05" || string1[0] == "05") {month = "May";} if (string[1] == "11" || string1[0] == "11") {month = "November";}
        if (string[1] == "06" || string1[0] == "06") {month = "June";} if (string[1] == "12" || string1[0] == "12") {month = "December";}
        $("#meet_created_date").html(daystring[0] + ", " + month + " " + string[0]);
        $("#meet_created_time").html(daystring[1]);
        $("#meet_travel_date").html(string1[1] + ", " + month + " " + string1[2]);       
        $("#meet_booking_no").html(data.id);
        $("#meet_travel_time").html(data.time);
        $("#meet_flight_no").html(data.flight_number);
        $("#meet_luggage").html(data.luggage);
        $("#meet_travelers").html(data.travelers);
        $("#meet_contact_person").html("Hi, " + data.contact_person + ". ");
        $("#MeetViewDetails").modal('show');
    };
    var EmptylegViewDetails = function (e) {
        e.preventDefault();
        var data = $(this).data("source");
        if (data.status == "sent") {
            $("#empty_title1").html("VIEW");$("#empty_title2").html("DETAILS");
            $(".total-box").attr('style', 'display:none;');
        } else  if (data.status == "paid") {
            $("#empty_title1").html("BOOKING");$("#empty_title2").html("RECEIPT"); 
            $("#empty_price").html("€" + data.price);           
        }
        var string = data.created_at.split("-");
        var daystring = string[2].split(" ");
        var string1 = data.end_date.split("/");        
        var month = "";
        if (string[1] == "01" || string1[0] == "01") {month = "January";} if (string[1] == "07" || string1[0] == "07") {month = "July";}
        if (string[1] == "02" || string1[0] == "02") {month = "Feburary";} if (string[1] == "08" || string1[0] == "08") {month = "August";}
        if (string[1] == "03" || string1[0] == "03") {month = "March";} if (string[1] == "09" || string1[0] == "09") {month = "September";}
        if (string[1] == "04" || string1[0] == "04") {month = "April";} if (string[1] == "10" || string1[0] == "10") {month = "October";}
        if (string[1] == "05" || string1[0] == "05") {month = "May";} if (string[1] == "11" || string1[0] == "11") {month = "November";}
        if (string[1] == "06" || string1[0] == "06") {month = "June";} if (string[1] == "12" || string1[0] == "12") {month = "December";}
        $("#empty_created_date").html(daystring[0] + ", " + month + " " + string[0]);
        $("#empty_created_time").html(daystring[1]);
        $("#empty_travel_date").html(string1[1] + ", " + month + " " + string1[2]);       
        $("#empty_booking_no").html(data.id);
        $("#empty_travel_time").html(data.end_time);
        $("#empty_from_airport").html(data.departure);
        $("#empty_to_airport").html(data.destination);
        $("#empty_aircraft").html(data.aircraft);
        $("#empty_contact_person").html("Hi, " + data.contact_person + ". ");
        $("#EmptylegViewDetails").modal('show');
    };
    var OnDeleteResponse = function (response) {        
        alert("Delete the request was success!");
        if (response.data.data == "limousine") {
            setTimeout(function () { window.location.href= "/member/upcoming-request/limousine"}, 50);
        } else if (response.data.data == "handling") {
            setTimeout(function () { window.location.href= "/member/upcoming-request/handling"}, 50);
        } else if (response.data.data == "meet") {
            setTimeout(function () { window.location.href= "/member/upcoming-request/meet"}, 50);
        } else if (response.data.data == "executive") {
            setTimeout(function () { window.location.href= "/member/upcoming-request/executive"}, 50);
        } else if (response.data.data == "group") {
            setTimeout(function () { window.location.href= "/member/upcoming-request/group"}, 50);
        } else if (response.data.data == "helicopter") {
            setTimeout(function () { window.location.href= "/member/upcoming-request/helicopter"}, 50);
        }
    }
    var DeleteRequests = function (e) {
        e.preventDefault();
        var target = $(".cancel").attr('target');
        var type = $(".cancel").attr('name');        
        var data = {type: type, target:target};
        if (type == 'limousine') {
            Accessoslo.API.DeleteLimousine(data, OnDeleteResponse);       
        } else if (type == 'handling') {
            Accessoslo.API.DeleteHandling(data, OnDeleteResponse);       
        } else if (type == 'meet') {
            Accessoslo.API.DeleteMeet(data, OnDeleteResponse);       
        } else if (type == 'executive' || type == 'group' || type == 'helicopter') {
            Accessoslo.API.DeleteCharters(data, OnDeleteResponse);       
        } 
        $("#cancelRequest").modal('hide');
    };
    var OnNoticeCount = function (response) {        
        $(".member_notice").attr("style", "display:inline;");
        $(".member_notice").html(response.data);
    };
    var init = function () {    
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');        
        var data = {
            'id': user.id,
            "destination": "get",
            'email': user.email
        };
        Accessoslo.API.getMemberNotice(data, OnNoticeCount);
        $(".cancel").click(DeleteRequests);
        $("#currency").currencySelect();
        $(".confirm_pay").click(ConfirmPay);
        $(".view_details").click(ViewDetails);
        $(".cancel_request").click(CancelRequest);
        $(".write_review").click(WriteReview);
        $(".booking_receipt").click(BookingReceipt);
        $(".handling_view").click(HandlingViewDetails);
        $(".limousine_view").click(LimousineViewDetails);
        $(".meet_view").click(MeetViewDetails);
        $(".empty_view").click(EmptylegViewDetails);
        if (type == "charters" || type == "executive" || type == "group" || type == "helicopter") {
            $(".emptylegs").attr('style', "display:none");$(".handlings").attr('style', "display:none"); $(".limousines").attr('style', "display:none"); $(".meets").attr('style', "display:none"); 
        } else if (type == "limousine") {
            $(".emptylegs").attr('style', "display:none");$(".handlings").attr('style', "display:none"); $(".charters").attr('style', "display:none"); $(".meets").attr('style', "display:none"); 
        } else if (type == "handlings") {
            $(".emptylegs").attr('style', "display:none");$(".charters").attr('style', "display:none"); $(".limousines").attr('style', "display:none"); $(".meets").attr('style', "display:none"); 
        } else if (type == "meets") {
            $(".emptylegs").attr('style', "display:none");$(".handlings").attr('style', "display:none"); $(".limousines").attr('style', "display:none"); $(".charters").attr('style', "display:none"); 
        } else if (type == "emptyleg") {
            is_emptyleg = true;
            $(".charters").attr('style', "display:none");$(".handlings").attr('style', "display:none"); $(".limousines").attr('style', "display:none"); $(".meets").attr('style', "display:none"); 
        }
        if(display_mode == "mode1"){
            $(".item1").addClass('active');
        } else if (display_mode == "mode2") {
            $(".item2").addClass('active');
            $(".pagination").attr('style', 'position:absolute;bottom:-72px;left:14px;');
        }    
        getCurrency();
    };
    init();
};

var Accessoslo = {
  API: new API(),
  Controllers: Controllers
};
