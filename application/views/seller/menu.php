<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?=base_url();?>admin/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Manage Settings</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?=base_url();?>admin/settings">
                        <i class="bi bi-circle"></i><span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/users">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/clients">
                        <i class="bi bi-circle"></i><span>Clients</span>
                    </a>
                </li>
             

                <li>
                    <a href="<?=base_url();?>admin/testimonials">
                        <i class="bi bi-circle"></i><span>Testimonials</span>
                    </a>
                </li>

              
                <li>
                    <a href="<?=base_url();?>admin/slides">
                        <i class="bi bi-circle"></i><span>Slides</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/messages">
                        <i class="bi bi-circle"></i><span>Messages</span>
                    </a>
                </li>

                <li>
                    <a href="<?=base_url();?>admin/why">
                        <i class="bi bi-circle"></i><span>Why Us</span>
                    </a>
                </li>


            </ul>
        </li><!-- End Components Nav -->





    </ul>

</aside>