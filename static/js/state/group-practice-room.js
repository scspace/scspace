
var calendar = angular.module('calendar', ['ui.calendar'])

calendar.controller('calendarCtrl',function($scope, $http){

    $scope.uiConfig = {
        calendar:{
            defaultView: "agendaWeek",
            height: 'auto',
            editable: false,
            header:{
                left: '',
                center: '',
                right: 'today prev,next'
            },
            dayNames: ["일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"],
            dayNamesShort: ["일", "월", "화", "수", "목", "금", "토"],
            allDaySlot: false
        }
    };
    $scope.eventSource = [{events:[]}];
    $http({
        method: "POST",
        url: "/api/calendar/get",
        data: {'space':['group_practice_room']}
    }).then(function success(response){
        for (i = 0; i < response.data.length; i++){
            e = response.data[i];
            if (e.state == 'wait'){
                e.stick = true;
                e.title = e.title+' (대기)';
                e.backgroundColor = 'rgba(76,175,80,0.18)';
                e.borderColor = 'rgba(46,125,50,0.12)';
                e.textColor = 'rgba(0,0,0,0.39)';
            } else if (e.state == 'grant'){
                e.stick = true;
                e.title = e.title+' (승인)';
                e.backgroundColor = 'rgb(76,175,80)';
                e.borderColor = 'rgb(46,125,50)';
                e.textColor = '#000';
            } else {
                continue;
            }
            $scope.eventSource[0].events.push(e);
        }
    }, function error(response){
        console.error('Error: 이벤트를 받아오지 못하고 있음.');
    });

})
