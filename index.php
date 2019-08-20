<!doctype html>
<html>
<head>
<meta charset="UTF-8"> 
<title>Room Management System</title>  
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> 

 <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
</head>  
<body>  
<div class="container">
    <div class="row" style="background-color: #53a1ab;height: 100px;color:white;font-size: 56px;text-shadow: 1px 2px 3px black;">
        <img src="pacific-logo.jpg" align="center" alt="" style="width: auto;height: 100px;">
        Room Booking Management
    </div>
	
	<div class="row" ng-app="hotelapp" ng-controller="controller" ng-init="show_data()" style="padding-top: 10px;padding-bottom: 25px;">
		<div class="col-md-6">
		   	<label>Customar Name</label>
            <input type="text" name="name" ng-model="name" class="form-control">
            <br/>
            <label>Booking Date</label>
            <input type="date" name="book" ng-model="book" class="form-control">
            <br/>
            <label>CheckOut Date</label>
            <input type="date" name="checkout" ng-model="checkout" class="form-control">
            <br/>
            <label>NID Number</label>
            <input type="text" name="nid" ng-model="nid" class="form-control">
            <br/>         
          
            <label>Room </label>
            <input type="text" name="room" ng-model="room" class="form-control">
            <br/>

            <input type="hidden" ng-model="id">
            <input type="submit" name="insert" class="btn btn-primary" ng-click="insert()" value="{{btnName}}">
		</div>
        <div class="col-md-6" style="top:25px;">
            <table class="table table-striped table-bordered table-hovered">
                <tr>
                    <th>S.No</th>
                    <th>Room</th>
                    <th>NID</th>
                    <th>CheckOut Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr ng-repeat="x in names">
                    <td>{{x.id}}</td>
                    <td>{{x.room}}</td>
                    <td>{{x.nid}}</td>
                    <td>{{x.checkout}}</td>
                    <td>
                        <button class="btn btn-success btn-xs" ng-click="update_data(x.id, x.name, x.book, x.checkout, x.nid,x.room)">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-xs" ng-click="delete_data(x.id )">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row" style="background-color: #53a1ab;color:white;font-size: 25px;text-shadow: 1px 2px 3px black;text-align: center;">        
        <h3>Developed by <strong>Khyrul Kabir</strong> </h3>
    </div>
</div>

<script>  
var app = angular.module("hotelapp", []);
app.controller("controller", function($scope, $http) {
    $scope.btnName = "Insert";
    $scope.insert = function() {
        if ($scope.name == null) {
            Swal.fire('Enter Customer Name');
        } else if ($scope.book == null) {
            Swal.fire("Enter booking date");
        } else if ($scope.nid == null) {
            Swal.fire("Enter National Id Number");
        } else {
            $http.post(
                "insert.php", {
                    'name': $scope.name,
                    'book': $scope.book,
                    'nid': $scope.nid,
                    'checkout': $scope.checkout,
                    'room': $scope.room,
                    'btnName': $scope.btnName,
                    'id': $scope.id
                }
            ).success(function(data) {
                Swal.fire(data);
                $scope.name = null;
                $scope.book = null;
                $scope.nid = null;
                $scope.checkout = null;
                $scope.room = null;
                $scope.btnName = "Insert";
                $scope.show_data();
            });
        }
    }
    $scope.show_data = function() {
        $http.get("display.php")
            .success(function(data) {
                $scope.names = data;
            });
    }
    $scope.update_data = function(id, name, book,checkout, nid,room) {
        $scope.id = id;
        $scope.name = name;
        $scope.book = book;
        $scope.nid = nid;
        $scope.checkout = checkout;
        $scope.room = room;
        $scope.btnName = "Update";
    }
    $scope.delete_data = function(id) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          $http.post("delete.php", {
                    'id': id
                })
                .success(function(data) {
                    Swal.fire(data);
                    $scope.show_data();
                });
        })
        
    }
});
</script>  
</body>  
</html>  
 