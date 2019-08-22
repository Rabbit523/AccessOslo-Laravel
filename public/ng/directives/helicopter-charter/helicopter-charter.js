'use strict';
var application = angular.module('accessosloApp.application', []);
var accessosloHelicoptercharter = angular.module('accessosloApp.accessosloHelicoptercharter', []);
var accessosloApp = angular.module('accessosloApp', ['accessosloApp.application', 'accessosloApp.accessosloHelicoptercharter']);

'use strict';
application.factory('apiRequest', [function () {
  var instance = {};
  instance.ajax = function (type, endpoint, data, onSuccess, onError) {
    $.ajax({
      type: type,
      url: config.server + endpoint,
      data: data,
      beforeSend: function (request) {
        request.setRequestHeader("X-CSRF-TOKEN", config.token);
      },
      success: function (response) {
        if (response.success) {
          onSuccess(response.data);
        } else {
          onError(response.error);
        }
      },
      error: onError
    });
  };
  return instance;
}]);
application.factory('accessosloAPI', ['usersAPI', 'chartersAPI', function (usersAPI, chartersAPI) {
  var instance = {};
  instance.users = usersAPI;
  instance.charters = chartersAPI;
  return instance;
}]);
application.factory("usersAPI", ['apiRequest', function (apiRequest) {
  var extended = {};
  var endpoint = "users";

  extended.create = function (user, onSuccess, onError) {    
    apiRequest.ajax("POST", endpoint + "/create", user, onSuccess, onError);
  };
  extended.find = function (user, onSuccess, onError) {    
    apiRequest.ajax("POST", endpoint + "/find", user, onSuccess, onError);
  };
  return extended;
}]);
application.factory("chartersAPI", ['apiRequest', function (apiRequest) {
  var extended = {};
  var endpoint = "charters";

  extended.create = function (flight, onSuccess, onError) {    
    apiRequest.ajax("POST", endpoint + "/create", flight, onSuccess, onError);
  };

  return extended;
}]);


