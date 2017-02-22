/*=============================================================================
|		     Inisialisasi Aplikasi yang dibuat dengan angular! 			      |
=============================================================================*/

				var app = angular.module('crudApp', []);

/*=============================================================================
|								App Controllers 							  |
=============================================================================*/
 
app.controller("PageCtrl", function($scope, $http){
	
	/*=============================
	| Global Variable 			  |
	|------------------------------
	|                             |
	| 	$scope.newEmp = {}; 	  |
	|	$scope.clickEmp = {};     |
	|                             |
	=============================*/

	$scope.newEmp = {};
	$scope.clickEmp = {};

/*=============================================================================
|						Get All Employe From API 							  |
===============================================================================*/

	$http({
	  method: 'GET',
	  url: 'http://anonymous/api/'
	})
	.then(function successCallback(response) {
		$scope.employees = angular.fromJson(response.data.response.data);

		/*
			debug data
			console.log($scope.employees);
		*/

	}, function errorCallback(response) {
		$scope.employees = angular.fromJson(response.data.response.data);

		// debug data
		console.log($scope.employees);

	});

/*=============================================================================
|							Add Employee to API 							  |
===============================================================================*/

	$scope.addEmp = function(){

		// console.log($scope.newEmp);

		$http({
            method : 'POST',
            url : 'http://anonymous/api/employee_add',
            data : $scope.newEmp
        })
        .then(function successCallback(response) {

			/*
				debug data
				console.log(response);
			*/																																																																																																																																																																					
		
		}, function errorCallback(response) {

			// debug data
			console.log(response);

		});

		$scope.employees.push($scope.newEmp);
		$scope.newEmp = {};

	};

/*=============================================================================
|							Detect Selected Employee 						  |
===============================================================================*/
	
	$scope.selectEmp = function(emp){

		// console.log(emp);
		
		$scope.clickEmp = emp;

	};

/*=============================================================================
| 							Update Employee to API 							  |
===============================================================================*/
	
	$scope.updateEmp = function(emp) {

		$http({
            method : 'PUT',
            url : 'http://anonymous/api/update_employee',
            data : emp
        })
        .then(function successCallback(response) {
			
		/*
			debug data
			console.log(response);
		*/

		}, function errorCallback(response) {

			// debug data
			console.log(response);

		});
	};

/*=============================================================================
| 							Delete Employee to API 							  |
===============================================================================*/
	
	$scope.deleteEmp = function(id) {

		$.ajax({

			url: 'http://anonymous/api/delete_employee',
			type: 'DELETE',
			data: {employee_id: id}

		})
		.done(function(response) {

			// console.log(response);

		})
		.fail(function(response) {

			console.log(response);

		});


		$scope.employees.splice($scope.employees.indexOf($scope.clickEmp), 1);
		
	};

});