var API, Controllers = {}, Services = {};

API = function () {
  var request = function (type, endpoint, data, callback, rootUrl) {
    var url = (rootUrl !== undefined) ? rootUrl + endpoint : config.server + endpoint;
    $.ajax({
        type: type,
        url: url,
        data: data,
        headers: {
            'X-CSRF-TOKEN': config.token
        },
        success: function (e) {            
            callback(e);
        }        
    });
  };

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
    resetPassword: function (data, callback) {
        users("POST", "reset-password", data, callback, "/");
    },
    changePassword: function (data, callback) {
        users("POST", "password-change", data, callback, "/");
    },
    getCustomer: function (data, callback) {
        users("POST", "get-customer", data, callback, "/");
    },
    deleteCustomer: function (data, callback) {
        users("POST", "delete-customer", data, callback, "/");
    },
    getCustomerProfile: function (data, callback) {
        users("POST", "get-customerprofile", data, callback, "/");
    },
    verifyCode: function (data, callback) {
        users("POST", "verify-code", data, callback, "/");
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
    updatePartner: function (user, callback) {
        users("POST", "edit-partner", user, callback, "/");
    },
    deletePartner: function (id, callback) {        
        users("POST", "delete-partner", id, callback, "/");
    },
    getPartner: function (data, callback) {
        users("GET", "get-partner", data, callback, "/");
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
        services('POST', 'delete-meet', data, callback, '/');
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
    getEmptyNotice: function (data, callback) {
        charters("POST", "get-empty-notice", data, callback, "/");
    },
    setEmptyNotice: function (data, callback) {
        charters("POST", "set-empty-notice", data, callback, "/");
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
    deleteAircraft: function (data, callback) {
        stores("POST", "delete-aircraft", data, callback, "/");
    },
    deleteAircraftImage: function (url, callback) {
        stores("POST", "delete-aircraft-image", url, callback, "/");
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
    },
    deleteEstimation: function (data, callback) {
        charters("POST", "delete-estimation", data, callback, "/");
    },
    SendAdditionFeedback: function (data, callback) {
        charters("POST", "send-addition-feedback", data, callback, "/");
    },
    GetAdditionFeedback: function (data, callback) {
        charters("POST", "get-addition-feedback", data, callback, "/");
    },
    SendAdditionFeedbackToCustomer: function (data, callback) {
        charters("POST", "send-addition-feedback-customer", data, callback, "/");
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
          if (response.data.user.role_id == 2) {
            setTimeout(function () { window.location = "/member/dashboard"; }, 1000);
          } else if (response.data.user.role_id == 1) {
            setTimeout(function () { window.location = "/admin/executive-charter"; }, 1000);
          } else if(response.data.user.role_id == 0){
            setTimeout(function () { window.location = response.data.redirect; }, 1000);
          }
      } else {
          $("#login-button").html("Sign in");
          alert("Validate is failed! Please check your email and password again!");
      }
  };
  var login = function (e) {
    e.preventDefault();
    $("#login-button").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
    if (redirect == "no redirect") {
        if ($('#login-form').valid()) {
            Accessoslo.API.login($("#email").val(), $("#password").val(), onLoginComplete);
        }
    } else {
        if (redirect == "executive") {
            window.location = "/executive-charter";
        } else if (redirect == "group") {
            window.location = "/group-charter";
        } else if (redirect == "helicopter") {
            window.location = "/helicopter";
        }
    }
  };
  var onResetPasswordComplete = function (response) {
    setTimeout(function () { window.location = "/login"; }, 1000);
  };  
  var onUserFindComplete = function (response) {    
    if (response.data == "success") {        
        var data = {"email": $("#reset-email").val()};
        $("#email-send").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
        Accessoslo.API.resetPassword(data, onResetPasswordComplete);
    } else {
        setTimeout(function () { window.location = "/signup"; }, 1000);
    }
  };
  var emailSend = function (e) {
    e.preventDefault();
    if($("#reset-email-form").valid()) {
        var data = {"email": $("#reset-email").val()};
        Accessoslo.API.findUser(data, onUserFindComplete);
    }
  };
  var resetPassword = function (e) {
    e.preventDefault();
    $("#login-form").attr('style', 'display: none;');
    $(".login_title").html("RESET YOUR PASSWORD");
    $("#reset-email-form").attr('style', 'display: block;');
  };
  var init = function () {      
    if (token != " ") {
        $("#login-form").attr('style', 'display: none;');
        $("#reset-password-form").attr('style', 'display: block;');
        $(".login_title").html("RESET YOUR PASSWORD");
    }
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
    $('#reset-email-form').validate({
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
    $("#reset-password").click(resetPassword);
    $("#email-send").click(emailSend);
  };
  init();
};

Controllers.SignUp = function () {
    var code = "";
    var verify_Code = '';
    var verify_try = 0;
    $("#agree").click( function(){
        if( $(this).is(':checked') ) {
            $(".agree_check").attr('style', 'border:none;');
        } else {
            $(".agree_check").attr('style', 'border:1px solid red;');
        }
    });
    var OnContinue = function (e) {
        e.preventDefault();        
        if($("#step1_form").valid()) {
            if ($('#agree').is(":checked")) {
                $(".step-1").hide(); $(".step-2").show();
            } else {
                $(".agree_check").attr('style', 'border:1px solid red;');
            }
        }
    };
    var onRegisterComplete = function (response) {
        if (response.data.result != "success") {
            alert(response.data.result);
        } else {
            $("#mobile-number").intlTelInput("setNumber", response.data.phone);
            $(".step-2").hide(); $(".step-3").show();
        }
    };
    var OnRegister = function (e) {
        e.preventDefault();
        if($("#step2_form").valid()) {
            if($("#password").val() == $("#retype_password").val()) {
                if ($("#phone").intlTelInput("isValidNumber")) {
                    var send_user = {                        
                        email: $("#email").val(),
                        phone: $("#phone").intlTelInput("getNumber")                        
                    };                    
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
    var onRequestComplete = function (response) {
        if (response.data.type != "success") {
            alert(response.data.type);
        } else {
            code = response.data.data;
            $(".step-3").hide();$(".step-4").show();
        }
    };
    var OnRequest = function () {
        if ($("#step3_form").valid()) {
            if ($("#mobile-number").intlTelInput('isValidNumber')) {
                var sms = {                    
                    phone: $('#mobile-number').intlTelInput('getNumber')
                };
                Accessoslo.API.requestSms(sms, onRequestComplete);
            } else {
                alert("Please check your phone number.");
            }
        }
        $("#send_phonenumber").html($('#mobile-number').intlTelInput('getNumber'));
    };
    var OnVerifyComplete = function (response) {
        $(".step-4").hide();$(".step-5").show();
    };
    $(".code").keyup(function () {
        if (this.value.length == this.maxLength) {
            $(this).next('.code').focus();
        }
    });
    var OnVerify = function () {
        if (verify_try < 3) {
            verify_try ++;
            verify_Code = $("#first").val() + $("#second").val() + $("#third").val() + $("#fourth").val() + $("#fifth").val() + $("#sixth").val();
            if ($("#step4_form").valid()) {
                if (code == parseInt(verify_Code)) {
                    var data = {
                        gender: $("#gender").val(),
                        first_name: $("#first_name").val(),
                        last_name: $("#last_name").val(),
                        country: $("#country").val(),
                        city: $("#city").val(),
                        email: $("#email").val(),
                        phone: $("#phone").intlTelInput("getNumber"),
                        password: $("#password").val(),
                        code: code
                    };
                    $("#hidden_email").val(data.email);
                    $("#hidden_pwd").val(data.password);
                    Accessoslo.API.verifyCode(data, OnVerifyComplete);
                } else {
                    alert("SMS Verification is failed. Please try again.");
                } 
            } else {
                alert("SMS Verification is failed. Please try again.");
            }
        } else {
            verify_try = 0;
            if (confirm("SMS verification is failed. Try again 2 minutes later.")) {
                setTimeout(function () { window.location = "/"; }, 1000);
            } else {
                setTimeout(function () { window.location = "/"; }, 1000);
            }
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
    var current_rate = {};
    var charter_flight = {};
    var book_transport = {};    
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&date="+date+"&departure="+departure+"&destination="+destination;
        $(value).attr('href',href);
    });
    var createCharterComplete = function (response) {        
        $(".confirm").removeClass("submit");
        $(".confirm").html("Confirm");
        if (user != null) {
            $(".charter-modal").modal("hide");
            $("#BookSuccessMessage_new").modal('show');
        } else {
            $(".charter-modal").modal("hide");
            $("#BookSuccessMessage").modal('show');
        }
    };
    $("#close_success").click(function() {
        $("#BookSuccessMessage_new").modal('hide');
        location.reload();
    });
    var createComplete = function (response) {};
    var findComplete = function (response) {        
        if (response.data == "error") {
            var send_user = {
                gender: $("#gender").val(),
                first_name: $("#first_name").val(),
                last_name: $("#last_name").val(),
                email: charter_flight.email,
                phone: charter_flight.phone,
                company: $("#compnay").val()
            };
            charter_flight.flight_type = "One Way";            
            Accessoslo.API.createUser(send_user, createComplete);            
            Accessoslo.API.createCharter(charter_flight, createCharterComplete);
        } else if (response.data == "success") {
            charter_flight.flight_type = "One Way";            
            Accessoslo.API.createCharter(charter_flight, createCharterComplete);
        }
    };
    var Confirm = function (e) {
        e.preventDefault();
        if ($('#charter_modal_form').valid()) {
            if ($("#charter_tel").intlTelInput('isValidNumber')) {
                charter_flight.contact_person = $("#first_name").val() + " " + $("#last_name").val();
                charter_flight.company = $("#company").val();
                charter_flight.phone = $("#charter_tel").intlTelInput('getNumber');
                charter_flight.email = $("#email").val();
                charter_flight.travellers = $("#flight_passengers").val();
                charter_flight.return_date = "";
                charter_flight.return_time = "";
                charter_flight.booking_type = "executive";
                $(".confirm").addClass("submit");
                $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
                Accessoslo.API.findUser(charter_flight, findComplete);
            }
        }
    };
    var BookProceed = function (e) {
        e.preventDefault();
        if ($("#flight_form").valid()) {
            charter_flight.departure = $("#flight_departure").val();
            charter_flight.destination =  $("#flight_destination").val();
            charter_flight.date = $("#flight_date").val();
            charter_flight.time = $("#flight_time").val();
            $(".charter-modal").modal("show");
            $(".accessoslo-home").attr('style', 'padding-right: 0;');
        }
    };
    var MobileBookProceed = function (e) {
        e.preventDefault();
        if ($("#mobile_flight_form").valid()) {
            charter_flight.departure = $("#mobile_flight_departure").val();
            charter_flight.destination =  $("#mobile_flight_destination").val();
            charter_flight.date = $("#mobile_flight_date").val();
            charter_flight.time = $("#mobile_flight_time").val();
            $(".charter-modal").modal("show");
            $(".accessoslo-home").attr('style', 'padding-right: 0;');
        }
    };
    $("#flight_date").on('apply.daterangepicker', function(ev, picker) {
        $("#flight_date").val(picker.startDate.format('MM/DD/YYYY') + " - " + picker.endDate.format('MM/DD/YYYY'));
    });
    $("#mobile_flight_date").on('apply.daterangepicker', function(ev, picker) {
        $("#mobile_flight_date").val(picker.startDate.format('MM/DD/YYYY') + " - " + picker.endDate.format('MM/DD/YYYY'));
    });
    
    $("#mobile_type_car").on('change', function (e) {
        var car = this.value;        
        var rate = current_rate.USDEUR / current_rate.USDNOK;
        if (car == "S-klasse") { book_transport.total_cost = Math.round(1990 * rate);}
        else if (car == "Tesla Model X") { book_transport.total_cost = Math.round(1990 * rate);}
        else if (car == "Viano") {book_transport.total_cost = Math.round(2600 * rate);}
        else if (car == "Minibuss") {book_transport.total_cost = Math.round(3400 * rate);}
    });  

    var EmptylegSearch= function (e) {
        e.preventDefault();
        if ($("#emptyleg_form").valid()) {
            setTimeout(function () { window.location.href= "/emptyleg-search-result?date="+$("#emptyleg_date").val()+"&departure="+$("#emptyleg_departure").val()+"&destination="+$("#emptyleg_destination").val()+"&time="+$("#emptyleg_time").val();}, 100);
        }
    };
    $("#emptyleg_date").on('apply.daterangepicker', function(ev, picker) {
        $("#emptyleg_date").val(picker.startDate.format('MM/DD/YYYY hh:mm A'));        
    });
    var MobileEmptylegSearch= function (e) {
        e.preventDefault();
        if ($("#mobile_emptyleg_form").valid()) {
            setTimeout(function () { window.location.href= "/emptyleg-search-result?date="+$("#mobile_emptyleg_date").val()+"&departure="+$("#mobile_emptyleg_departure").val()+"&destination="+$("#mobile_emptyleg_destination").val()+"&time="+$("#mobile_emptyleg_time").val();}, 100);
        }
    };
    $("#mobile_emptyleg_date").on('apply.daterangepicker', function(ev, picker) {
        $("#mobile_emptyleg_date").val(picker.startDate.format('MM/DD/YYYY hh:mm A'));        
    });
    var getCurrency = function () {        
        var endpoint = 'live';
        var access_key = '8c479a455a6d8a2f5cccc8ce01819269';
        $.ajax({
            url: 'https://apilayer.net/api/' + endpoint + '?access_key=' + access_key,
            dataType: 'jsonp',
            success: function(json) {
                current_rate = {
                    USDEUR: json.quotes.USDEUR,
                    USDNOK: json.quotes.USDNOK
                };
            }
        });
    };
    var getAirportInformation = function () {
        var airports = [];       
        var api_key = 'eb07b45ce0630bf683cd176a0174bec5';
        $.ajax({
            url: 'https://airport.api.aero/airport/?user_key=' + api_key,
            type: 'GET',
            contentType: 'application/json',
            dataType: 'jsonp',            
            success: function(e) {
                e.airports.forEach(function (sel) {
                    if (sel.name != null) {
                        airports.push(sel.name + "#" + sel.code + "#" + sel.country + "#" + sel.city);
                    }
                });
                $('#flight_departure').typeahead('destroy');
                $('#flight_destination').typeahead('destroy');
                $('#mobile_flight_departure').typeahead('destroy');
                $('#mobile_flight_destination').typeahead('destroy');
                $('#emptyleg_departure').typeahead('destroy');
                $('#emptyleg_destination').typeahead('destroy');
                $('#mobile_emptyleg_departure').typeahead('destroy');
                $('#mobile_emptyleg_destination').typeahead('destroy');
                $("#flight_departure").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";

                        var query = this.query;                        
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");                        
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");                        
                        var jElem = $(html);                        
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {                            
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });                        
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });                
                $("#flight_destination").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";

                        var query = this.query;
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");
                        var jElem = $(html);
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });
                $("#mobile_flight_departure").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";

                        var query = this.query;                        
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");                        
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");                        
                        var jElem = $(html);                        
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {                            
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });                        
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });                
                $("#mobile_flight_destination").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";

                        var query = this.query;
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");
                        var jElem = $(html);
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });
                $("#emptyleg_departure").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";

                        var query = this.query;
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");
                        var jElem = $(html);
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });                
                $("#emptyleg_destination").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";
                        
                        var query = this.query;
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");
                        var jElem = $(html);
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });
                $("#mobile_emptyleg_departure").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";

                        var query = this.query;
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");
                        var jElem = $(html);
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });                
                $("#mobile_emptyleg_destination").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";
                        
                        var query = this.query;
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");
                        var jElem = $(html);
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });
            }
        });
    };
    $("input[name='book_type']").change(function (e) {
        if ($(this).val() == "executive") {
            $("#executive_tab").attr('style', 'color: #c29834;');
            $("#limo_tab").attr('style', 'color: #fff;');
            $("#empty_tab").attr('style', 'color: #fff;');

            $("#bookFlight").addClass('in');
            $("#bookFlight").addClass('active');
            $("#bookTransport").removeClass('in');
            $("#bookTransport").removeClass('active');
            $("#emptyLegs").removeClass('in');
            $("#emptyLegs").removeClass('active');
        } else if ($(this).val() == "limo") {
            $("#executive_tab").attr('style', 'color: #fff;');
            $("#limo_tab").attr('style', 'color: #c29834;');
            $("#empty_tab").attr('style', 'color: #fff;');

            $("#bookFlight").removeClass('in');
            $("#bookFlight").removeClass('active');
            $("#bookTransport").addClass('in');
            $("#bookTransport").addClass('active');
            $("#emptyLegs").removeClass('in');
            $("#emptyLegs").removeClass('active');

        } else if ($(this).val() == "empty") {
            $("#executive_tab").attr('style', 'color: #fff;');
            $("#limo_tab").attr('style', 'color: #fff;');
            $("#empty_tab").attr('style', 'color: #c29834;');

            $("#bookFlight").removeClass('in');
            $("#bookFlight").removeClass('active');
            $("#bookTransport").removeClass('in');
            $("#bookTransport").removeClass('active');
            $("#emptyLegs").addClass('in');
            $("#emptyLegs").addClass('active');
        }  
    });
    $(".mobile-item").click(function () {
        var redirect = "/" + $(this).attr('id');
        setTimeout(function () { window.location.href = redirect;}, 200);
    });
    var init = function () {
        getAirportInformation();
        getCurrency();
        if (type == "other") {            
            $(".nav-tabs").attr('style', 'display: flex;');
            $(".home-page-background").attr('src', "/assets/img/bg/home.jpg");
            $("#executive_tab").attr('style', 'color: #c29834;');
            $(".flight-tab").addClass('active');
            $(".emptyleg-tab").removeClass('active');
        } else if (type == "empty") {
            $(".nav-tabs").attr('style', 'display: none;');
            $(".home-page-background").attr('src', "/assets/img/bg/empty-leg-banner.jpg");
            $("#empty_tab").attr('style', 'color: #c29834;');
            $("#empty_tab").addClass('active');
            $("#executive_tab").removeClass('active');
            $("#executive_tab").attr('style', 'display: none;');
            $("#limo_tab").attr('style', 'display: none;');
            $("#empty_check").attr('checked','checked');
            // hide charter and transport search box on mobile and desktop mode
            $(".hide-content").attr("style", "display:none");
            $("#bookFlight").removeClass("in");
            $("#bookFlight").removeClass("active");
            $("#emptyLegs").addClass("in");
            $("#emptyLegs").addClass("active");
            $("#emptyLegs > .collapse").addClass("in");
        } else {
            $(".nav-tabs").attr('style', 'display: none;');
            $(".home-page-background").attr('src', "/assets/img/bg/empty-leg-banner.jpg");
            $("#flight_departure").val(departure);
            $("#flight_destination").val(destination);
            $("#flight_date").val(date);
            $("#flight_time").val(time);
        }
        if (user != null) {
            $(".redirect_login").attr('style', 'display: none');
            $("#gender").val(user.gender);
            $("#first_name").val(user.first_name);
            $("#last_name").val(user.last_name);
            $("#company").val(user.company);
            $("#charter_tel").val(user.phone);
            $("#email").val(user.email);
            $("#contact_person").val(user.first_name + " " + user.last_name);
            $("#limousine_tel").val(user.phone);
            $("#limousine_email").val(user.email);
            $("#limousine_company").val(user.company);            
        } else {
            $(".redirect_upcoming").attr('style', 'display: none');
        }
        $("#confirm").click(Confirm);
        $("#flight_proceed").click(BookProceed);
        $("#mobile_flight_proceed").click(MobileBookProceed);
        $("#emptyleg_search").click(EmptylegSearch);
        $("#mobile_emptyleg_search").click(MobileEmptylegSearch);
        
        $("#charter_tel").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });        
        $("#flight_date").daterangepicker({
            minDate:new Date(),
            autoUpdateInput: false,
            onClose: function () {
                $('#flight_form').validate().element("#flight_date");
            }
        });
        $("#flight_time").wickedpicker({
            twentyFour: true,
            onClose: function () {
                $('#flight_form').validate().element("#flight_time");
            }
        });
        $("#mobile_flight_date").daterangepicker({
            minDate:new Date(),
            autoUpdateInput: false,
            onClose: function () {
                $('#mobile_flight_form').validate().element("#mobile_flight_date");
            }
        });
        $("#mobile_flight_time").wickedpicker({
            twentyFour: true,
            onClose: function () {
                $('#mobile_flight_form').validate().element("#mobile_flight_time");
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
        $('#mobile_flight_form').validate({
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
        $("#emptyleg_date").daterangepicker({
            minDate:new Date(),
            autoUpdateInput: false
        });
        $("#emptyleg_time").wickedpicker({
            twentyFour: true
        });
        $('#mobile_emptyleg_form').validate({
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
        $("#mobile_emptyleg_date").daterangepicker({
            minDate:new Date(),
            autoUpdateInput: false
        });
        $("#mobile_emptyleg_time").wickedpicker({
            twentyFour: true
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
    };
    init();
};

Controllers.News = function () {
    var Link = function (e) {
        e.preventDefault();
        var title = $(this).data('title');
        var string_array = title.split(" ");
        var link = '';
        for (var i = 0; i < string_array.length; i ++) {
            link += string_array[i];
            if (i < string_array.length - 1) {
                link += "-";
            }
        }

        setTimeout(function () { window.location.href = "/news/" + link;}, 200);
    };
    var init = function () {
        $(".post_link").click(Link);
    };
    init();
};

Controllers.Sandejord = function () {
  var height = $(".box-content").height();
  $("#map").height(height - 20);
};

Controllers.Oslofbo = function () {
  var height = $(".box-content").height();
  $("#map").height(height - 30);
};

Controllers.SingleNews = function () {    
    var Link  = function (e) {
        e.preventDefault();
        var title = $(this).data('title');
        var string_array = title.split(" ");
        var link = '';
        for (var i = 0; i < string_array.length; i ++) {
            link += string_array[i];
            if (i < string_array.length - 1) {
                link += "-";
            }
        }

        setTimeout(function () { window.location.href = "/news/" + link;}, 200);
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
        setTimeout(function () { window.location.href = "/single-partner/" + id; }, 200);
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

Controllers.ContactUs = function () {
    var OnVerifyComplete = function () {
        $("#send").html("Send Message");
        $("#ContactSuccess").modal('show');
    };
    $("#close_success").click(function () {
        $("#ContactSuccess").modal('hide');        
    });
    var OnSend = function () {
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),
                    type: "*.*"
                };
                $("#send").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
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

Controllers.DestinationOslo = function () {
    var OnVerifyComplete = function () {
        $(".confirm").removeClass("submit");
        $(".confirm").html("Send Message");
        $("#ContactSuccess").modal('show');
    };
    $("#close_success").click(function () {
        $("#ContactSuccess").modal('hide');
        window.location.reload();
    });
    var OnSend = function () {
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),
                    type: "Destination Oslo"
                };
                $(".confirm").addClass("submit");
                $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
                Accessoslo.API.contact_mail(send_data, OnVerifyComplete);
            } else {
                alert("Invalid Phone number!");
            }
        }
    };
    var init = function () {
        $('#slide').slide({
            slideSpeed: 3000,            
            isAutoSlide: true,
            isShowArrow: false,
            isShowDots: true,
            switchSpeed: 500,
            dotsEvent: 'click'            
        });
        $("#send").click(OnSend);
        $("#mobile-number").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });
        if (user != null) {
            if (user.first_name != null) {
              $("#first_name").val(user.first_name);              
            }
            if (user.last_name != null) {
              $("#last_name").val(user.last_name);           
            }
            if (user.email != null) {
              $("#email").val(user.email);           }
            if (user.phone != null) {
                $("#mobile-number").intlTelInput("setNumber", user.phone);                
            }
        }
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

Controllers.DestinationTromso = function () {
    var OnVerifyComplete = function () {
        $(".confirm").removeClass("submit");
        $(".confirm").html("Send Message");
        $("#ContactSuccess").modal('show');
    };
    $("#close_success").click(function () {
        $("#ContactSuccess").modal('hide');
        window.location.reload();
    });
    var OnSend = function () {
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),
                    type: "Destination Tromsø"
                };
                $(".confirm").addClass("submit");
                $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
                Accessoslo.API.contact_mail(send_data, OnVerifyComplete);
            } else {
                alert("Invalid Phone number!");
            }
        }
    };
    var init = function () {
        $('#slide').slide({
            slideSpeed: 3000,            
            isAutoSlide: true,
            isShowArrow: false,
            isShowDots: true,
            switchSpeed: 500,
            dotsEvent: 'click'            
        });
        $("#send").click(OnSend);
        $("#mobile-number").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });
        if (user != null) {
            if (user.first_name != null) {
              $("#first_name").val(user.first_name);              
            }
            if (user.last_name != null) {
              $("#last_name").val(user.last_name);              
            }
            if (user.email != null) {
              $("#email").val(user.email);              
            }
            if (user.phone != null) {
              $("#mobile-number").intlTelInput("setNumber", user.phone);              
            }
        }
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

Controllers.DestinationBergen = function () {
    var OnVerifyComplete = function () {
        $(".confirm").removeClass("submit");
        $(".confirm").html("Send Message");
        $("#ContactSuccess").modal('show');
    };
    $("#close_success").click(function () {
        $("#ContactSuccess").modal('hide');
        window.location.reload();
    });
    var OnSend = function () {
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),
                    type: "Destination Bergen"
                };                
                Accessoslo.API.contact_mail(send_data, OnVerifyComplete);
            } else {
                alert("Invalid Phone number!");
            }
        }
    };
    var init = function () {
        $('#slide').slide({
            slideSpeed: 3000,            
            isAutoSlide: true,
            isShowArrow: false, 
            isShowDots: true,
            switchSpeed: 500,
            dotsEvent: 'click'            
        });
        $("#send").click(OnSend);
        $("#mobile-number").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });
        if (user != null) {
            if (user.first_name != null) {
              $("#first_name").val(user.first_name);             
            }
            if (user.last_name != null) {
              $("#last_name").val(user.last_name);             
            }
            if (user.email != null) {
              $("#email").val(user.email);              
            }
            if (user.phone != null) {
              $("#mobile-number").intlTelInput("setNumber", user.phone);
              
            }
        }
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

