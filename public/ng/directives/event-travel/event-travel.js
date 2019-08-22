'use strict';
var application = angular.module('accessosloApp.application', []);
var accessosloEventtravel = angular.module('accessosloApp.accessosloEventtravel', []);
var accessosloApp = angular.module('accessosloApp', ['accessosloApp.application', 'accessosloApp.accessosloEventtravel']);

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
    apiRequest.ajax("POST", endpoint + "/booking-travels", data, onSuccess, onError);
  };

  return extended;
}]);


'use strict';
accessosloEventtravel.directive('accessosloEventtravel', ["accessosloAPI", function (accessosloAPI) {
  return {
    templateUrl: '/ng/directives/event-travel/view.html',
    scope: {},
    controller: function ($scope) {
      $scope.is_send = true;$scope.visible_step1 = true;$scope.visible_step2 = false;
      $scope.quoteDetails = {};

      $scope.OnSend = function () {         
      if ($('#input_form').valid()) {
          if ($("#mobile-number").intlTelInput('isValidNumber')) {
            $scope.visible_step1 = false;
            $scope.visible_step2 = true;
            $scope.quoteDetails.travel_type = "group";
            $scope.quoteDetails.phone = $("#mobile-number").intlTelInput("getNumber");            
            accessosloAPI.services.booking($scope.quoteDetails, function (response) {              
              setTimeout(() => loading.out(), 10000);               
            });         
          }
        }
      };

      $scope.OnNew = function () {
        $scope.quoteDetails = {};
        $scope.visible_step1 = true;
        $scope.visible_step2 = false;
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
        $('#input_form').validate({
          errorPlacement: function () {},
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