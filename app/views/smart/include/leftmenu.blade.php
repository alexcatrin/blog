<!-- NAVIGATION : This navigation is also responsive

To make this navigation dynamic please make sure to link the node
(the reference to the nav > ul) after page load. Or the navigation
will not initialize.
-->
<nav>
<!-- NOTE: Notice the gaps after each icon usage <i></i>..
Please note that these links work a bit different than
traditional hre="" links. See documentation for details.
-->
    <ul>
        <li {{ Request::is('categories') ? 'class=active' : '' }}>
            <a href="{{ URL::to('categories') }}"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Categories</span></a>
        </li>
        <li {{ Request::is('posts') || Request::is('/') ? 'class=active' : '' }}>
        <a href="{{ URL::to('posts') }}"><i class="fa fa-lg fa-fw fa-edit"></i><span>Posts</span></a>
        </li>

    </ul>
</nav>
<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>