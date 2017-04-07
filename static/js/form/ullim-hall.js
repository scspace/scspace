var form = angular.module('form', []);

form.controller('FormController', function($scope,$http,$filter) {

    $scope.dateAfter = function(days){
        var hour = 1000*60*60;
        var day = hour*24;
        var date = new Date(Date.now() + 3 * hour + days * day);
        return new Date(date.setHours(0,0,0,0));
    };
});
