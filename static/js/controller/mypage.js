var mypage = angular.module('mypage', []);

mypage.controller('MypageController', function($scope,$http) {

    $scope.offset = 1;

    $scope.offsetDown = function(){
        if ($scope.offset > 1){
            $scope.offset -= 1;
        }
    }

    $scope.offsetUp = function(){
        console.log($scope.reservations.length);
        if ($scope.offset < $scope.reservations.length/10){
            $scope.offset += 1;
        }
    }

});
