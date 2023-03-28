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


<div class="ui sidebar inverted vertical menu sidemenu" id="mysidebar">
    <a class="item {{(Request::is('mainlanding') ? 'active' : '')}}" href="{{url('/mainlanding')}}"><i style="float: left" class="users inverted icon big link"></i>Patient List</a>

    <a class="item {{(Request::is('doctornote') ? 'active' : '')}}" href="{{ url('/casenote')}}"><i style="float: left" class="stethoscope inverted big icon link"></i>Case Note</a>
  
    @if (strtoupper(Auth::user()->groupid) == 'ADMIN')
    <a class="item" id="file_show">
        <i style="float: left" class="cogs inverted big icon link"></i>File Setup
    </a>

    <div class="menu" style="display:none;" id="file_menu">
        <a class="item inneritem" href="{{ url('/setuplanding?url=salutation')}}" >Salutation</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=race')}}" >Race</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=language')}}" >Language</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=marital')}}" >Marital</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=relationship')}}" >Relationship</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=religion')}}" >Religion</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=occupation')}}" >Occupation</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=bloodGroup')}}" >Blood Group</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=area')}}" >Area</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=state')}}" >State</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=postcode')}}" >Post Code</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=country')}}" >Country</a>
    </div>

    <a class="item" id="security_show">
        <i style="float: left" class="user inverted shield big icon link"></i>Security Setup
    </a>

    <div class="menu" style="display:none;" id="security_menu">
        <a class="item inneritem" href="{{ url('user_maintenance/')}}" >User Maintenance</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=group_maintenance')}}" >Group Maintenance</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=menu_maintenance')}}" >Menu Maintenance</a>
    </div>

    <a class="item" id="charges_show">
        <i style="float: left" class="wrench alternate big icon link"></i>Charges Setup
    </a>
    <div class="menu" style="display:none;" id="charges_menu">
        <a class="item inneritem" href="{{ url('/setuplanding?url=chargemaster')}}" style="">Charge Master</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=chargeclass')}}" >Charge Class</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=chargetype')}}" >Charge Type</a>
        <a class="item inneritem" href="{{ url('/setuplanding?url=chargegroup')}}" >Charge Group</a>
    </div>
    @endif

    <a class="item" href=".\logout"><i style="float: left" class="plug inverted big icon link"></i>Log Out</a>
</div>