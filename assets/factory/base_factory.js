/**
 * Created by venkat on 20/01/2019.
 */
app.factory('baseFactory', function($http,$log,$q,$mdToast,$cookies) {
    return {
        UserCtrl: function(input_data)
        {
            var deferred = $q.defer();
            $http.post('auth',input_data,
                {
                    headers: {'Accept': 'application/json','Content-Type': 'application/json'}
                })
                .success(function(data)
                {
                    deferred.resolve(data)
                })
                .error(function(msg, code)
                {
                    deferred.reject(msg);
                    $log.error(msg, code);
                });
            return deferred.promise;
        },
        uploadCtrl: function(input_data)
        {
            var deferred = $q.defer();
            $http.post('registry',input_data,
                {
                    headers: {'Accept': 'application/json','Content-Type': 'application/json'}
                })
                .success(function(data)
                {
                    deferred.resolve(data)
                })
                .error(function(msg, code)
                {
                    deferred.reject(msg);
                    $log.error(msg, code);
                });
            return deferred.promise;
        },
		regCtrl: function(input_data)
        {
            var deferred = $q.defer();
            $http.post('registry',input_data,
                {
                    headers: {'Accept': 'application/json','Content-Type': 'application/json'}
                })
                .success(function(data)
                {
                    deferred.resolve(data)
                })
                .error(function(msg, code)
                {
                    deferred.reject(msg);
                    $log.error(msg, code);
                });
            return deferred.promise;
        },
        reportCtrl: function(input_data)
        {
            var deferred = $q.defer();
            $http.post('reports',input_data,
                {
                    headers: {'Accept': 'application/json','Content-Type': 'application/json'}
                })
                .success(function(data)
                {
                    deferred.resolve(data)
                })
                .error(function(msg, code)
                {
                    deferred.reject(msg);
                    $log.error(msg, code);
                });
            return deferred.promise;
        },
        setupsCtrl: function(input_data)
        {
            var deferred = $q.defer();
            $http.post('setups',input_data,
                {
                    headers: {'Accept': 'application/json','Content-Type': 'application/json'}
                })
                .success(function(data)
                {
                    deferred.resolve(data)
                })
                .error(function(msg, code)
                {
                    deferred.reject(msg);
                    $log.error(msg, code);
                });
            return deferred.promise;
        },

        creditsCtrl: function(input_data)
        {
            var deferred = $q.defer();
            $http.post('credits',input_data,
                {
                    headers: {'Accept': 'application/json','Content-Type': 'application/json'}
                })
                .success(function(data)
                {
                    deferred.resolve(data)
                })
                .error(function(msg, code)
                {
                    deferred.reject(msg);
                    $log.error(msg, code);
                });
            return deferred.promise;
        },
        toastCtrl : function (type,msg) {
            $mdToast.show(
                $mdToast.simple()
                    .textContent(msg)
                    .hideDelay(3000)
                    .position('bottom right')
                    .theme(type+"-toast"));
        },
        addAttachments:function(data,files,uploadUrl)
        {
            var fd = new FormData();
            //$log.log(data);
            for(var i=0;i<files.length;i++)
            {
                //$log.debug(files[i]);
                $log.debug(files[i]._file);
                fd.append(i, files[i]._file);
            }

            data.flength = files.length;
            $log.log(angular.toJson(data));

            fd.append('attachment_data', angular.toJson(data));

            $log.log(data);
            $log.log(fd);

            var deferred = $q.defer();

            $http.post(uploadUrl, fd,
                {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                .success(function(data)
                {
                    deferred.resolve(data)
                })
                .error(function(msg, code)
                {
                    deferred.reject(msg);
                    $log.error(msg, code);
                });
            return deferred.promise;
        }


    }
});