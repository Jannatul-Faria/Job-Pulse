<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>

        <li class="">
            <a href="" class="waves-effect" aria-expanded="false">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboard">Dashboard</span>
            </a>
        </li>


        <li class="">
            <a href="{{ route('admin.job-types.index') }}" class="waves-effect" aria-expanded="false">
                <i class="bx bx-briefcase-alt"></i>
                <span key="t-job-type">Job Type</span>
            </a>
        </li>

        <li class="">
            <a href="{{ route('admin.categories.index') }}" class="waves-effect" aria-expanded="false">
                <i class="bx bx-purchase-tag-alt"></i>
                <span key="t-categories">Categories</span>
            </a>
        </li>

        <li class="">
            <a href="{{ route('admin.blogs.index') }}" class="waves-effect" aria-expanded="false">
                <i class="bx bx-detail"></i>
                <span key="t-blogs">Blogs</span>
            </a>
        </li>


        <li>
            <a href="{{ route('admin.position.index') }}" class="waves-effect" aria-expanded="false">
                <i class="bx bx-user"></i>
                <span key="t-positions">Positions</span>
            </a>
        </li>
    </ul>
</div>
