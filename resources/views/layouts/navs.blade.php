<div class="ui fixed top menu sidemenu" id="sidemenu_topmenu">
    <a class="item" id="showSidebar" style="padding: 20px 25px 15px 25px !important;"><i class="sidebar inverted icon"></i></a>
    <div class="right menu">
        @if (strtoupper(Auth::user()->viewallcenter) == '1')
            <div class="ui pointing dropdown link item" style="color:white;">
                <span class="text">{{ session('dept_desc') }}</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    @foreach ($centers as $center)
                        <a class="item" href="{{ url('dialysis/')}}?changedept={{$center->deptcode}}" >{{$center->description}}</a>
                    @endforeach
                </div>
            </div>

        @elseif (strtoupper(Auth::user()->groupid) == 'PATHLAB')
            <div class="item" style="color:white;">PATHLAB</div>
        @else
            <div class="item" style="color:white;">{{ session('dept_desc') }}</div>
        @endif
        <div class="ui dropdown item" style="color:white;">
          Hi, {{Auth::user()->name}} !<i class="dropdown icon"></i>
          <div class="menu">
            <a class="item" href="{{ url('user_maintenance/')}}/{{Auth::user()->id}}">Change Password</a>
            <a class="item" href="{{ url('/logout')}}">Log Out</a>
          </div>
        </div>
    </div>
</div>


<div class="ui sidebar inverted vertical menu sidemenu">
    <a class="item {{(Request::is('mainlanding') ? 'active' : '')}}" href="{{url('/mainlanding')}}"><i style="float: left" class="users inverted icon big link"></i>Patient List</a>

    <a class="item {{(Request::is('doctornote') ? 'active' : '')}}" href="{{ url('/casenote')}}"><i style="float: left" class="stethoscope inverted big icon link"></i>Case Note</a>
  
    <a class="item" id="setting_show">
        <i style="float: left" class="cogs inverted big icon link"></i>Settings
    </a>

    <div class="menu" style="display:none;" id="setting_menu">
        <a class="item" href="{{ url('/setuplanding?url=salutation')}}" style="padding: 15px 20px 15px 100px !important;">Salutation</a>

        <a class="item" href="{{ url('/setuplanding?url=race')}}" style="padding: 15px 20px 15px 100px !important;">Race</a>

        <a class="item" href="{{ url('/setuplanding?url=language')}}" style="padding: 15px 20px 15px 100px !important;">Language</a>

        <a class="item" href="{{ url('/setuplanding?url=marital')}}" style="padding: 15px 20px 15px 100px !important;">Marital</a>

        <a class="item" href="{{ url('/setuplanding?url=relationship')}}" style="padding: 15px 20px 15px 100px !important;">Relationship</a>

        <a class="item" href="{{ url('/setuplanding?url=religion')}}" style="padding: 15px 20px 15px 100px !important;">Religion</a>

        <a class="item" href="{{ url('/setuplanding?url=occupation')}}" style="padding: 15px 20px 15px 100px !important;">Occupation</a>

        <a class="item" href="{{ url('/setuplanding?url=bloodGroup')}}" style="padding: 15px 20px 15px 100px !important;">Blood Group</a>

        <a class="item" href="{{ url('/setuplanding?url=area')}}" style="padding: 15px 20px 15px 100px !important;">Area</a>

        <a class="item" href="{{ url('/setuplanding?url=state')}}" style="padding: 15px 20px 15px 100px !important;">State</a>

        <a class="item" href="{{ url('/setuplanding?url=postcode')}}" style="padding: 15px 20px 15px 100px !important;">Post Code</a>

        <a class="item" href="{{ url('/setuplanding?url=country')}}" style="padding: 15px 20px 15px 100px !important;">Country</a>
    </div>


    <a class="item" href=".\logout"><i style="float: left" class="plug inverted big icon link"></i>Log Out</a>
</div>