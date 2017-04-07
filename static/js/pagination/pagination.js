var pagination = angular.module('pagination', []);

pagination.controller('PaginationCtrl', function($scope) {

    $scope.offset = 1;

    $scope.offsetDown = function(){
        if ($scope.offset > 1){
            $scope.offset -= 1;
        }
    }

    $scope.offsetUp = function(){
        $scope.offset += 1;
    }
});
