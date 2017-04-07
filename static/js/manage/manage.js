var form = angular.module('manage', []);

form.controller('ManageController', function($scope,$http) {

    $scope.update = function(id){
        data = {
            csrf_token: $('input[name=csrf_token]').val(),
            id: id,
            request: 'update-reservation-state',
            state: $('input[name=state]:checked').val(),
            reject_reason: $('input[name=reject-reason]').val()
        };

        $http({
            method: 'POST',
            url: '/manage/update/reservation-state',
            data: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response){
            $('#'+id).modal('hide');

            if (data.state == 'reject'){
                state = '<span class="red circle"></span>거절';
            } else if (data.state == 'grant'){
                state = '<span class="green circle"></span>승인';
            } else if (data.state == 'wait'){
                state = '<span class="yellow circle"></span>대기 중';
            } else {
                state = '잘못된 처리';
            }
            $('#row'+id+' .state').html(state);
        }, function error(response){
            alert('There was a problem with the request.');
        });
    };
});
