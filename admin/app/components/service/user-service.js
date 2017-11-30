'use strict';

angular.module('myApp.userService', [])

    .factory('UserService', ['$http', function($http) {
        var users;
        return {
            all:function(){
                return $http.get('http://localhost/dami/get-users-cors.php')
                    .then(function (res) {
                        console.log(res);
                        users = res.data;
                    });
            },
            getUsers:function () {
                return users;
            },
            setUsers:function (usrs) {
                users = usrs;
            }
        };
    }]);