'use strict';
var application = angular.module('accessosloApp.application', []);
var accessosloAirpassenger = angular.module('accessosloApp.accessosloAirpassenger', []);
var accessosloApp = angular.module('accessosloApp', ['accessosloApp.application', 'accessosloApp.accessosloAirpassenger']);

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
application.factory('accessosloAPI', ['usersAPI', 'servicesAPI', function (usersAPI, servicesAPI) {
  var instance = {};
  instance.users = usersAPI;
  instance.services = servicesAPI;
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
application.factory("servicesAPI", ['apiRequest', function (apiRequest) {
  var extended = {};
  var endpoint = "services";

  extended.booking = function (data, onSuccess, onError) {    
    apiRequest.ajax("POST", endpoint + "/passenger-tax", data, onSuccess, onError);
  };

  return extended;
}]);

'use strict';
accessosloAirpassenger.directive('accessosloAirpassenger', ["accessosloAPI", function (accessosloAPI) {
  return {
    templateUrl: '/ng/directives/air-passenger/view.html',
    scope: {},
    controller: function ($scope) {
      $scope.visible_step1 = true;$scope.visible_step2 = false;
      $scope.passenger = {};

      $scope.OnRegister = function () {               
        if ($("#input_form").valid()) {
          if ($("#mobile-number").intlTelInput('isValidNumber')) {
            $scope.passenger.phone = $("#mobile-number").intlTelInput("getNumber");
            $scope.passenger.country = $("#country").val();
            $scope.visible_step1 = false;
            $scope.visible_step2 = true;
            var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });
            accessosloAPI.services.booking($scope.passenger, function (response) {              
              setTimeout(() => loading.out(), 10000);              
            });         
          } else {
            alert("Invalid Phone number!");
          }
        } 
      };

      $scope.OnNew = function () {
        $scope.visible_step1 = true;
        $scope.visible_step2 = false;
        $scope.passenger = {};
      };

      $scope.upcomingRequest = function () {
        setTimeout(function () { window.location = "/member/upcoming-request";}, 200);
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
        $("#country").countrySelect({
          preferredCountries: ['no', 'se', 'gb', 'de', 'us']
        });
        $(".inside").attr('style', 'width:100%;');
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
      }
      init();
    }
  };
}]);