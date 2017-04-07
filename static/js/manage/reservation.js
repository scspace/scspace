var form = angular.module('manage', []);

form.controller('ManageController', function($scope,$http) {

    $scope.offset = 1;

    $scope.offsetDown = function(){
        if ($scope.offset > 1){
            $scope.offset -= 1;
        }
    }

    $scope.offsetUp = function(){
        if ($scope.offset < $scope.filtered_reservations.length/10){
            $scope.offset += 1;
        }
    }

    $scope.update = function(id){
        data = {
            csrf_token: $('input[name=csrf_token]').val(),
            id: id,
            state: $('#'+id+' input[name=state]:checked').val(),
            reject_reason: $('#'+id+' input[name="reject-reason"]').val()
        };

        $http({
            method: 'POST',
            url: '/manage/update/reservation-state',
            data: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response){
            $('#'+id).modal('hide');
            for(i=0;i<$scope.reservations.length;i++){
                r = $scope.reservations[i];
                if(r.id == id){
                    if (data.state == 'reject'){
                        r.state = '거절';
                        r.state_color = 'red';
                    } else if (data.state == 'grant'){
                        r.state = '승인';
                        r.state_color = 'green';
                    } else if (data.state == 'wait'){
                        r.state = '대기 중';
                        r.state_color = 'yellow';
                    } else {
                        state = '잘못된 처리';
                    }
                }
            }
        }, function error(response){
            alert('There was a problem with the request.');
        });
    };
});
