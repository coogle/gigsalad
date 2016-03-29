<!DOCTYPE html>
<html lang="en" ng-app="GigSaladDemoApp">
    <head>
    	<meta charset="utf-8">
    	<title>GigSalad Demo</title>
    	<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/animate.css">
        <style>
            .cropped-card-img {
                width:240px;
                -webkit-clip-path: inset(0 0 47% 0);
                clip-path: inset(0 0 47% 0);
            }
            
            #wellContainer {
            	overflow: hidden;
            }
        </style>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.js"></script>
        <script src="//code.angularjs.org/1.5.3/angular-resource.js"></script>
        <script src="//code.angularjs.org/1.5.3/angular-animate.js"></script>
        <script src="//code.angularjs.org/1.5.3/angular-cookies.js"></script>
        <script src="/js/angular-spinners.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        <script src="/js/services.js"></script>
        <script src="/js/controllers.js"></script>
        <script src="/js/app.js"></script>
    </head>
    <body>
        <div class="modal hide" id="loadingDialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-header">
                <h1>Loading...</h1>
            </div>
            <div class="modal-body">
                <div class="progress progress-striped active">
                    <div class="bar" style="width: 100%;"></div>
                </div>
            </div>
        </div>
        <div class="container" ng-controller="PerformerListCtrl" ng-init="init()">
            <div class="row text-center">
                <h1>GigSalad Demo</h1>
            </div>
            <div class="well text-center" id="wellContainer">
                <div class="row">
                    <nav>
                        <ul class="pager" ng-show="performers">
                            <li class="previous"><a  href="#" id="prevBtn" ng-click="prev()">
                                <spinner name="prevSpinner" register="true" on-show="prevSpinner = true" on-hide="prevSpinner = false">
                                    <span class="glyphicon glyphicon-refresh"></span>  Previous
                                </spinner>
                                <span ng-show="!prevSpinner">Previous</span></a></li>
                            <li class="next"><a href="#" id="nextBtn" ng-click="next()">
                                <spinner name="nextSpinner" register="true" on-loaded="refreshPerformers()" on-show="nextSpinner = true" on-hide="nextSpinner = false">
                                    Next <span class="glyphicon glyphicon-refresh"></span>
                                </spinner>
                                <span ng-show="!nextSpinner">Next</span></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-3" ng-repeat="performer in performers">
                        <div class="card animated slideInUp">
                            <div class="card-header text-center">
                                <h4>{{ performer.act_name }}</h4>
                                <p class="text-muted">{{ performer.category_name }}</p>
                            </div>
                            <img class="card-img-top cropped-card-img" src="{{ performer.thumbnail.url }}" alt="{{ performer.act_name }}">
                            <div class="card-block">
                                <p>They are one of the best {{ performer.category_name }} performers available for booking today!</p>
                            </div>
                            <div class="card-footer text-muted text-center">
                                {{ performer.city_name }}, {{ performer.state_name }} - {{ performer.country_code }}
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>