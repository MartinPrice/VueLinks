@extends('layouts.layout')

@section('subNav')
    <?php /*
    <li><a href="/visits/create" class="">Create Visit only</a></li>
    <li><a href="/visits/multi" class="">Create Visit and Activities</a></li>
    <li><a href="/visits/combo" class="">Create Visit, Activity and Requirements</a></li>
    <li><a href="/visits/previous" class="">Archive</a></li>
    */ ?>
    <li><a href="/visits/createVisit">Conventional link to Blade page with app2 Vue template</a></li>
@endsection

@section('contentBody')
    <!-- Vue template -->
    <div id="app">
      <router-link to="/" exact>Home Vue template for app1</router-link>
      <br />
      <router-link to="/create">Second Vue template for app1</router-link>
      <router-view></router-view>
      <router-view name="secondTemplateOnSameBladePage"></router-view>
    </div>
    <!-- endof Vue template -->
@endsection