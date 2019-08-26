var calendar = angular.module('calendar', ['ui.calendar'])

calendar.controller('calendarCtrl',function($scope, $http){
    $scope.eventSource = [{events:[]}];

    $http({
        method: "POST",
        url: "/api/calendar/get",
        data: {'space':['workshop']}
    }).then(function success(response){
        for (i = 0; i < response.data.length; i++){
            e = response.data[i];
            if (e.state == 'wait'){
                e.stick = true;
                e.title_val = e.title;
                e.title = e.title +' (대기 중)';
                e.backgroundColor = '#757575';
                e.borderColor = '#616161';
                e.textColor = '#eee';
            } else if (e.state == 'grant'){
                e.stick = true;
                e.title_val = e.title;
                e.title = e.title;
                e.backgroundColor = '#F56C57';
                e.borderColor = '#F56C57'; //salmon color
                e.textColor = '#FFF';
            } else {
                continue;
            }
            $scope.eventSource[0].events.push(e);
        }
    }, function error(response){
        console.error('Error: 이벤트를 받아오지 못하고 있음.');
    });

    $scope.addEvent = function() {
        data = {
            space: $('#eventAdder input[name=space]:checked').val(),
            time_from: $('#eventAdder input[name=time_from]').val(),
            time_to: $('#eventAdder input[name=time_to]').val(),
            title: $('#eventAdder input[name=title]').val(),
            csrf_token: $('#eventAdder input[name=csrf_token]').val(),
            type: 'event'
        };
        $http({
            method: 'POST',
            url: '/api/calendar/make',
            data: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response){

            e = {
                stick: true,
                space: data.space,
                title: data.title,
                start: moment(data.time_from),
                end: moment(data.time_to)
            }
            e.stick = true;
            e.title_val = e.title;
            e.title = e.title;
            e.backgroundColor = '#F56C57';
            e.borderColor = '#F56C57';//salmon color
            e.textColor = '#FFF';
            $scope.eventSource[0].events.push(e);

            $('#eventAdder').modal('hide');

        }, function error(response){
            alert('서버에 행사를 등록하지 못했습니다. 다시 시도해보고, 여전히 안 될 경우 서버 관리자에게 문의하십시오.');
        });
    };

    $scope.clickEvent = function(event, jsEvent, view){
        $('#eventUpdater .modal-title').text(event.title);
        $('#eventUpdater input[name=title]').val(event.title_val);
        $('#eventUpdater input[name=time_from]').val(event.start.format('YYYY-MM-DD[T]HH:mm'));
        $('#eventUpdater input[name=time_to]').val(event.end.format('YYYY-MM-DD[T]HH:mm'));
        $('#eventUpdater input[name=id]').val(event.id);
        $('#eventUpdater input:radio[name=space]:radio[value='+event.space+']').attr('checked', true);

        $('#eventUpdater').modal('show');
    }

    $scope.updateEvent = function() {

        data = {
            space: $('#eventUpdater input[name=space]:checked').val(),
            title: $('#eventUpdater input[name=title]').val(),
            time_from: $('#eventUpdater input[name=time_from]').val(),
            time_to: $('#eventUpdater input[name=time_to]').val(),
            id: $('#eventUpdater input[name=id]').val(),
            csrf_token: $('input[name=csrf_token]').val()
        }

        $http({
            method: 'POST',
            url: '/api/calendar/update',
            data: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response){
            angular.forEach($scope.eventSource[0].events, function(e, key){
                if(e.id == data.id){
                    $scope.eventSource[0].events.splice(key,1);
                    e.stick = true;
                    e.title_val = e.title;
                    e.title = e.title;
                    e.backgroundColor = '#F56C57';
                    e.borderColor = '#F56C57';//salmon color
                    e.textColor = '#FFF';
                    $scope.eventSource[0].events.push(e);
                }
            });
            $('#eventUpdater').modal('hide');
        }, function error(response){
            alert('서버에 행사 정보가 업데이트되지 않았습니다. 다시 시도해보고, 여전히 안 될 경우 서버 관리자에게 문의하십시오.');
        });
    }

    $scope.removeEvent = function() {
        data = {
            id: $('#eventUpdater input[name=id]').val(),
            csrf_token: $('input[name=csrf_token]').val()
        };
        $http({
            method: 'POST',
            url: '/api/calendar/delete',
            data: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response){
            angular.forEach($scope.eventSource[0].events, function(e, key){
                if(e.id == data.id){
                    $scope.eventSource[0].events.splice(key,1);
                }
            });
            $('#eventUpdater').modal('hide');
        }, function error(response){
            $('#eventUpdater').modal('hide');
            alert('서버에 행사 삭제가 반영되지 않았습니다. 다시 시도해보고, 여전히 안 될 경우 서버 관리자에게 문의하십시오.');
            $scope.eventSource[0].events.filter(function(e){
                return e.id != data.id;
            });
        });
    };

    $scope.resizeEvent = function(event, delta, revertFunc, jsEvent, ui, view) {
        data = {
            id: event.id,
            title: event.title,
            space: 'workshop',
            time_from: event.start.format(),
            time_to: event.end.format(),
            csrf_token: $('input[name=csrf_token]').val()
        };

        $http({
            method: 'POST',
            url: '/api/calendar/update',
            data: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response){

        }, function error(response){
            alert('서버에 시간 변경이 등록되지 않았습니다. 다시 시도해보고, 여전히 안 될 경우 서버 관리자에게 문의하십시오.');
            revertFunc();
        });
    }

    $scope.dropEvent = function(event, delta, revertFunc, jsEvent, ui, view) {
        data = {
            id: event.id,
            title: event.title,
            space: 'workshop',
            time_from: event.start.format(),
            time_to: event.end.format(),
            csrf_token: $('input[name=csrf_token]').val()
        };

        $http({
            method: 'POST',
            url: '/api/calendar/update',
            data: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response){

        }, function error(response){
            alert('서버에 시간 변경이 등록되지 않았습니다. 다시 시도해보고, 여전히 안 될 경우 서버 관리자에게 문의하십시오.');
            revertFunc();
        });
    }

    $scope.uiConfig = {
        calendar:{
            defaultView: "month",
            height: '700',
            editable: true,
            header:{
                left: 'title',
                center: '',
                right: 'today prev,next month agendaWeek'
            },
            dayNames: ["일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"],
            dayNamesShort: ["일", "월", "화", "수", "목", "금", "토"],
            allDaySlot: false,
            eventResize: $scope.resizeEvent,
            eventDrop: $scope.dropEvent,
            eventClick: $scope.clickEvent
        }
    };
})
