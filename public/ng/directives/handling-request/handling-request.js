'use strict';
var application = angular.module('accessosloApp.application', []);
var accessosloHandlingrequest = angular.module('accessosloApp.accessosloHandlingrequest', []);
var accessosloApp = angular.module('accessosloApp', ['accessosloApp.application', 'accessosloApp.accessosloHandlingrequest']);

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

  extended.request = function (data, onSuccess, onError) {    
    apiRequest.ajax("POST", endpoint + "/handling-request", data, onSuccess, onError);
  };

  return extended;
}]);

'use strict';
accessosloHandlingrequest.directive('accessosloHandlingrequest', ["accessosloAPI", function (accessosloAPI) {
  return {
    templateUrl: '/ng/directives/handling-request/view.html',
    scope: {},
    controller: function ($scope) {
      $scope.passenger = {};

      $scope.OnSend = function () {       
        if($('#input-form').valid()){
          if ($("#mobile-number").intlTelInput('isValidNumber')) {
            $scope.passenger.phone = $("#mobile-number").intlTelInput("getNumber");
            var loading = new Loading({ title: 'Please check your email.', discription: 'Loading...' });
            accessosloAPI.services.request($scope.passenger, function (response) {
              setTimeout(function () { window.location = response.redirect;}, 0);               
            });         
          } else {
            alert("Invalid phone number!");
          }
        } 
      };

      var init = function () {
        $("#outbound_date").datepicker();
        $("#inbound_date").datepicker();
        $("#mobile-number").intlTelInput({
          allowDropdown: true,
          autoHideDialCode: false,
          autoPlaceholder: "polite",
          dropdownContainer: "body",
          preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
          utilsScript: "/js/vendor/utils.js"
        });
        $('#input-form').validate({             
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
    }
  };
}]);