
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
        data: {'space':['individual_practice_room_1'
                        ,'individual_practice_room_2'
                        ,'individual_practice_room_3']}
    }).then(function success(response){
        for (i = 0; i < response.data.length; i++){
            e = response.data[i];
            if (e.state == 'grant') {
                if (e.space == 'individual_practice_room_1'){
                    e.stick = true;
                    e.title = e.title+' (1)';
                    e.backgroundColor = '#FA573C';
                    e.borderColor = '#D02424';
                    e.textColor = '#000';
                } else if (e.space == 'individual_practice_room_2'){
                    e.stick = true;
                    e.title = e.title+' (2)';
                    e.backgroundColor = '#49d796';
                    e.borderColor = '#4fb78e';
                    e.textColor = '#000';
                } else if (e.space == 'individual_practice_room_3'){
                    e.stick = true;
                    e.title = e.title+' (3)';
                    e.backgroundColor = '#FAD165';
                    e.borderColor = '#BF9608';
                    e.textColor = '#000';
                } else {
                    continue;
                }
            } else {
                continue;
            }
            $scope.eventSource[0].events.push(e);
        }
    }, function error(response){
        console.error('Error: 이벤트를 받아오지 못하고 있음.');
    });

})
