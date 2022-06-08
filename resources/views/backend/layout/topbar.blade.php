<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"><img src="{{ asset('public/backend/assets/images/logo_light.png') }}" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li class="{{ (request()->is('showImportForm')) ? 'active' : '' }}"><a href="{{route('showImportForm')}}"><span>Main DataBase</span></a></li>
            <li class="{{ (request()->is('workDb')) ? 'active' : '' }}"><a href="{{route('workDb')}}"><span>Working DB</span></a></li>
        </ul>
    </div>
</div>