Controllers.GroundTransport = function () {
    var OnVerifyComplete = function () {
        $(".confirm").removeClass("submit");
        $(".confirm").html("Send Message");
        $("#ContactSuccess").modal('show');
    };
    $("#close_success").click(function () {
        $("#ContactSuccess").modal('hide');
        window.location.reload();
    });
    var OnSend = function () {
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),
                    type: "Ground Transport"
                };
                $(".confirm").addClass("submit");
                $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
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

Controllers.EventConference = function () {
    var OnVerifyComplete = function () {
        $(".confirm").removeClass("submit");
        $(".confirm").html("Send Message");
        $("#ContactSuccess").modal('show');
    };
    $("#close_success").click(function () {
        $("#ContactSuccess").modal('hide');
        window.location.reload();
    });
    var OnSend = function () {
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),
                    type: "Conference"
                };
                $(".confirm").addClass("submit");
                $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
                Accessoslo.API.contact_mail(send_data, OnVerifyComplete);
            } else {
                alert("Invalid Phone number!");
            }
        }
    };
    var init = function () {
        $('#slide').slide({
            slideSpeed: 3000,            
            isAutoSlide: true,
            isShowDots: true,
            isShowArrow: false,
            switchSpeed: 500,
            dotsEvent: 'click'            
        });
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

Controllers.EventEvent = function () {
    var OnVerifyComplete = function () {
        $(".confirm").removeClass("submit");
        $(".confirm").html("Send Message");
        $("#ContactSuccess").modal('show');
    };
    $("#close_success").click(function () {
        $("#ContactSuccess").modal('hide');
        window.location.reload();
    });
    var OnSend = function () {
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),                    
                    type: "Event"
                };
                $(".confirm").addClass("submit");
                $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
                Accessoslo.API.contact_mail(send_data, OnVerifyComplete);
            } else {
                alert("Invalid Phone number!");
            }
        }
    };
    var init = function () {
        $('#slide').slide({
            slideSpeed: 3000,            
            isAutoSlide: true,
            isShowDots: true,
            isShowArrow: false,
            switchSpeed: 500,
            dotsEvent: 'click'            
        });
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

Controllers.EventIncentive = function () {
    var OnVerifyComplete = function () {
        $(".confirm").removeClass("submit");
        $(".confirm").html("Send Message");
        $("#ContactSuccess").modal('show');
    };
    $("#close_success").click(function () {
        $("#ContactSuccess").modal('hide');
        window.location.reload();
    });
    var OnSend = function () {
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),
                    type: "Incentives"
                };
                $(".confirm").addClass("submit");
                $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
                Accessoslo.API.contact_mail(send_data, OnVerifyComplete);
            } else {
                alert("Invalid Phone number!");
            }
        }
    };
    var init = function () {
        $('#slide').slide({
            slideSpeed: 3000,            
            isAutoSlide: true,
            isShowDots: true,
            isShowArrow: false,
            switchSpeed: 500,
            dotsEvent: 'click'            
        });
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

Controllers.EventMeeting = function () {
    var OnVerifyComplete = function () {
        $(".confirm").removeClass("submit");
        $(".confirm").html("Send Message");
        $("#ContactSuccess").modal('show');
    };
    $("#close_success").click(function () {
        $("#ContactSuccess").modal('hide');
        window.location.reload();
    });
    var OnSend = function () {
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),
                    type: "Meeting"
                };
                $(".confirm").addClass("submit");
                $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
                Accessoslo.API.contact_mail(send_data, OnVerifyComplete);
            } else {
                alert("Invalid Phone number!");
            }
        }
    };
    var init = function () {
        $('#slide').slide({
            slideSpeed: 3000,            
            isAutoSlide: true,
            isShowDots: true,
            isShowArrow: false,
            switchSpeed: 500,
            dotsEvent: 'click'            
        });
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

Controllers.EventWedding = function () {
    var OnVerifyComplete = function () {
        $(".confirm").removeClass("submit");
        $(".confirm").html("Send Message");
        $("#ContactSuccess").modal('show');
    };
    $("#close_success").click(function () {
        $("#ContactSuccess").modal('hide');
        window.location.reload();
    });
    var OnSend = function () {
        if ($("#form_contr").valid()) {
            if($("#mobile-number").intlTelInput('isValidNumber')) {
                var send_data = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#mobile-number").intlTelInput("getNumber"),
                    message: $("#message").val(),
                    type: "Meeting"
                };
                $(".confirm").addClass("submit");
                $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
                Accessoslo.API.contact_mail(send_data, OnVerifyComplete);
            } else {
                alert("Invalid Phone number!");
            }
        }
    };
    var init = function () {
        $('#slide').slide({
            slideSpeed: 3000,            
            isAutoSlide: true,
            isShowDots: true,
            isShowArrow: false,
            switchSpeed: 500,
            dotsEvent: 'click'            
        });
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
    var estimate_cost = "0"; var additional_fee = "0";  var total_cost = "0"; var aircraft = ""; var bonus = ""; var current_id = 0;
    var additional_replies = [];
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search";
        $(value).attr('href',href);
    });
    var partner_options = [];
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];
        setTimeout(function () { window.location.href= "/admin/executive-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search";}, 100);
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
        setTimeout(function () { window.location.href= "/admin/executive-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search";}, 50);
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location.href= "/admin/executive-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search;}, 50);
        }
    });
    var GetInfoComplete = function (response) {
        var charters = response.data.charters;
        if (user.role_id == 1) {
            if (charters) {
                if (charters.status != "awaiting") {
                    $("#partner_name" + response.data.id).prop('disabled', true);
                    $("#buttons" + response.data.id).attr('style', 'display: none');
                    $("#status" + response.data.id).attr('style', 'display: block');
                    $("#aircraft" + response.data.id).prop('disabled', 'disabled');
                    $("#estimate_cost" + response.data.id).prop('disabled', true);
                }
                $("#aircraft" + response.data.id).val(charters.aircraft);
                $("#estimate_cost" + response.data.id).val(charters.estimate_cost);
                $("#additional_fee" + response.data.id).val(charters.additional_fee);
                $("#total_cost" + response.data.id).val(charters.total_cost);
                estimate_cost = response.data.charters.estimate_cost;
                additional_fee = response.data.charters.additional_fee;
                total_cost = response.data.charters.total_cost;
                aircraft = response.data.charters.aircraft;
            }
        } else {
            if (charters) {
                for (var i = 0; i < charters.length; i ++) {
                    if (charters[i].status == "awaiting") {
                        $("#partner_name" + response.data.id + i).val(charters[i].partner_name);
                        $("#partner_name" + response.data.id + i).prop('disabled', true);
                        $("#aircraft" + response.data.id + i).val(charters[i].aircraft);
                        $("#aircraft" + response.data.id + i).prop('disabled', 'disabled');
                        $("#aircraft" + response.data.id + i).attr('style', 'background: #eee;');
                        $("#estimate_cost" + response.data.id + i).val(charters[i].estimate_cost);
                        $("#additional_fee" + response.data.id + i).val(charters[i].additional_fee);
                        $("#total_cost" + response.data.id + i).val(charters[i].total_cost);
                        $("#info" + response.data.id + i).attr('data-charter', charters[i].id);
                        $("#save" + response.data.id + i).attr('data-charter', charters[i].id);
                        $("#send" + response.data.id + i).attr('data-charter', charters[i].id);
                        estimate_cost = charters[i].estimate_cost;
                        additional_fee = charters[i].additional_fee;
                        total_cost = charters[i].total_cost;
                        aircraft = charters[i].aircraft;
                    } else {
                        $("#partner_name" + response.data.id + i).val(charters[i].partner_name);
                        $("#partner_name" + response.data.id + i).prop('disabled', true);
                        $("#aircraft" + response.data.id + i).val(charters[i].aircraft);
                        $("#aircraft" + response.data.id + i).prop('disabled', 'disabled');
                        $("#aircraft" + response.data.id + i).attr('style', 'background: #eee;');
                        $("#estimate_cost" + response.data.id + i).val(charters[i].estimate_cost);
                        $("#estimate_cost" + response.data.id + i).prop('disabled', true);
                        $("#additional_fee" + response.data.id + i).val(charters[i].additional_fee);
                        $("#additional_fee" + response.data.id + i).prop('disabled', true);
                        $("#total_cost" + response.data.id + i).val(charters[i].total_cost);
                        $("#total_cost" + response.data.id + i).prop('disabled', true);
                        estimate_cost = charters[i].estimate_cost;
                        additional_fee = charters[i].additional_fee;
                        total_cost = charters[i].total_cost;
                        aircraft = charters[i].aircraft;
                        $("#status" + response.data.id + i).attr('style', 'display: block');
                        $("#buttons" + response.data.id + i).attr('style', 'display: none');
                    }
                    var reply = {"id": "info" + response.data.id + i, "text": charters[i].additional_reply};
                    additional_replies.push(reply);
                }
            }
        }
    };
    var getCheckBonus = function (response) {
        bonus = response.data.bonus;
        $("#total_bonus" + response.data.id).val(bonus);
    };
    $(".toggle").click(function () {
        var data = $(this).data('info');
        Accessoslo.API.CheckBonus(data, getCheckBonus);
        current_id = data.id;
        var send_data = {
            id: data.id, 
            charter_type: "executive charter"
        };
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
        if (response.data.emptyleg_badge != 0) {$(".emptyleg_badge").attr('style', "display:inline;");$(".emptyleg_badge").html(response.data.emptyleg_badge);}
        var data = {"dest": "badgeshowing", "type": "executive"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    $('input[name="estimate_cost"]').change(function(){        
        var _id = $(this).attr('id');
        var id = _id.replace("estimate_cost", '');
        estimate_cost = this.value;
        var cost = parseInt(this.value) + Math.round(parseInt(this.value) * parseInt(additional_fee) / 100);
        $("#total_cost" + id).val(cost + Math.round(cost * 12 / 100));
    });
    $('input[name="additional_fee"]').change(function(){
        var id = $(this).attr('id').slice(14, $(this).attr('id').length);
        if(this.value == "") { additional_fee = 0; } else { additional_fee = this.value; }
        var cost = parseInt($("#estimate_cost" + id).val()) + Math.round(parseInt($("#estimate_cost" + id).val()) * parseInt(additional_fee) / 100);
        $("#total_cost" + id).val(cost + Math.round(cost * 12 / 100));
    });
    $('input[name="partner_name"]').change(function () {
        var _id = $(this).attr('id');
        var id = _id.replace("partner_name", '');
        var aircrafts = $("#aircraft" + id).data('aircraft');
        $("#aircraft" + id).find('option').remove().end().append('<option disabled selected value>Aircraft</option>').val('Aircraft');
        aircrafts.forEach(function(aircraft) {
            if (aircraft.partner_name == this.value) {
                $("#aircraft" + id).append('<option value= "' + aircraft.type + '">' + aircraft.type + '</option>');
            }
        });
        partner_options.forEach(function(sel) {
            if (sel.partner_name == this.value) {
                $("#additional_fee" + id).val(sel.additional_fee);
                additional_fee = sel.additional_fee;
            }
        });
    });
    $('select[name="aircraft"]').change(function (){aircraft = this.value;});

    // response function of sending partner's feedback
    var SendFeedbackToCustomerComplete = function () {
        $("#modal-additional-service").modal('hide');
        alert("Feedback sent successfully.");
    };
    // admin checks partner's feedback
    $(".admin-view-info").click(function () {
        $("#customer_additional_text").html($(this).data('source'));
        $('#send_feedback_customer').attr("data-id",$(this).attr('id'));
        var id = $(this).attr('id');
        additional_replies.forEach(function(sel) {
            if (sel.id == id) {
                $("#partner_additional_text").val(sel.text);
            }
        });
        $("#modal-additional-service").modal('show');
    });
    // admin sends partner's feedback to the customer
    $("#send_feedback_customer").click(function () {
        var str = $(this).data('id');
        var num = str.substring(4, str.length);
        var data = {
            charter_id: num.substring(0, num.length - 1),
            text: $("#partner_additional_text").val()
        };
        Accessoslo.API.SendAdditionFeedbackToCustomer(data, SendFeedbackToCustomerComplete);
    });
    // response function of customer's feedback
    var GetFeedbackComplete = function (response) {
        if (response.data.type == "success") {
            $("#partner_additional_text").val(response.data.data);
        }
        $("#modal-additional-service").modal('show');
    };
    // partner check customer's feedback
    $(".view-info").click(function () {
        $('#send_feedback_accessoslo').attr("data-id",$(this).data('id'));
        $("#customer_additional_text").html($(this).data('source'));
        var data = {
            charter_id: $(this).data('id'),
            partner_name: partner_name,
            charter_type: "executive charter"
        };
        Accessoslo.API.GetAdditionFeedback(data, GetFeedbackComplete);
    });
    // response function of sending feedback to the admin
    var SendFeedbackComplete = function () {
        $("#modal-additional-service").modal('hide');
        window.location = "/admin/executive-charter";
    };
    // partner sends his feedback to the admin
    $("#send_feedback_accessoslo").click(function() {
        if ($('#additional-form').valid()) {
            var data = {
                charter_id: $(this).data('id'),
                partner_name: partner_name,
                additional_reply: $("#partner_additional_text").val(),
                charter_type: "executive charter",
                status: "awaiting"
            };
            Accessoslo.API.SendAdditionFeedback(data, SendFeedbackComplete);
        }
    });
    // save estimate to the database
    var SaveComplete = function (response){
        window.location = "/admin/executive-charter";
    };
    var Save = function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        if (user.role_id == "0") {
            _id = $(this).attr('id');
            id = _id.replace('save', '');
            if ($('#aircraft' + id).val()) {
                var data = {
                    id: $(this).data('charter'),
                    charter_id: $(this).data('id'),
                    aircraft: $("#aircraft" + id).val(),
                    estimate_cost: $("#estimate_cost" + id).val(),
                    additional_fee: $("#additional_fee" + id).val(),
                    total_cost: $("#total_cost" + id).val(),
                    type: partner_name,
                    partner_name: $("#partner_name" + id).val(),
                    charter_type: "executive charter",
                    status: 'awaiting'
                };
                var loading = new Loading({ discription: 'Loading...' });
                Accessoslo.API.SaveCharters(data, SaveComplete);
            } else {
                $('#aircraft' + id).attr('style','border:1px solid #e21717');
            }
        } else {
            if ($('#aircraft' + id).val()) {
                var total_cost = parseInt(estimate_cost) + Math.round(parseInt(estimate_cost) * parseInt(origin_additional_fee) / 100);
                var estimate_data = {
                    charter_id: id,
                    aircraft: aircraft,
                    estimate_cost: estimate_cost,
                    additional_fee: origin_additional_fee,
                    total_cost: total_cost + Math.round(total_cost * 12 / 100),
                    partner_name: partner_name,
                    type: partner_name,
                    charter_type: "executive charter",
                    status: 'awaiting'
                };
                var page_loading = new Loading({ discription: 'Loading...' });
                Accessoslo.API.SaveCharters(estimate_data, SaveComplete);
            } else {
                $('#aircraft' + id).attr('style','border:1px solid #e21717');
            }
        }        
    };
    // send estimate to the customer
    var SendComplete = function (response){window.location = "/admin/executive-charter";};   
    var Send = function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        if (user.role_id == "0") { 
            _id = $(this).attr('id');
            id = _id.replace('send', '');            
            if ($('#aircraft' + id).val()) {
                var data = {
                    id: $(this).data('charter'),
                    charter_id: $(this).data('id'),
                    aircraft: $("#aircraft" + id).val(),
                    estimate_cost: $("#estimate_cost" + id).val(),
                    additional_fee: $("#additional_fee" + id).val(),
                    total_cost: $("#total_cost" + id).val(),
                    type: partner_name,
                    partner_name: $("#partner_name" + id).val(),
                    charter_type: "executive charter",
                    status: 'awaiting'
                };                
                if(confirm("Are you sure you want to send estimate to customer?")) {
                    var loading = new Loading({ discription: 'Loading...' });
                    Accessoslo.API.SendCharters(data, SendComplete);
                }
            } else {
                $('#aircraft' + id).attr('style','border:1px solid #e21717');
            }
        } else {            
            if ($('#aircraft' + id).val()) {
                var total_cost = parseInt(estimate_cost) + Math.round(parseInt(estimate_cost) * parseInt(origin_additional_fee) / 100);
                var estimate_data = {
                    charter_id: id,
                    aircraft: aircraft,
                    estimate_cost: estimate_cost,
                    additional_fee: origin_additional_fee,
                    total_cost: total_cost + Math.round(total_cost * 12 / 100),
                    partner_name: partner_name,
                    charter_type: "executive charter",
                    status: 'awaiting'
                };
                if(confirm("Are you sure you want to send estimate to customer?")) {
                    var page_loading = new Loading({ discription: 'Loading...' });
                    Accessoslo.API.SendCharters(estimate_data, SendComplete);
                }
            } else {
                $('#aircraft' + id).attr('style','border:1px solid #e21717');
            }
        }        
    };
    // send bonus to the customer
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

    var getPartnerOptions = function (response) {        
        partner_options = response.data;        
    };
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "executive"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        Accessoslo.API.getPartner(data, getPartnerOptions);
        $(".executive_badge").hide();
        $("#datepicker").val(startDate + " - " + endDate);
        $("#datepicker").daterangepicker();
        $(".save").click(Save);        
        $(".send").click(Send);
        $('#additional-form').validate({
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

Controllers.AdminGroup = function () {    
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];
        setTimeout(function () { window.location.href= "/admin/group-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search";}, 100);
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
        setTimeout(function () { window.location.href= "/admin/group-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search";}, 50);
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location.href= "/admin/group-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search;}, 50);
        }
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
        if (response.data.emptyleg_badge != 0) {$(".emptyleg_badge").attr('style', "display:inline;");$(".emptyleg_badge").html(response.data.emptyleg_badge);}
        var data = {
            "dest": "badgeshowing",
            "type": "group"
        };
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    var ViewDetails = function () {
        var data = $(this).data('source');
        $("#person").val(data.contact_person);
        $("#company").val(data.company);
        $("#phone").val(data.phone);
        $("#email").val(data.email);
        $("#departure").val(data.departure);
        $("#destination").val(data.destination);
        $("#date").val(data.date);
        $("#time").val(data.time);
        $("#travelers").val(data.travellers);
        $("#status").val(data.status);        
        $("#modal-details").modal('show');
    };
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "group"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".group_badge").hide();
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
        $(".details").click(ViewDetails);
    };
    init();
};

