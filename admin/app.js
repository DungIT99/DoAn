var app = angular.module("myApp",[]);
app.controller('myCtrol',function($scope,$http){
    $http.get("http://localhost:88/DO_AN_PHP/admin/Api.php").then(function(res){
        $scope.product = res.data;
    })
})