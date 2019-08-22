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
      $scope.air_types = [];
      $scope.OnSend = function () {       
        if($('#input-form').valid()){
          if ($("#mobile-number").intlTelInput('isValidNumber')) {
            $scope.passenger.phone = $("#mobile-number").intlTelInput("getNumber");
            $(".confirm").addClass("submit");
            $(".confirm").html("<div class='ld ld-ring ld-spin-fast waiting-animation'></div>");
            accessosloAPI.services.request($scope.passenger, function (response) {
              if (user != null) {
                $(".confirm").removeClass("submit");
                $(".confirm").html("Send Request");
                $("#BookSuccessMessage").modal('show');  
              } else {
                $(".confirm").removeClass("submit");
                $(".confirm").html("Send Request");
                $("#BookSuccessMessage").modal('show');
              }
            });
          } else {
            alert("Invalid phone number!");
          }
        } 
      };
            
      $scope.closeSuccess = function () {
        $("#BookSuccessMessage").modal('hide');
        location.reload();
      };
      $("#file_upload").on('change', function() {
        var formdata = new FormData();
        formdata.append('file', this.files[0]);        
        $.ajax({
          type: 'post',
          dataType: 'json',
          url: '/stores/handling-document',
          data: formdata,
          processData: false,
          contentType: false,
          beforeSend: function (request) {
            request.setRequestHeader("X-CSRF-TOKEN", config.token);
          },
          success: function (e) {
            $scope.passenger.attach_doc = e.data.path;            
          }
        });
      });

      var init = function () {        
        $("#mobile-number").intlTelInput({
          allowDropdown: true,
          autoHideDialCode: false,
          autoPlaceholder: "polite",
          dropdownContainer: "body",
          preferredCountries: ['no', 'se', 'gb', 'de', 'us'],
          utilsScript: "/js/vendor/utils.js"
        });
        if (user != null) {
          $(".redirect_login").attr('style', 'display: none');
          if (user.first_name != null || user.last_name != null) {
            $scope.passenger.person = user.first_name + " " + user.last_name;
          }
          if (user.email != null) {
            $scope.passenger.email = user.email;
          }
          if (user.phone != null) {
            $("#mobile-number").intlTelInput("setNumber", user.phone);           
          }
          if (user.company != null) {
            $scope.passenger.company = user.company;
          }
        } else {
          $(".redirect_upcoming").attr('style', 'display: none');
        }
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
        $("#outbound_date").datepicker({
          showOtherMonths: true, selectOtherMonths: true, minDate: new Date(), format: 'mm/dd/yyyy',
          onClose: function () {
            $('#input-form').validate().element("#outbound_date");
          }
        });
        $("#inbound_date").datepicker({
          showOtherMonths: true, selectOtherMonths: true, minDate: new Date(), format: 'mm/dd/yyyy',
          onClose: function () {
            $('#input-form').validate().element("#inbound_date");
          }
        });
      };
      init();
    }
  };
}]);