Controllers.AdminHelicopter = function () {
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];
        setTimeout(function () { window.location.href= "/admin/helicopter-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search";}, 100);
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
        setTimeout(function () { window.location.href= "/admin/helicopter-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search";}, 50);
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location.href= "/admin/helicopter-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search;}, 50);
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
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "helicopter"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    var ViewDetails = function () {
        var data = $(this).data('source');
        $("#person").val(data.contact_person);
        $("#company").val(data.company);
        $("#phone").val(data.phone);
        $("#email").val(data.email);
        $("#departure").val(data.departure);
        $("#destination").val(data.destination);
        $("#date").val(data.date);
        $("#time").val(data.time);
        $("#travelers").val(data.travellers);
        $("#status").val(data.status);        
        $("#modal-details").modal('show');
    };
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "helicopter"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".helicopter_badge").hide();
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
        $(".details").click(ViewDetails);
    };
    init();
};

Controllers.AdminCargo = function () {
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];
        setTimeout(function () { window.location.href= "/admin/cargo-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search";}, 100);
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
        setTimeout(function () { window.location.href= "/admin/cargo-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search";}, 50);
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location.href= "/admin/cargo-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search;}, 50);
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
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "cargo"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    var ViewDetails = function () {
        var data = $(this).data('source');        
        $("#person").val(data.contact_person);
        $("#company").val(data.company);
        $("#phone").val(data.phone);
        $("#email").val(data.email);
        $("#departure").val(data.departure);
        $("#destination").val(data.destination);
        $("#date").val(data.date);
        $("#status").val(data.status);        
        $("#modal-details").modal('show');
    };
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "cargo"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".cargo_badge").hide();
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
        $(".details").click(ViewDetails);
    };
    init();
};

