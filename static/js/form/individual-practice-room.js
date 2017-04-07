var form = angular.module('form', []);

form.controller('FormController', function($scope,$http,$filter) {

    $scope.dateAfter = function(days){
        var hour = 1000*60*60;
        var day = hour*24;
        var date = new Date(Date.now() + 3 * hour + days * day);
        return new Date(date.setHours(0,0,0,0));
    };

    $scope.validity = false;

    $scope.timeValidate = function(time_from,time_to,space,student_id){
        if (space != undefined && time_from.$valid && time_to.$valid){

            data = {'space':space
                ,'time_from':time_from.$viewValue
                ,'time_to':time_to.$viewValue
            };

            $http({
                method: 'POST',
                url: '/api/calendar/validate',
                data: $.param(data),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function success(response){
                $scope.responseError = false;
                $scope.isValidTime = response.data['status'];
                $scope.message = response.data['message'];
                if (response.data['status'] == 'valid') $scope.validity = true;
            }, function error(response){
                $scope.responseError = true;
            });
        } else {
            console.log('sad');
        }
    };

});
