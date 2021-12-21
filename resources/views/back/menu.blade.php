<button class="pull-button" style="background:#ffffff;color:#3A448B; border:5px solid #3A448B;">
    <span class="default-icon-menu" ></span>
</button>
<div class="suggest-box">

</div>
<ul class="navview-menu" style="height: calc(100vh - 68px);">
    <li>
        <a href="/admin/">
                <span class="icon"><span class="mif-home"></span></span>
                <span class="caption">Home</span>
        </a>
    </li>
    <li class="item-header">Main pages</li>

    <!-- <li>
        <a href="/admin/mail/">
            <span class="icon"><span class="mif-apps"></span></span>
            <span class="caption">Mailing List</span>
        </a>
    </li> -->

    <li>
    <a href="{{ route('admin.notice.index')}}">
            <span class="icon"><span class="mif-notification"></span></span>
            <span class="caption">Notices</span>
        </a>
    </li>

    <li>
    <a href="{{ route('admin.event.index')}}">
            <span class="icon"><span class="mif-event-available"></span></span>
            <span class="caption">Events</span>
        </a>
    </li>

    <li>
    <a href="{{ route('admin.news.index')}}">
            <span class="icon"><span class="mif-news"></span></span>
            <span class="caption">News</span>
        </a>
    </li>

    <li>
    <a href="{{ route('admin.other.member.index')}}">
            <span class="icon"><span class="mif-users"></span></span>
            <span class="caption">Members</span>
        </a>
    </li>

    <li>
    <a href="{{ route('admin.board.index')}}">
            <span class="icon"><span class="mif-users"></span></span>
            <span class="caption">Board Session</span>
        </a>
    </li>

    <li>
    <a href="{{ route('admin.activity.index')}}">
            <span class="icon"><span class="mif-organization"></span></span>
            <span class="caption">Activities</span>
        </a>
    </li>



    {{-- <li>
    <a href="/admin/secretary/list/">
            <span class="icon"><span class="mif-organization"></span></span>
            <span class="caption">Secretaries</span>
        </a>
    </li> --}}

    <li>
    <a href="{{ route('admin.gallery.index')}}">
            <span class="icon"><span class="mif-images"></span></span>
            <span class="caption">Gallery</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.download.index')}}">
                <span class="icon"><span class="mif-organization"></span></span>
                <span class="caption">Downloads</span>
            </a>
    </li>

    <li>
        <a href="{{ route('admin.video.index')}}">
                <span class="icon"><span class="mif-organization"></span></span>
                <span class="caption">Videos</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.advertise.index')}}">
                <span class="icon"><span class="mif-organization"></span></span>
                <span class="caption">Advertisement</span>
            </a>
    </li>

    <li>
        <a href="{{ route('admin.patner.index')}}">
                <span class="icon"><span class="mif-organization"></span></span>
                <span class="caption">Patners</span>
            </a>
    </li>

    <li>
            <a href="{{ route('admin.menu.index')}}">
                <span class="icon"><span class="mif-organization"></span></span>
                <span class="caption">Menus</span>
            </a>
    </li>

    {{-- <li>
       <a href="{{ route('admin.menu.manage.page')}}">
            <span class="icon"><span class="mif-organization"></span></span>
            <span class="caption">Manage Pages</span>
        </a>
    </li> --}}

    <li>
    <a href="{{ route('admin.client.message')}}">
            <span class="icon"><span class="mif-envelop"></span></span>
            <span class="caption">Client Messages</span>
        </a>
    </li>

    <li>
       <a href="admin/config">
            <span class="icon"><span class="mif-notification"></span></span>
            <span class="caption">Settings</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.user.index')}}">
             <span class="icon"><span class="mif-notification"></span></span>
             <span class="caption">Users</span>
         </a>
     </li>

    <li>
    <a href="{{ route('logout')}}">
            <span class="icon"><span class="mif-backspace"></span></span>
            <span class="caption">Logout</span>
        </a>
    </li>

<ul>