Controllers.AdminMeet = function () {
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];
        setTimeout(function () { window.location.href= "/admin/meet-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search";}, 100);
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
        setTimeout(function () { window.location.href= "/admin/meet-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search";}, 50);
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location.href= "/admin/meet-search-charter?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search;}, 50);
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
    };
    init();
};

Controllers.AdminLimousine = function () {
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];
        setTimeout(function () { window.location.href= "/admin/airport-search-limousine?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+"search";}, 100);
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
        setTimeout(function () { window.location.href= "/admin/airport-search-limousine?startDate="+startDate+"&endDate="+endDate+"&status="+status+"&search="+"search";}, 50);
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location.href= "/admin/airport-search-limousine?startDate="+startDate+"&endDate="+endDate+"&status="+"all-status"+"&search="+search;}, 50);
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
        if (response.data.handling_badge != 0) {
            $(".handling_badge").attr('style', "display:inline;");
            $(".handling_badge").html(response.data.handling_badge);
        }
        if (response.data.passenger_badge != 0) {
            $(".passenger_badge").attr('style', "display:inline;");
            $(".passenger_badge").html(response.data.passenger_badge);
        }    
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "limousine"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
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
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "limousine"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".limousine_badge").hide();
        $(".comments").click(viewDetails);
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
    };
    init();
};

