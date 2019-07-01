var form = angular.module('form', []);

form.controller('FormController', function($scope,$http,$filter) {

    $scope.dateAfter = function(days, end = false){
        var hour = 1000*60*60;
        var day = hour*24;
        var date = new Date(Date.now() + days * day);
        if (end) {
            date.setHours(23, 59, 0, 0);
        } else {
            date.setHours(0, 0, 0, 0);
        }
        return date;
    };
});
