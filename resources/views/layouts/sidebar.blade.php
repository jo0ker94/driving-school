@if(Auth::check())
<aside class="main-sidebar" style="background-color:#071a38">
    <section class="sidebar">
            <div style="color:#ffffff">
                    <h3> &nbsp   {{ Auth::user()->name }}</h3>
            </div>
       
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ url('/student') }}">
                    <i class="fa fa-mortar-board"></i>
                    <span style="color:#ffffff">STUDENTS</span>
                </a>
            </li>
                <li>
                <a href="{{ url('/course') }}">
                    <i class="fa fa-book"></i>
                    <span style="color:#ffffff" >COURSES</span>
                </a>
            </li>
            <li>
            <a href="{{ url('/exams') }}">
                <i class="fa fa-pencil-square-o"></i>
                <span style="color:#ffffff">BOOK EXAMS</span>
            </a>
        </li>
        <li>
        <a href="{{ url('/lessons') }}">
            <i class="fa fa-automobile"></i>
            <span style="color:#ffffff">DRIVING LESSONS</span>
        </a>
        </li>
          <li>
        <a href="{{ url('/fee') }}">
            <i class="fa fa-money"></i>
            <span style="color:#ffffff">BOOK PAYMENTS</span>
        </a>
        </li>
        
        </ul>
    </section>
</aside>
@endif