'use strict';
accessosloHelicoptercharter.directive('accessosloHelicoptercharter', ["accessosloAPI", function (accessosloAPI) {
  return {
    templateUrl: '/ng/directives/helicopter-charter/view.html',
    scope: {},
    controller: function ($scope) {
      $scope.visible_step1 = true;$scope.visible_step2 = false;$scope.visible_step3 = false;
      $scope.quoteDetails = {
        gender: "",
        full_name: "",        
        company: "",
        phone: "",
        email: ""
      };

      $scope.OnContinue = function () {      
        if ($("#step1_form").valid()) {
          if ($("#mobile-number").intlTelInput('isValidNumber')) {            
            var full_name = $scope.quoteDetails.full_name.split(" ");
            var data = {
              gender: $scope.quoteDetails.gender,
              first_name: full_name[0],
              last_name: full_name[1],
              company: $scope.quoteDetails.company,
              phone: $("#mobile-number").intlTelInput("getNumber"),
              email: $scope.quoteDetails.email
            };
            accessosloAPI.users.find(data, function (response) {          
              if (response == "error") {                
                accessosloAPI.users.create(data, function (response) {                                             
                  window.location = "/login-redirect?redirect="+"helicopter";        
                });           
              } 
            });
            $(".box-description").attr('style', 'height: 602px');
            $scope.visible_step1 = false;
            $scope.visible_step2 = true; 
          } else {
            alert("Invaild phone number!");
          }          
        }
      };

      $scope.OnPrevious = function () {   
        $scope.visible_step1 = true;
        $scope.visible_step2 = false;
        $(".box-description").attr('style', 'height: 516px');
      };

      $scope.OnConfirm = function () {    
        if ($('#step2_form').valid()) {            
          var flight_data = {
            departure: $scope.quoteDetails.from_airport, 
            destination: $scope.quoteDetails.to_airport,
            date: $scope.quoteDetails.depature_date,
            time: $scope.quoteDetails.depature_time,
            return_time: $scope.quoteDetails.return_depature_time,
            return_date: $scope.quoteDetails.return_depature_date,
            travellers: $scope.quoteDetails.passenger_num,
            flight_type: $scope.quoteDetails.flight_type,
            bonus: $scope.quoteDetails.bonus,
            contact_person: $scope.quoteDetails.full_name,
            phone: $("#mobile-number").intlTelInput("getNumber"),
            email: $scope.quoteDetails.email,
            company: $scope.quoteDetails.company,
            status: "awaiting",
            booking_type: "helicopter"
          };
          $(".confirm").addClass("submit");
          $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
          accessosloAPI.charters.create(flight_data, function (response) {
            $scope.visible_step1 = false;
            $scope.$apply();
            if (user != null) {
              $(".confirm").removeClass("submit");
              $(".confirm").html("Confirm");
              $("#BookSuccessMessage_new").modal('show');   
            } else {
              $(".confirm").removeClass("submit");
              $(".confirm").html("Confirm");
              $("#BookSuccessMessage").modal('show');
            }            
          });
        }
      };
      $scope.NewRequest = function () {
        location.reload();
      };
      $scope.closeSuccess = function () {
        $("#BookSuccessMessage_new").modal('hide');
        location.reload();
      };
      $scope.onFlightTypeChange = function () {
        if ($scope.quoteDetails.flight_type == 'Round Way') {
          $(".return-datetime").attr('style', 'display: block');
          $("#return_datepicker").prop('required',true);
          $("#return_timepicker").prop('required',true);
        } else {
          $(".return-datetime").attr('style', 'display: none');
          $("#return_datepicker").prop('required',false);
          $("#return_timepicker").prop('required',false);
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
            e.airports.forEach(sel => {
              if (sel.name != null) {                    
                  airports.push(sel.name + "#" + sel.code + "#" + sel.country + "#" + sel.city);
              }
            });
            $('#flight_departure').typeahead('destroy');
            $('#flight_destination').typeahead('destroy');
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
          }
        });
      };

      var init = function () {
        $(".return-datetime").attr('style', 'display: none');
        $(".box-description").attr('style', 'height: 516px');        
        getAirportInformation();
        $("#mobile-number").intlTelInput({
          allowDropdown: true,
          autoHideDialCode: false,
          autoPlaceholder: "polite",
          dropdownContainer: "body",
          preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
          utilsScript: "/js/vendor/utils.js"
        });
        $("#timepicker").wickedpicker({
          twentyFour: true,
          onClose: function () {
              $('#step2_form').validate().element("#meet_datepicker");
          }
        });
        if (user != null) {          
          if (user.gender != null) {
            $scope.quoteDetails.gender = user.gender;
            $("#gender").val(user.gender);
          }
          if (user.first_name != null || user.last_name != null) {
            $scope.quoteDetails.full_name = user.first_name + " " + user.last_name;            
          }
          if (user.email != null) {
            $scope.quoteDetails.email = user.email;
          }
          if (user.phone != null) {
            $("#mobile-number").intlTelInput("setNumber", user.phone);           
          }
          if (user.company != null) {
            $scope.quoteDetails.company = user.company;
          }
        }
        $('#step1_form').validate({             
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
        $('#step2_form').validate({             
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
        $("#datepicker").datepicker({
          showOtherMonths: true,selectOtherMonths: true,minDate:new Date(),format: 'mm/dd/yyyy',
          onClose: function () {
              $('#step2_form').validate().element("#datepicker");
        }});
        $("#return_timepicker").wickedpicker({
          twentyFour: true,
          onClose: function () {
              $('#step2_form').validate().element("#meet_datepicker");
          }
        });
        $("#return_datepicker").datepicker({
          showOtherMonths: true,selectOtherMonths: true,minDate:new Date(),format: 'mm/dd/yyyy',
          onClose: function () {
              $('#step2_form').validate().element("#datepicker");
        }});
      }
      init();
    }
  };
}]);