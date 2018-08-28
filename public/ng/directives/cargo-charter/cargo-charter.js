'use strict';
var application = angular.module('accessosloApp.application', []);
var accessosloCargocharter = angular.module('accessosloApp.accessosloCargocharter', []);
var accessosloApp = angular.module('accessosloApp', ['accessosloApp.application', 'accessosloApp.accessosloCargocharter']);

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

  return extended;
}]);
application.factory("chartersAPI", ['apiRequest', function (apiRequest) {
  var extended = {};
  var endpoint = "charters";

  extended.cargo_booking = function (flight, onSuccess, onError) {    
    apiRequest.ajax("POST", endpoint + "/cargo-booking", flight, onSuccess, onError);
  };

  return extended;
}]);

'use strict';
accessosloCargocharter.directive('accessosloCargocharter', ["accessosloAPI", function (accessosloAPI) {
  return {
    templateUrl: '/ng/directives/cargo-charter/view.html',
    scope: {},
    controller: function ($scope) {
      $scope.visible_step1 = true;$scope.visible_step2 = false;$scope.visible_step3 = false; $scope.isvalid = false;
      $scope.quoteDetails = [];
      $scope.OnContinue = function () {
        if ($('#step1_form').valid()) {     
          $scope.visible_step1 = false;
          $scope.visible_step2 = true;         
        }
      };
      $scope.OnPrevious = function () {   
        $scope.visible_step1 = true;
        $scope.visible_step2 = false;  
      };
      $scope.OnConfirm = function () {       
        if ($('#step2_form').valid()) {          
          if ($("#mobile-number").intlTelInput('isValidNumber')) {              
            var flight_data = {
              departure: $scope.quoteDetails.goods.departure, 
              destination: $scope.quoteDetails.goods.destination,
              date: $scope.quoteDetails.goods.date,
              width:$scope.quoteDetails.goods.width,
              height:$scope.quoteDetails.goods.height,
              depth:$scope.quoteDetails.goods.depth,
              weight:$scope.quoteDetails.goods.weight,
              is_danger: $scope.quoteDetails.goods.is_danger,
              cargo_type: $scope.quoteDetails.goods.cargoType,
              contact_person: $scope.quoteDetails.contact.person,
              company: $scope.quoteDetails.contact.company,
              phone: $("#mobile-number").intlTelInput("getNumber"),
              email: $scope.quoteDetails.contact.email,
              status: "awaiting"
            };
            var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });
            accessosloAPI.charters.cargo_booking(flight_data, function (response) {            
              $scope.visible_step1 = false; $scope.visible_step2 = false;  $scope.visible_step3 = true;
              $scope.$apply();
              setTimeout(() => loading.out(), 10000);            
            });
          } else {
            alert("Invalid phone number!");
          }
        }
      };

      $scope.NewRequest = function () {
        $scope.visible_step1 = true; $scope.visible_step2 = false;  $scope.visible_step3 = false;  $scope.quoteDetails = [];
      };

      $scope.Upcoming = function () {
        setTimeout(function () { window.location = "/member/upcoming-request";}, 1500);
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
              $('#step1_form').validate().element("#datepicker");
        }});
      }
      init();
    }
  };
}]);