
var calendar = angular.module('calendar', ['ui.calendar'])

calendar.controller('calendarCtrl',function($scope, $http){

    $scope.uiConfig = {
        calendar:{
            defaultView: "agendaWeek",
            height: '700',
            editable: false,
            header:{
                left: 'title',
                center: '',
                right: 'today prev,next month agendaWeek '
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
        data: {'space':['bookdabang']}
    }).then(function success(response){
        for (i = 0; i < response.data.length; i++){
            e = response.data[i];
            if (e.space == 'bookdabang') {
                if (e.state == 'wait') {

                    e.stick = true;
                    e.title_val = e.title;
                    e.title = e.title+' (대기 중)';
                    e.backgroundColor = '#757575';
                    e.borderColor = '#616161';
                    e.textColor = '#eee';

                } else if (e.state == 'grant') {

                    e.stick = true;
                    e.title_val = e.title;
                    e.title = e.title;
                    e.backgroundColor = '#FA573C';
                    e.borderColor = '#D02424';
                    e.textColor = '#FFF';

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
