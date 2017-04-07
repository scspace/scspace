var book = angular.module('book', []);

book.controller('BookController', function($scope, $http) {
    $scope.orderProperty = 'title';
    /**
    $http({
        method: "GET",
        url: "/api/book"
    }).then(function success(response){
        $scope.books = response.data;
    }, function error(response){
        $scope.books = response.statusText;
    });
    **/
    $scope.offset = 1;

    $scope.offsetDown = function(){
        if ($scope.offset > 1){
            $scope.offset -= 1;
        }
    }

    $scope.offsetUp = function(){
        if ($scope.offset < $scope.filtered.length/10){
            $scope.offset += 1;
        }
    }
});
