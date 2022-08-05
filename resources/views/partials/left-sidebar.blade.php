<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('service.index')}}"
                       aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Services</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('service.create')}}"
                       aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Service Add</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('customer.index')}}"
                       aria-expanded="false">
                        <i class="fa fa-font" aria-hidden="true"></i>
                        <span class="hide-menu">Customers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('customer.create')}}"
                       aria-expanded="false">
                        <i class="fa fa-font" aria-hidden="true"></i>
                        <span class="hide-menu">Customers Add</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
