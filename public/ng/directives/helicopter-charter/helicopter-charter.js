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
      $scope.quoteDetails = [];

      $scope.OnContinue = function () {      
        if ($("#step1_form").valid()) {
          if ($("#mobile-number").intlTelInput('isValidNumber')) {
            $scope.quoteDetails.contact.phone = $("#mobile-number").intlTelInput("getNumber");
            var full_name = $scope.quoteDetails.contact.full_name.split(" ");
            $scope.quoteDetails.contact.first_name = full_name[0];
            $scope.quoteDetails.contact.last_name = full_name[1];            
            accessosloAPI.users.find($scope.quoteDetails.contact, function (response) {          
              if (response == "error") {
                var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });
                accessosloAPI.users.create($scope.quoteDetails.contact, function (response) {                                             
                  window.location = "/loyalty-program/login-redirect?redirect="+"helicopter";        
                });           
              } 
            });
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
      };

      $scope.OnConfirm = function () {    
        if ($('#step2_form').valid()) {            
          var flight_data = {
            departure: $scope.quoteDetails.flight.from_airport, 
            destination: $scope.quoteDetails.flight.to_airport,
            date: $scope.quoteDetails.flight.depature_time,
            travellers: $scope.quoteDetails.flight.passenger_num,
            flight_type: $scope.quoteDetails.flight.flight_type,
            contact_person: $scope.quoteDetails.contact.full_name,
            phone: $scope.quoteDetails.contact.phone,
            email: $scope.quoteDetails.contact.email,
            company: $scope.quoteDetails.contact.company,
            status: "awaiting",
            booking_type: "helicopter"
          };
          var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });
          accessosloAPI.charters.create(flight_data, function (response) {
            $scope.visible_step1 = false;$scope.visible_step2 = false; $scope.visible_step3 = true;
            $scope.$apply();            
            setTimeout(() => loading.out(), 10000);            
          });
        }
      };
      
      $scope.UpcomingRequest = function () {
        setTimeout(function () { window.location = "/member/upcoming-request";}, 1500);
      };

      $scope.NewRequest = function () {
        $scope.visible_step1 = true; $scope.visible_step2 = false;  $scope.visible_step3 = false;  $scope.quoteDetails = [];
      };

      var init = function () {
        $("#mobile-number").intlTelInput({
          allowDropdown: true,
          autoHideDialCode: false,
          autoPlaceholder: "polite",
          dropdownContainer: "body",
          preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
          utilsScript: "/js/vendor/utils.js"
        });
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
        showOtherMonths: true,selectOtherMonths: true,
        onClose: function () {
            $('#step2_form').validate().element("#datepicker");
      }});
      init();
    }
  };
}]);