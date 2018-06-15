@if(Auth::check())
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
            </div>
            <div class="pull-left info">
               
                <p>{{ Auth::user()->name }}</p>
            </div> <br><br>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ url('/student') }}">
                    <i class="fa fa-mortar-board"></i>
                    <span>STUDENTS</span>
                </a>
            </li>
                <li>
                <a href="{{ url('/course') }}">
                    <i class="fa fa-book"></i>
                    <span>COURSES</span>
                </a>
            </li>
            <li>
            <a href="{{ url('/exams') }}">
                <i class="fa fa-pencil-square-o"></i>
                <span>BOOK EXAMS</span>
            </a>
        </li>
        <li>
        <a href="{{ url('/lessons') }}">
            <i class="fa fa-automobile"></i>
            <span>DRIVING LESSONS</span>
        </a>
        </li>
          <li>
        <a href="{{ url('/fee') }}">
            <i class="fa fa-money"></i>
            <span>BOOK PAYMENTS</span>
        </a>
        </li>
        
        </ul>
    </section>
</aside>
@endif
