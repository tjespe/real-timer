<!DOCTYPE html>
<html ng-app="app" ng-controller="masterCtrl as m" lang="no">
<head>
  <meta charset="utf-8">
  <title>Real-Timer — Den raskeste måten å sjekke når kollektivtransporten kommer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Real-Timer">
  <link rel="apple-touch-icon" href="assets/apple-touch-icon.png" />
  <link rel="icon" href="assets/favicon.ico">
  <style ng-bind="m.css"></style>
</head>
<body>
  <header>
    <h1>Real-Timer</h1>
  </header>
  <spacer></spacer>

  <div class="content padded" ng-if="!m.success" ng-bind="m.status"></div>

  <div ng-repeat="(index, object) in m.data" ng-if="m.success">
    <div class="content stop content-row-wrapper" ng-if="object.PlaceType == 'Stop'" ng-class="{'expanded':object.expanded, 'impanded':!object.expanded}">
      <div class="content-row" ng-click="m.toggle(index)">
        <div ng-bind="object.Name"></div>
        <div class="glyphicon" ng-if="m.jqLoaded" ng-class="{'glyphicon-chevron-up':object.expanded, 'glyphicon-chevron-down':!object.expanded}"></div>
      </div>
      <iframe ng-if="index <= 5 || object.hasExpanded" id="{{object.ID}}" style="{{'height:'+object.height}}" ng-src="{{'//real-timer-server.tk/widget.php#('+object.ID+')'+object.Name+'%20('+object.District+')'}}"></iframe>
    </div>
    <div class="content area content-row-wrapper" ng-if="object.PlaceType == 'Area'" ng-class="{'expanded':object.expanded, 'impanded':!object.expanded}">
      <div class="content-row" ng-click="m.toggle(index)">
        <div ng-bind="object.Name"></div>
        <div class="glyphicon" ng-if="m.jqLoaded" ng-class="{'glyphicon-chevron-up':object.expanded, 'glyphicon-chevron-down':!object.expanded}"></div>
      </div>
      <div class="stop content-row-wrapper" ng-repeat="(key, stop) in object.Stops" ng-class="{'expanded':stop.expanded, 'impanded':!stop.expanded}">
        <div class="content-row" ng-click="m.toggle(index, key)">
          <div ng-bind="stop.Name"></div>
          <div class="glyphicon" ng-if="m.jqLoaded" ng-class="{'glyphicon-chevron-up':stop.expanded, 'glyphicon-chevron-down':!stop.expanded}"></div>
        </div>
        <iframe ng-if="index <= 5 || object.hasExpanded" id="{{stop.ID}}" style="{{'height:'+stop.height}}" ng-src="{{'//real-timer-server.tk/widget.php#('+stop.ID+')'+stop.Name+'%20('+stop.District+')'}}"></iframe>
      </div>
    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0/angular.min.js"></script>
  <link rel="stylesheet" href="//real-timer-server.tk/getcode.php?file=css">
  <script src="//real-timer-server.tk/getcode.php?file=js"></script>

</body>
</html>