Controllers.AdminHandling = function () {
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];
        setTimeout(function () { window.location.href= "/admin/handling-requests-search?startDate="+startDate+"&endDate="+endDate+"&search="+"search";}, 50);
    });    
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location.href= "/admin/handling-requests-search?startDate="+startDate+"&endDate="+endDate+"&status="+"&search="+search;}, 50);
        }
    });        
          
    var viewDetails = function (e) {
        e.preventDefault();
        var data = $(this).data('source');
        $("#phone").intlTelInput("setNumber", data.phone);
        $("#email").val(data.email);
        $("#airport").val(data.airport);
        $("#company").val(data.company);$("#crew_config1").val(data.crew_config1);$("#crew_config2").val(data.crew_config2);$("#aircraft").val(data.aircraft_type);
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
        if (response.data.emptyleg_badge != 0) {
            $(".emptyleg_badge").attr('style', "display:inline;");
            $(".emptyleg_badge").html(response.data.emptyleg_badge);
        }
        var data = {"dest": "badgeshowing", "type": "handling"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };    
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "handling"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".handling_badge").hide();
        $(".comments").click(viewDetails);
        $("#close").click(close);
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
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

Controllers.AdminPassenger = function () {
    var pagination_items = $(".pagination li a");
    pagination_items.each(function(index, value){
        var href = $(value).attr('href')+"&startDate="+startDate+"&endDate="+endDate+"&search="+"search";
        $(value).attr('href',href);
    });
    $('input[name="datepicker"]').on('apply.daterangepicker', function(ev, picker) {
        var startDate= $("#datepicker").val().split('-')[0];
        var endDate= $("#datepicker").val().split('-')[1];
        setTimeout(function () { window.location.href= "/admin/air-search-passenger?startDate="+startDate+"&endDate="+endDate+"&search="+"search";}, 100);
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location.href= "/admin/air-search-passenger?startDate="+startDate+"&endDate="+endDate+"&search="+search;}, 50);
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

Controllers.AdminCustomers = function () {
    var OnResponse = function (response) {        
        setTimeout(function () { window.location.href= "/admin/single-customer/" + response.data.user_id;}, 100);
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
    var DeleteUser = function () {
        var data = {'id': this.id};
        if (confirm("Are you sure to remove this user?")) {
            Accessoslo.API.deleteCustomer(data, function (response) {
                location.reload();
            });
        }
    };

    var init = function () {
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
       $(".view_details").click(viewDetails);
       $(".delete_user").click(DeleteUser);
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
            setTimeout(function () { window.location = "/admin/partners-search?search="+search;}, 50);
        }
    });
    var addNew = function (e) {
        e.preventDefault();
        $("#phone").intlTelInput("setNumber", "");
        $("#email").val("");
        $("#partner_name").val("");
        $("#contact_person").val("");    
        $("#partner_datepicker").val("");
        $("#coverage").val("");
        $("#avg_flight").val("");
        $("#operate_since").val("");
        $("#addtional_fee").val("");
        $("#password").val("");
        $("#repassword").val("");
        $("#description").val("");
        $("#permission").prop("checked", false);
        $("input[name=optionvalidaoc][value=" + "yes" + "]").prop('checked', false);
        $("input[name=optionvalidaoc][value=" + "no" + "]").prop('checked', false);
        $("#update").attr('style', 'display: none');
        $("#save").attr('style', 'display: block');
        $("#type-edit").attr('style', 'display: none');
        $("#type-create").attr('style', 'display: block');
        $("#new-partner-name").attr('style', 'display: block');
        $("#edit-partner-name").attr('style', 'display: none');
        $("#norway_description").summernote({
            dialogsInBody: true,
            height: 300
        });
        $("#modal-partners").modal('show');
    };
    var viewDetails = function (e) {
        e.preventDefault();
        $("#update").attr('style', 'display: block');
        $("#save").attr('style', 'display: none');

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
        $("#type-edit").attr('style', 'display: block');
        $("#type-create").attr('style', 'display: none');
        $("#new-partner-name").attr('style', 'display: none');
        $("#edit-partner-name").attr('style', 'display: block');
        $("#edit-partner-name").html(data.partner_name);
        $("#phone").intlTelInput("setNumber", data.phone);
        $("#email").val(data.email);
        $("#partner_name").val(data.partner_name);
        $("#contact_person").val(data.contact_person);        
        $("#partner_datepicker").val(data.last_audit);
        $("#coverage").val(data.coverage);
        $("#avg_flight").val(data.average_flight);
        $("#operate_since").val(data.operate_since);
        $("#description").val(data.description);
        $("#additional_fee").val(data.additional_fee);

        $("#category option").each(function() {
            if($(this).val() == data.type) {
                $(this).attr('selected', true);
            }
        });
        $("#norway_description").summernote({
            dialogsInBody: true,
            height: 300
        });
        $('#norway_description').summernote('code', data.norway_description);
        if (data.type == "norway") {
            $(".norway_description").attr('style', 'display: block;');
        }
        $("#modal-partners").modal('show');
    };
    var OnResponse = function (response) {
        window.location = "/admin/partners";
    };
    $("#category").on('change', function () {
        if ($(this).val() == "norway") {
            $(".norway_description").attr('style', 'display: block;');
        } else {
            $(".norway_description").attr('style', 'display: none;');
        }
    });
    $("#file_upload").on('change', function() {
        var formdata = new FormData();
        formdata.append('file', this.files[0]);
        $.ajax({
          type: 'post',
          dataType: 'json',
          url: '/users/partner_logo_img',
          data: formdata,
          processData: false,
          contentType: false,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (e) {
              $("#sub_img").val(e.data);
          }
        });
    });
    $("#main_image_upload").on('change', function() {
        var formdata = new FormData();
        formdata.append('file', this.files[0]);
        $.ajax({
          type: 'post',
          dataType: 'json',
          url: '/users/partner_logo_img',
          data: formdata,
          processData: false,
          contentType: false,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (e) {
            $("#main_img").val(e.data);
          }
        });
    });
    var OnCreateResponse = function(e) {
        $('#norway_description').summernote('destroy');
        if (e.success == true) {
            $("#modal-partners").modal('hide');
            window.location = "/admin/partners";
        } else {
            alert("Email is invalid. The partner is already existed.");
        }        
    };

    var save = function (e) {
        e.preventDefault();        
        var permission = ""; var valid = "";
        if($("#permission").is(":checked")) { permission = "true"; } else { permission = "false"; }
        if($("input[name=optionvalidaoc][value=" + "yes" + "]").is(":checked")) { valid = "true"; } else { valid = "false"; }
        if ($("#phone").intlTelInput("isValidNumber")) {
            if ($('#password').val() == $("#repassword").val()) {
                if ($("#partner_form").valid()) {
                    var new_partner = {
                        'first_name': $("#contact_person").val().split(" ")[0],
                        'last_name': $("#contact_person").val().split(" ")[1],
                        'password': $("#password").val(),
                        'partner_name': $("#partner_name").val(),
                        'contact_person': $("#contact_person").val(),
                        'phone': $("#phone").intlTelInput("getNumber"),
                        'email': $("#email").val(),
                        'last_audit': $("#partner_datepicker").val(),
                        'coverage': $("#coverage").val(),
                        'average_flight': $("#avg_flight").val(),
                        'operate_since': $("#operate_since").val(),
                        'additional_fee': $("#additional_fee").val(),
                        'description': $("#description").val(),
                        'type': $("#category").val(),
                        'permission': permission,
                        'valid': valid,
                        'main_img': $("#main_img").val(),
                        'sub_img': $("#sub_img").val(),
                        'norway_description': $("#norway_description").summernote('code')
                    };
                    Accessoslo.API.createPartner(new_partner, OnCreateResponse);   
                }                
            } else {
                alert("please check password again!");
            }
        } else {
            alert("Invalid phone number!");
        }
    };

    var OnUpdateResponse = function (response) {
        $('#norway_description').summernote('destroy');
        if (response.success == true) {
            $("#modal-partners").modal('hide');
            window.location = "/admin/partners";
        } else {
            alert(response.error);
        }
    };

    var update = function (e) {
        e.preventDefault();
        var permission = ""; var valid = "";
        if($("#permission").is(":checked")) { permission = "true"; } else { permission = "false"; }
        if($("input[name=optionvalidaoc][value=" + "yes" + "]").is(":checked")) { valid = "true"; } else { valid = "false"; }
        if ($("#phone").intlTelInput("isValidNumber")) {
            if ($('#password').val() == $("#repassword").val()) {
                if ($("#partner_form").valid()) {
                    var new_partner = {
                        'first_name': $("#contact_person").val().split(" ")[0],
                        'last_name': $("#contact_person").val().split(" ")[1],
                        'password': $("#password").val(),
                        'partner_name': $("#partner_name").val(),
                        'contact_person': $("#contact_person").val(),
                        'phone': $("#phone").intlTelInput("getNumber"),
                        'email': $("#email").val(),
                        'last_audit': $("#partner_datepicker").val(),
                        'coverage': $("#coverage").val(),
                        'average_flight': $("#avg_flight").val(),
                        'operate_since': $("#operate_since").val(),
                        'description': $("#description").val(),
                        'additional_fee': $("#additional_fee").val(),
                        'type': $("#category").val(),
                        'permission': permission,
                        'valid': valid,
                        'main_img': $("#main_img").val(),
                        'sub_img': $("#sub_img").val(),
                        'norway_description': $("#norway_description").summernote('code')
                    };
                    Accessoslo.API.updatePartner(new_partner, OnUpdateResponse);
                }
            } else {
                alert("please check password again!");
            }
        } else {
            alert("Invalid phone number!");
        }
    };
    
    var deleteF = function (e) {
        e.preventDefault();        
        var data = {'id': $(this).data('id')};
        if(confirm("Are you sure to remove this partner?")) {
            Accessoslo.API.deletePartner(data, OnResponse);
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
        $("#update").click(update);
        $(".delete").click(deleteF);        
        $("#partner_datepicker").datepicker({
            showOtherMonths: true,selectOtherMonths: true,minDate:new Date(), format: 'mm/dd/yyyy',
            onClose: function () {
                $('#partner_form').validate().element("#partner_datepicker");
            }
        });
        $(".date-own").datepicker({minViewMode: 2, format: 'yyyy'});
        $("#phone").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: "body",
            preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
            utilsScript: "/js/vendor/utils.js"
        });
        $('#partner_form').validate({
            errorPlacement: function () { },
            errorClass: "label",
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass("error");
                $(element).parent().removeClass("success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass("error");
                $(element).parent().addClass("success");
            },
            ignore: ".note-editor *"
        });
        $(".norway_description").attr('style', 'display: none;');
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
    var data = {};
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location.href= "/admin/empty-leg-search?search="+search;}, 50);
        }
    });
    var New = function (e) {
        e.preventDefault();
        $("#is_new").show();
        $("#add").show();
        $("#is_edit").hide();
        $("#save").hide();
        $("#departure").val("");
        $("#flight_no").val("");
        $("#destination").val("");
        $("#empty_datepicker").val("");
        $("#empty_timepicker").val("");
        $("#aircraft").val("");
        $("#seats").val("");
        $("#price").val("");
        $("#modal-empty-leg").modal("show");
    };
    var responseSave = function (response) {$("#modal-empty-leg").modal("hide");window.location.reload();};
    var Add = function (e) {
        e.preventDefault();
        if ($("#emptyleg-form").valid()) {
            var newEmptyLeg = {
                'partner_name': $("#partner_name").val(),
                'flight_no': $("#flight_no").val(),
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
        }
    };
    var responseUpdate = function (response) {$("#modal-empty-leg").modal("hide"); window.location.reload();};
    var Save = function (e) {
        e.preventDefault();
        if ($("#emptyleg-form").valid()) {
            var newEmptyLeg = {
                'id': data.id,
                'partner_name': $("#partner_name").val(),
                'flight_no': $("#flight_no").val(),
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
        }
    };
    var Edit = function (e) {
        e.preventDefault();
        data = $(this).data('source');
        $("#is_new").hide();
        $("#is_edit").show();
        $("#add").hide();
        $("#save").show();
        $("#is_partner").val(data.partner_name);
        $("#partner_name").val(data.partner_name);
        $("#departure").val(data.departure);
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
            var endpoint = 'live';
            var access_key = '8c479a455a6d8a2f5cccc8ce01819269';
            $.ajax({
                url: 'https://apilayer.net/api/' + endpoint + '?access_key=' + access_key,
                dataType: 'jsonp',
                success: function(json) {
                    var old_currency = "USD" + data.currency;
                    var price = 0;
                    if (currency == "EUR") {
                        if (is_changed) {
                            price = changed_price * (json.quotes.USDEUR / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        } else {
                            price = data.price * (json.quotes.USDEUR / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        }
                    } else  if (currency == "USD") {
                        if (is_changed) {
                            price = changed_price / json.quotes[old_currency];
                            $("#price").val((Math.round(price)).toString());
                        } else {
                            price = data.price / json.quotes[old_currency];
                            $("#price").val((Math.round(price)).toString());
                        }
                    } else  if (currency == "NOK") {
                        if (is_changed) {
                            price = changed_price * (json.quotes.USDNOK / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        } else {
                            price = data.price * (json.quotes.USDNOK / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        }
                    } else  if (currency == "GBP") {
                        if (is_changed) {
                            price = changed_price * (json.quotes.USDGBP / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        } else {
                            price = data.price * (json.quotes.USDGBP / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        }
                    } else  if (currency == "CAD") {
                        if (is_changed) {
                            price = changed_price * (json.quotes.USDCAD / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        } else {
                            price = data.price * (json.quotes.USDCAD / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        }
                    } else  if (currency == "AUD") {
                        if (is_changed) {
                            price = changed_price * (json.quotes.USDAUD / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        } else {
                            price = data.price * (json.quotes.USDAUD / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        }
                    } else  if (currency == "CNY") {
                        if (is_changed) {
                            price = changed_price * (json.quotes.USDCNY / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        } else {
                            price = data.price * (json.quotes.USDCNY / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        }
                    } else  if (currency == "JPY") {
                        if (is_changed) {
                            price = changed_price * (json.quotes.USDJPY / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        } else {
                            price = data.price * (json.quotes.USDJPY / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        }
                    } else  if (currency == "DKK") {
                        if (is_changed) {
                            price = changed_price * (json.quotes.USDDKK / json.quotes[old_currency]);
                            $("#price").val((Math.round(price)).toString());
                        } else {
                            price = data.price * (json.quotes.USDDKK / json.quotes[old_currency]);
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
    $("#partner_name").change(function () {
        var aircrafts = $("#aircraft").data('aircraft');
        $("#aircraft").find('option').remove().end().append('<option disabled selected value>Aircraft</option>').val('Aircraft');
        var current_val = this.value;
        aircrafts.forEach(function(aircraft) {
            if (aircraft.partner_name == current_val) {
                $("#aircraft").append('<option value= "' + aircraft.type + '">' + aircraft.type + '</option>');
            }
        });
    });
    $("#aircraft").change(function () {
        var aircrafts = $("#aircraft").data('aircraft');
        aircrafts.forEach(function(aircraft) {
            if (aircraft.type == this.value) {
                $("#seats").val(aircraft.capacity);
            }
        });
    });
    var responseDelete = function (response) {
        setTimeout(function () { window.location = "/admin/empty-leg"; }, 100);
    };
    var Delete = function (e) {
        e.preventDefault();
        var data = {'id': $(this).data('id'),"destination": "get"};
        if (confirm("Are you sure to delete?")) {
            Accessoslo.API.deleteEmptyLeg(data, responseDelete);
        } else {
            console.log("esc");
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
    };
    var getAirportInformation = function () {
        var airports = [];       
        var api_key = 'eb07b45ce0630bf683cd176a0174bec5';
        $.ajax({
            url: 'https://airport.api.aero/airport/?user_key=' + api_key,
            type: 'GET',
            contentType: 'application/json',
            dataType: 'jsonp',            
            success: function(e) {                
                e.airports.forEach(function(sel) {
                    if (sel.name != null) {                       
                        airports.push(sel.name + "#" + sel.code + "#" + sel.country + "#" + sel.city);
                    }
                });
                $('#departure').typeahead('destroy');
                $('#destination').typeahead('destroy');                
                $("#departure").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";

                        var query = this.query;                        
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");                        
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");                        
                        var jElem = $(html);                        
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {                            
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });                        
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });                
                $("#destination").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";

                        var query = this.query;
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");
                        var jElem = $(html);
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });                                
            }
        });
    };
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        getAirportInformation();
        $("#New").click(New);
        $("#add").click(Add);
        $("#save").click(Save);
        $(".edit").click(Edit);
        $(".delete").click(Delete);
        $("#empty_timepicker").wickedpicker({
            twentyFour: true
        });
        $("#empty_datepicker").datepicker({
            showOtherMonths: true,selectOtherMonths: true,minDate:new Date(),format: 'mm/dd/yyyy',
            onClose: function () {
                $('#emptyleg-form').validate().element("#empty_datepicker");
            }
        });
        $("#emptyleg-form").validate({
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
        $("#currency").currencySelect();
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
        setTimeout(function () { window.location.href= "/admin/emptyleg-search-charter?startDate="+startDate+"&endDate="+endDate+"&search="+"search";}, 100);
    });
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location.href= "/admin/emptyleg-search-charter?startDate="+startDate+"&endDate="+endDate+"&search="+search;}, 50);
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
        var data = {"dest": "badgeshowing", "type": "emptyleg"};
        Accessoslo.API.SetBadgeStatus(data, SetComplete);
    };
    var ViewDetails = function () {
        var data = $(this).data('source');        
        $("#person").val(data.contact_person);
        $("#company").val(data.company);
        $("#phone").val(data.phone);
        $("#email").val(data.email);
        $("#departure").val(data.departure);
        $("#destination").val(data.destination);
        $("#end_date").val(data.end_date);
        $("#end_time").val(data.end_time);
        $("#partner_name").val(data.partner_name);
        $("#aircraft").val(data.aircraft);
        $("#price").val("€" + data.price);
        $("#payment_id").val(data.payment_id);
        $("#modal-details").modal('show');
    };
    var init = function () {
        var data = {"dest": "badgeshowing", "type": "emptyleg"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".emptyleg_badge").hide();
        $("#datepicker").daterangepicker();
        $("#datepicker").val(startDate + " - " + endDate);
        $(".details").click(ViewDetails);
    };
    init();
};

Controllers.AdminPages = function () {
    var Onnew = function (e) {
        e.preventDefault();
        setTimeout(function () {
            window.location.href = "/admin/single-page/" + 0;
        }, 100);
    };
    var edit = function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        setTimeout(function () { window.location.href= "/admin/single-page/" + id;}, 100);
    };
    var deleteResponse = function (response) {
        setTimeout(function () { window.location.href= "/admin/pages";}, 100);
    };
    var Ondelete = function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var deleteData = {"dest": "delete page", "value": id};
        if (confirm("Are you sure to delete?")) {
            Accessoslo.API.deletePage(deleteData, deleteResponse);
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
        $(".edit").click(edit);
        $(".delete").click(Ondelete);
        $(".new_page").click(Onnew);
    };
    init();
};

Controllers.AdminPosts = function () {
    var New = function (e) {
        e.preventDefault();
        setTimeout(function () { window.location.href= "/admin/single-post/new";}, 100);
    };
    var edit = function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        setTimeout(function () { window.location.href= "/admin/single-post/" + id;}, 100);
    };
    var deleteResponse = function (response) {
        setTimeout(function () { window.location.href= "/admin/posts";}, 100);
    };
    var Ondelete = function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var deleteData = {"dest": "delete post", "id": id};
        if (confirm("Do you really want to delete this post?")) {
            Accessoslo.API.deletePosts(deleteData, deleteResponse);
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
    var id = "";
    var is_new = true;
    var parent_id = "";
    var count = 0;
    $("#search").keyup(function(event) {
        var search = $("#search").val();
        if (event.keyCode === 13) {
            setTimeout(function () { window.location = "/admin/aircrafts-cars-search?search="+search;}, 50);
        }
    });
    $("#file_upload").on('change', function() {
        $("#preview").show();
        var formdata = new FormData();
        formdata.append('file', this.files[0]);
        if (is_new) {
            formdata.append('id', id);                       
        } else {
            formdata.append('id', parent_id);            
        }
        
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'aircraft-image',
            data: formdata,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {                              
                if (e.data.type == "success") {
                    $('#img' + count).attr('src',e.data.url);
                } else {
                    alert("limited! Please delete one and upload again.");
                }
                if (count < 4) {
                    count ++;
                } else {
                    count = 0;
                }  
            }
        });        
    });   
    var createResponse = function (response) {        
        if (is_new) {           
            id = response.data.id;
        }
    };    
    $("#capacity").on('change', function () {
        if (is_new) {
            var data = {
                partner_name: "",
                type: $("#aircraft").val(),
                capacity: $("#capacity").val()
            };
            if (user.role_id == "0") {
                data.partner_name = $("#partner_name").val();
            } else {
                data.partner_name = partner_name;
            }
            Accessoslo.API.createAircraft(data, createResponse);
        }
    });
    $(".close").on('click', function() {
        for (var i=0; i<5; i++) {
            $('#img' + i).attr('src','');
        }
    });
    var deleteResponse = function(response) {alert("delete image successed!"); setTimeout(function () { window.location = "/admin/aircrafts";}, 50);};
    $("#delete1").on('click', function() {
        if($("#img0").attr("src") !="") {
            var url={url:$("#img0").attr("src")};
            Accessoslo.API.deleteAircraftImage(url, deleteResponse);
        }
    });
    $("#delete2").on('click', function() {
        if($("#img1").attr("src") !="") {
            var url={url:$("#img1").attr("src")};
            Accessoslo.API.deleteAircraftImage(url, deleteResponse);
        }
    });
    $("#delete3").on('click', function() {
        if($("#img2").attr("src") !="") {
            var url={url:$("#img2").attr("src")};
            Accessoslo.API.deleteAircraftImage(url, deleteResponse);
        }
    });
    $("#delete4").on('click', function() {
        if($("#img3").attr("src") !="") {
            var url={url:$("#img3").attr("src")};
            Accessoslo.API.deleteAircraftImage(url, deleteResponse);
        }
    });
    $("#delete5").on('click', function() {
        if($("#img4").attr("src") !="") {
            var url={url:$("#img4").attr("src")};
            Accessoslo.API.deleteAircraftImage(url, deleteResponse);
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
        $("#partner_name").val("");
        $("#aircraft").val("");
        $("#capacity").val("");
        $("#modal-aircrafts").modal('show');
    };
    var Add = function (e) {
        e.preventDefault();
        if($("#modal-form").valid()) {
            window.location = "/admin/aircrafts";
        }
    };

    var getSuccess = function (response) {
        for (var i=0; i<response.data.counts; i++) {
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
        $("#partner_name").val(data.partner_name);
        $("#aircraft").val(data.type);
        $("#capacity").val(data.capacity);
        $("#max_range").val(data.max_range);
        $("#manufacture").val(data.manufacture);
        if(data.wifi == "true") {
            $("#wifi").prop("checked", true);
        } else {
            $("#wifi").prop("checked", false);
        }
        if(data.flight_attendant == "true") {
            $("#flight_attendant").prop("checked", true);
        } else {
            $("#flight_attendant").prop("checked", false);
        }        
        Accessoslo.API.getAircraftImage(data, getSuccess);
    };
    
    var updateSuccess = function (response) {setTimeout(function () { window.location = "/admin/aircrafts";}, 50);};
    var Save = function (e) {
        e.preventDefault();
        $("#modal-aircrafts").modal('hide');
        for (var i=0; i<5; i++) {
            $('#img' + i).attr('src','');
        }
        var wifi = "", flight_attendant = "";
        if($("#wifi").is(":checked")) { wifi = "true"; } else { wifi = "false"; }
        if($("#flight_attendant").is(":checked")) { flight_attendant = "true"; } else { flight_attendant = "false"; }
        var data = {
            id: parent_id,
            partner_name: "",
            type: $("#aircraft").val(),
            capacity: $("#capacity").val(),
            max_range: $("#max_range").val(),
            wifi: wifi,
            manufacture: $("#manufacture").val(),
            flight_attendant: flight_attendant
        };        
        if (user.role_id == "0") {
            data.partner_name = $("#partner_name").val();
        } else {
            data.partner_name = partner_name;
        }
        Accessoslo.API.updateAircraft(data, updateSuccess);
    };

    var deleteSuccess = function (response) {        
        setTimeout(function () { window.location = "/admin/aircrafts";}, 50);
    };
    var Delete = function () {
        var id = $(this).data('delete');
        var data = {
            id: id
        };
        if(confirm("Are you sure you want to delete? Yes/no")) {
            Accessoslo.API.deleteAircraft(data, deleteSuccess);
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
    var init = function() {
        var data = {"dest": "badgeshowing", "type": "event"};
        Accessoslo.API.GetBadgeStatus(data, GetComplete);
        $(".create").click(Create);
        $(".edit").click(Edit);
        $(".delete").click(Delete);
        $("#add").click(Add);
        $("#save").click(Save);        
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
        $(".date-own").datepicker({minViewMode: 2, format: 'yyyy'});
    };
    init();
};

Controllers.MemberPassengerSettings = function () {
    var OnSaveComplete = function (response) {        
        setTimeout(function () { window.location = "/member/passenger-settings"; }, 100);
    };
    var AddPassenger = function (e) {
        e.preventDefault();
        if($("#input_form").valid()) {
            var new_passenger = {
                user_id: user.id,
                gender: $("#gender").val(),
                first_name: $("#first_name").val(),
                last_name: $("#last_name").val(),
                birth: $("#birth").val(),
                nationality: $("#nationality").val(),
                passport_no: $("#passport_no").val(),
                passport_expiry: $("#passport_expiry").val()
            };
            
            Accessoslo.API.SavePassenger(new_passenger, OnSaveComplete);
        }
    };
    var OnNoticeCount = function (response) {
        if (response.data.member_notice != 0) {
            $(".member_notice").attr("style", "display:inline;");
            $(".member_notice").html(response.data.member_notice);            
        }
    };
    var init = function () {
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        var data = {'id': user.id,"destination": "get",'email':user.email};
        Accessoslo.API.getMemberNotice(data, OnNoticeCount);
        $("#nationality").countrySelect({preferredCountries: ['no', 'se', 'gb', 'de', 'us']});
        $("#birth").datepicker({
            showOtherMonths: true,selectOtherMonths: true,minDate:new Date(),format: 'mm/dd/yyyy',
            onClose: function () {
                $('#input_form').validate().element("#birth");
            }
        });
        $("#add_passenger").click(AddPassenger);
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
        if (response.data.member_notice != 0) {
            $(".member_notice").attr("style", "display:inline;");
            $(".member_notice").html(response.data.member_notice);            
        }
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
    var getAirportInformation = function () {
        var airports = [];       
        var api_key = 'eb07b45ce0630bf683cd176a0174bec5';
        $.ajax({
            url: 'https://airport.api.aero/airport/?user_key=' + api_key,
            type: 'GET',
            contentType: 'application/json',
            dataType: 'jsonp',            
            success: function(e) {
                e.airports.forEach(function (sel) {
                    if (sel.name != null) {
                        airports.push(sel.name + "#" + sel.code + "#" + sel.country + "#" + sel.city);
                    }
                });
                $('#emptyleg_departure').typeahead('destroy');
                $('#emptyleg_destination').typeahead('destroy');
                $("#emptyleg_departure").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";

                        var query = this.query;
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");
                        var jElem = $(html);
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });
                $("#emptyleg_destination").typeahead({
                    source: airports,
                    highlighter: function (item) {
                        var parts = item.split("#");
                        var html = "<div><div class='typehead-inner'>";                        
                        html += "<div class='item-img'>" + "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' class='bpk-autosuggest__suggestion-icon-2OnBo bpk-icon--rtl-support-1DqTP' style='width: 1.5rem; height: 1.5rem;'><path d='M17.8 20.1l.6-.6c.2-.2.3-.5.2-.8l-2.2-9.3 4.1-4.2c.5-.5.5-1.3 0-1.9-.5-.5-1.4-.5-1.9 0l-4.2 4.1-9.1-2c-.3-.1-.6 0-.8.2l-.6.6c-.4.4-.3 1.1.2 1.4l7.2 3.2-3.7 3.7-2.3-.8c-.3-.1-.6 0-.8.2L3 15.2l4.2 1.6L8.8 21l1.3-1.5c.2-.2.3-.6.2-.8l-.8-2.3 3.7-3.7 3.2 7.2c.3.5 1 .6 1.4.2z'></path></svg></div>";
                        html += "<div class='item-body'>";
                        html += "<p class='item-heading'>" + "<span class='item-airport'>" + parts[0] + "<span class='item-code'> (" + parts[1] + ")</p>";
                        html += "<p class='item-sub'>" + parts[2] + ", " + parts[3] + "</p></div></div></div>";
                        
                        var query = this.query;
                        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");
                        var jElem = $(html);
                        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {
                            return this.nodeType === 3;
                        });
                        textNodes.replaceWith(function() {
                            return $(this).text().replace(reQuery, '<strong>$1</strong>');
                        });
                        return jElem.html();
                    },
                    updater: function(selectedName) {
                        var name = selectedName.split('#')[0] + " (" + selectedName.split('#')[1] + ")";
                        return name;
                    }
                });
            }
        });
    };
    var OnNoticeCount = function (response) {
        if (response.data.member_notice != 0) {
            $(".member_notice").attr("style", "display:inline;");
            $(".member_notice").html(response.data.member_notice);            
        }
    };
    var init = function () {
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        var data = {'id': user.id,"destination": "get",'email':user.email};
        Accessoslo.API.getMemberNotice(data, OnNoticeCount);
        getAirportInformation();
    };
    init();
};

Controllers.MemberDashboard = function () {
    var OnNoticeCount = function (response) {
        if (response.data.member_notice != 0) {
            $(".member_notice").attr("style", "display:inline;");
            $(".member_notice").html(response.data.member_notice);            
        }
        $("#charter_count").html(response.data.charter_count);
        $("#empty_count").html(response.data.empty_count);
        $("#transport_count").html(response.data.transport_count);
        $("#meet_count").html(response.data.meet_count);
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
        content.css("width", totalPages * (pageWidth + 10));
        initNavigation();
        navigate();
    };
    init();
};

Controllers.MakeNewRequest = function () {
    var OnNoticeCount = function (response) {
        if (response.data.member_notice != 0) {
            $(".member_notice").attr("style", "display:inline;");
            $(".member_notice").html(response.data.member_notice);            
        }
    };
    var init = function () {
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        var data = {'id': user.id,"destination": "get",'email':user.email};
        Accessoslo.API.getMemberNotice(data, OnNoticeCount);
        new Accessoslo.Controllers.carouselTab();
    };
    init();
};

Controllers.MemberUpcomingRequest = function () {
    var new_review = true, is_emptyleg = false;
    var data_id = "";
    var current_rate = {};    
    var pagination_items = $(".pagination li a");
    pagination_items.each(function (index, value) {
        var href = $(value).attr('href') + "&charter=" + type + "&status=" + status + "&show_mode=" + display_mode;
        $(value).attr('href', href);
    });
    $('#charters').on('change', function(e){
        e.preventDefault();
        var charter = "";
        if ($("#charters").val() == "charters") {
            charter = "charters";
        } else if ($("#charters").val() == "executive") {
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
            window.location.href = "/member/upcoming-request-type?charter=" + charter + "&status=" + status + "&show_mode=" + display_mode;
        }, 50);
    });
    $("#estimations").on('change', function (e) {
        e.preventDefault();        
        if ($("#estimations").val() == "all-status") {
            status = "all-status";
        } else if ($("#estimations").val() == "awaiting") {
            status = "awaiting";
        } else if ($("#estimations").val() == "sent") {
            status = "sent";
        } else if ($("#estimations").val() == "paid") {
            status = "paid";
        }
        setTimeout(function () {
            window.location.href = "/member/upcoming-request-type?charter=" + type + "&status=" + status + "&show_mode=" + display_mode;
        }, 50);
    });
    var getCurrency = function () {
        var endpoint = 'live';
        var access_key = '8c479a455a6d8a2f5cccc8ce01819269';
        $.ajax({
            url: 'https://apilayer.net/api/' + endpoint + '?access_key=' + access_key,
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
            var val = $(this).data('val');
            var symbol = $(this).data('symbol');
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
            window.location.href = "/member/make-request";
        }, 50);
    });
    $('#display1').click(function(e) {
        display_mode = "mode1";
        setTimeout(function () {
            window.location.href = "/member/upcoming-request-type?charter=" + type + "&status=" + "all-status" + "&show_mode=" + display_mode;
        }, 50);
    });
    $('#display2').click(function (e) {
        display_mode = "mode2";
        setTimeout(function () {
            window.location.href = "/member/upcoming-request-type?charter=" + type + "&status=" + "all-status" + "&show_mode=" + display_mode;
        }, 50);
    });
    var UpdateReviewResponse = function (response) {
        alert("Thank you, your review has been received.");
    };
    var reviewResponse = function (response) {
        alert("Thank you, your review has been received.");
    };
    $(".send_review").click(function(e) {
        e.preventDefault();
        var data_id = $(".flight_experience").attr('id');
        var review = {
            total_rate: $(".flight_experience").rateYo('rating'),
            highlight: $(".highlight").val(),
            atmosphere: $(".atmosphere").val(),
            testimonial: $(".testimonial").rateYo('rating'),
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
    var ViewDetails = function (e) {
        e.preventDefault();
        $(".total-box").attr('style', 'display: none;');
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
            $("#flight_experience" + data_id).rateYo({
                starWidth: "20px",
                normalFill: "#808080",
                ratedFill: "#F39C12",
                halfStar: true,
                rating: response.data.total_rate
            });
            $("#testimonial" + data_id).rateYo({
                starWidth: "20px",
                normalFill: "#808080",
                ratedFill: "#F39C12",
                halfStar: true,
                rating: response.data.testimonial
            });
            $(".highlight").val(response.data.highlight);
            $(".atmosphere").val(response.data.atmosphere);
        } else {            
            $("#flight_experience" + data_id).rateYo({
                starWidth: "20px",
                normalFill: "#808080",
                ratedFill: "#F39C12",
                halfStar: true
            });
            $("#testimonial" + data_id).rateYo({
                starWidth: "20px",
                normalFill: "#808080",
                ratedFill: "#F39C12",
                halfStar: true
            });
            $(".highlight").val("");
            $(".atmosphere").val("");
        }
    };
    var WriteReview = function (e) {
        e.preventDefault();
        var data = $(this).data("source");
        $(".title").html(data.partner_name);
        $(".title").val(data.partner_name);        
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
        $("#invoice_no").html("#"+data.id+"NO");
        $("#price").html("€" + data.total_cost);
        $("#viewDetails").modal('show');
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
        $("#limousine_from_address").html(data.from_address);
        $("#limousine_to_address").html(data.to_address);
        $("#limousine_type_car").html(data.type_car);
        $("#limousine_contact_person").html("Hi, " + data.contact_person + ". ");
        if (data.type_flight == "One Way") {
            $(".is_return").attr('style', 'display: none;');
        }
        $("#limousine_return_from_address").html(data.return_from_address);
        $("#limousine_return_to_address").html(data.return_to_address);
        $("#limousine_type_travel").html(data.type_flight);
        $("#limousine_return_date").html(data.return_date);
        $("#limousine_return_time").html(data.return_time);
        $("#limousine_type_car").html(data.type_car);
        $("#limousine_contact_person").html(data.contact_person);
        $("#limousine_phone").html(data.phone);
        $("#limousine_email").html(data.email);
        if (data.company != " ") {
            $("#limousine_company").html(data.company);
        }
        $("#limousine_payment_id").html("#" + data.id + "NO");
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
        var month = "";
        if (string[1] == "01") {month = "January";} if (string[1] == "07") {month = "July";}
        if (string[1] == "02") {month = "Feburary";} if (string[1] == "08") {month = "August";}
        if (string[1] == "03") {month = "March";} if (string[1] == "09") {month = "September";}
        if (string[1] == "04") {month = "April";} if (string[1] == "10") {month = "October";}
        if (string[1] == "05") {month = "May";} if (string[1] == "11") {month = "November";}
        if (string[1] == "06") {month = "June";} if (string[1] == "12") {month = "December";}
        $("#meet_created_date").html(daystring[0] + ", " + month + " " + string[0]);
        $("#meet_created_time").html(daystring[1]);
        $("#meet_person").html(data.contact_person);
        $("#meet_phone").html(data.phone);
        $("#meet_email").html(data.email);
        $("#meet_company").html(data.company);
        $("#meet_travelers").html(data.travelers);
        if (data.is_arrival == "true" && data.is_departure == "true") {
            $(".inbound-box").attr('style', 'display: block;');
            $(".outbound-box").attr('style', 'display: block;');
            $("#meet_service").html("Meet & Greet - Arrival & Departure");
            $("#meet_in_airline").html(data.in_airline);
            $("#meet_in_date").html(data.in_date);
            $("#meet_in_time").html(data.in_time);
            $("#meet_in_luggage").html(data.in_luggage);
            $("#meet_in_booking_reference").html(data.in_booking_reference);
            $("#meet_in_connect_flight_number").html(data.in_connect_flight_number);
            $("#meet_out_airline").html(data.out_airline);
            $("#meet_out_date").html(data.out_date);
            $("#meet_out_time").html(data.out_time);
            $("#meet_out_luggage").html(data.out_luggage);
            $("#meet_out_booking_reference").html(data.out_booking_reference);
            $("#meet_out_connect_flight_number").html(data.out_connect_flight_number);
        } else if (data.is_arrival == "true") {
            $(".inbound-box").attr('style', 'display: block;');
            $(".outbound-box").attr('style', 'display: none;');
            $("#meet_service").html("Meet & Greet - Arrival");
            $("#meet_in_airline").html(data.in_airline);
            $("#meet_in_date").html(data.in_date);
            $("#meet_in_time").html(data.in_time);
            $("#meet_in_luggage").html(data.in_luggage);
            $("#meet_in_booking_reference").html(data.in_booking_reference);
            $("#meet_in_connect_flight_number").html(data.in_connect_flight_number);
        } else if (data.is_departure == "true") {
            $(".inbound-box").attr('style', 'display: none;');
            $(".outbound-box").attr('style', 'display: block;');
            $("#meet_service").html("Meet & Greet - Departure");
            $("#meet_out_airline").html(data.out_airline);
            $("#meet_out_date").html(data.out_date);
            $("#meet_out_time").html(data.out_time);
            $("#meet_out_luggage").html(data.out_luggage);
            $("#meet_out_booking_reference").html(data.out_booking_reference);
            $("#meet_out_connect_flight_number").html(data.out_connect_flight_number);
        }
        $("#meet_contact_person").html("Hi, " + data.contact_person + ". ");
        $("#meet_booking_no").html("#"+data.id+"NO");
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
            if (data.currency == "EUR") {
                $("#empty_price").html("€" + data.price);
            } else if(data.currency == "GBP") {
                $("#empty_price").html("£" + data.price);
            } else if(data.currency == "USD" || data.currency == "CAD" || data.currency == "AUD") {
                $("#empty_price").html("$" + data.price);
            } else if(data.currency == "JPY" || data.currency == "CNY") {
                $("#empty_price").html("¥" + data.price);
            } else if(data.currency == "DKK" || data.currency == "NOK") {
                $("#empty_price").html("kr " + data.price);
            }
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
        $("#empty_booking_no_footer").html("#"+data.id+"NO");
        $("#empty_travel_time").html(data.end_time);
        $("#empty_from_airport").html(data.departure);
        $("#empty_to_airport").html(data.destination);
        $("#empty_aircraft").html(data.aircraft);
        $("#empty_contact_person").html("Hi, " + data.contact_person + ". ");
        $("#EmptylegViewDetails").modal('show');
    };
    var OnDeleteResponse = function (response) {        
        location.reload(true);
    };
    var DeleteRequests = function (e) {
        e.preventDefault();
        var target = $(".cancel").attr('target');
        var type = $(".cancel").attr('name');
        var data = {type: type, target:target};
        if (type == 'limousine') {
            Accessoslo.API.DeleteLimousine(data, OnDeleteResponse);
        } else if (type == 'meet') {
            Accessoslo.API.DeleteMeet(data, OnDeleteResponse);
        } else if (type == 'executive' || type == 'group' || type == 'helicopter') {
            Accessoslo.API.DeleteCharters(data, OnDeleteResponse);
        }
        $("#cancelRequest").modal('hide');
    };
    var OnNoticeCount = function (response) {};
    var CancelEstimation = function (e) {
        e.preventDefault();
        var data = $(this).data('source');
        if(confirm("Are you sure to cancel this estimation?")) {
            Accessoslo.API.deleteEstimation(data, OnDeleteResponse);
        }
    };
    var FilterMobileResponsive = function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(".top-box").removeClass('active');
            $(".filter-btn-title").html('Filter');
            $(".options-box").attr('style', 'display: none;');
        } else {
            $(this).addClass('active');
            $(".top-box").addClass('active');
            $(".filter-btn-title").html('Close');
            $(".options-box").attr('style', 'display: block;');
        }
    };
    $(".view_estimations").click(function () {
        var estimations = $(this).data('estimations');
        estimations.forEach(item => {
            if ($("#estimate_slide"+item.charter_id+item.id+">ul>li").length == 1) {
                $('#estimate_slide'+item.charter_id+item.id).slide({isShowDots: false, isShowArrow: false});
            } else {
                $('#estimate_slide'+item.charter_id+item.id).slide({isShowDots: false});
            }
        });
    });
    var init = function () {
        $(".dashboard_btn").attr('style', 'display: inline-block; float:right; margin-right:10px; margin-top:8px;');
        var data = {
            'id': user.id,
            "destination": "get",
            'email': user.email
        };
        Accessoslo.API.setMemberNotice(data, OnNoticeCount);
        $(".cancel").click(DeleteRequests);
        $("#currency").currencySelect();        
        $(".view_details").click(ViewDetails);
        $(".cancel_request").click(CancelRequest);
        $(".cancel_estimation").click(CancelEstimation);
        $(".booking_receipt").click(BookingReceipt);
        $(".write_review").click(WriteReview);        
        $(".limousine_view").click(LimousineViewDetails);
        $(".meet_view").click(MeetViewDetails);
        $(".empty_view").click(EmptylegViewDetails);
        $(".filter-btn").click(FilterMobileResponsive);
        if (type == "executive" || type == "group" || type == "helicopter") {
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
        }
        getCurrency();
        if (count == 0) {
            if (type == "charters") {
                if (status != "all-status") {
                    if (status == "sent") {
                        $(".no_results_alert").html("No results found for received Air Charter Request");
                    } else {
                        $(".no_results_alert").html("No results found for " + status + " Air Charter");
                    }                    
                } else {
                    $(".no_results_alert").html("No results found for Air Charter");
                }       
            } else if (type == "executive") {
                if (status != "all-status") {
                    if (status == "sent") {
                        $(".no_results_alert").html("No results found for received Executive Charter Request");
                    } else if (status == "paid") {
                        $(".no_results_alert").html("No results found for request history of Executive Charter");
                    } else {
                        $(".no_results_alert").html("No results found for " + status + " Executive Charter"); 
                    }
                } else {
                    $(".no_results_alert").html("No results found for Executive Charter");
                }
            } else if (type == "emptyleg") {
                if (status != "all-status") {
                    if (status == "sent") {
                        $(".no_results_alert").html("No results found for received Emptyleg Charter Request");
                    }  else if (status == "paid") {
                        $(".no_results_alert").html("No results found for request history of Emptyleg Charter");
                    } else {
                        $(".no_results_alert").html("No results found for " + status + " Emptyleg Charter");
                    }
                } else {
                    $(".no_results_alert").html("No results found for Emptyleg Charter");
                }
            } else if (type == "limousine") {
                if (status != "all-status") {
                    if (status == "sent") {
                        $(".no_results_alert").html("No results found for received Limousine Transport Request");
                    } else if (status == "paid") {
                        $(".no_results_alert").html("No results found for request history of Limousine Transport");
                    } else {
                        $(".no_results_alert").html("No results found for " + status + " Limousine Transport");
                    }
                } else {
                    $(".no_results_alert").html("No results found for Limousine Transport");
                }
            } else if (type == "meet") {
                if (status != "all-status") {
                    if (status == "sent") {
                        $(".no_results_alert").html("No results found for received Meet & Greet Request");
                    } else if (status == "paid") {
                        $(".no_results_alert").html("No results found for request history of Meet & Greet Request");
                    } else {
                        $(".no_results_alert").html("No results found for " + status + " Meet & Greet");
                    }
                } else {
                    $(".no_results_alert").html("No results found for Meet & Greet");
                }                
            }            
        }
    };
    init();
};

var Accessoslo = {
  API: new API(),
  Controllers: Controllers
};
