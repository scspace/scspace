
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
        data: {'space':['seminar_room_1'
                        ,'seminar_room_2']}
    }).then(function success(response){
        for (i = 0; i < response.data.length; i++) {
            e = response.data[i];
            if (e.space == 'seminar_room_1'){
                if (e.state == 'wait') {
                    e.stick = true;
                    e.title_val = e.title;
                    e.title = e.title+' (1/대기 중)';
                    e.backgroundColor = 'rgba(245,108,87,0.18)';
                    e.borderColor = 'rgba(242, 66, 39,0.12)';
                    e.textColor = 'rgba(0,0,0,0.39)';
                } else if (e.state == 'grant') {
                    e.stick = true;
                    e.title_val = e.title;
                    e.title = e.title+' (1)';
                    e.backgroundColor = '#F56C57';
                    e.borderColor = '#F24227';//salmon color
                    e.textColor = '#000';
                } else { continue; }
            } else if (e.space == 'seminar_room_2'){
                if (e.state == 'wait') {
                    e.stick = true;
                    e.title_val = e.title;
                    e.title = e.title+' (2/대기 중)';
                    e.backgroundColor = 'rgba(104,162,37,0.18)';
                    e.borderColor = 'rgba(77, 120, 28,0.12)';
                    e.textColor = 'rgba(0,0,0,0.39)';
                } else if (e.state == 'grant') {
                    e.stick = true;
                    e.title_val = e.title;
                    e.title = e.title+' (2)';
                    e.backgroundColor = '#68A225';
                    e.borderColor = '#4d781c';//green bean
                    e.textColor = '#000';
                } else { continue; }
            } else {continue;}
            $scope.eventSource[0].events.push(e);
        }
    }, function error(response){
        console.error('Error: 이벤트를 받아오지 못하고 있음.');
    });

})
