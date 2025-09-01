  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links --><ul class="navbar-nav" style="margin-left: auto;">
  <!-- Messages Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-comments"></i>
      <span class="badge badge-danger navbar-badge">3</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <a href="#" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
          <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
          <div class="media-body">
            <h3 class="dropdown-item-title">
              Brad Diesel
              <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
            </h3>
            <p class="text-sm">Call me whenever you can...</p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
          </div>
        </div>
        <!-- Message End -->
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
          <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
          <div class="media-body">
            <h3 class="dropdown-item-title">
              John Pierce
              <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
            </h3>
            <p class="text-sm">I got your message bro</p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
          </div>
        </div>
        <!-- Message End -->
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
          <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
          <div class="media-body">
            <h3 class="dropdown-item-title">
              Nora Silvester
              <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
            </h3>
            <p class="text-sm">The subject goes here</p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
          </div>
        </div>
        <!-- Message End -->
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
    </div>
  </li>
  <!-- Notifications Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
      <span class="badge badge-warning navbar-badge">15</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item dropdown-header">15 Notifications</span>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fas fa-envelope mr-2"></i> 4 new messages
        <span class="float-right text-muted text-sm">3 mins</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fas fa-users mr-2"></i> 8 friend requests
        <span class="float-right text-muted text-sm">12 hours</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fas fa-file mr-2"></i> 3 new reports
        <span class="float-right text-muted text-sm">2 days</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
  </li>
</ul>
  </nav>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <img src=" {{ asset('dist/img/Avm_logo1.png') }}" alt="Admin Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">Adarsh Vidya Mandir</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ Auth::user()->profile_pic ? asset('uploads/profile/' . Auth::user()->profile_pic) : asset('dist/img/user2-160x160.jpg') }}" 
              class="img-circle elevation-2" alt="User Image" width="40" height="40">

              {{-- <img src=" {{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
              <a href="{{ asset('admin/dashboard') }}" class="d-block">{{ Auth::user()->name }} {{Auth::user()->last_name}}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              
              @if(Auth::user()->user_type == 1)
              <li class="nav-item">
                <a href="{{ asset('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/admin/list') }}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Admin
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/teacher/list') }}" class="nav-link @if(Request::segment(2) == 'teacher') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Teacher
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/student/list') }}" class="nav-link @if(Request::segment(2) == 'student') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Student
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/parents/list') }}" class="nav-link @if(Request::segment(2) == 'parents') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Parents
                  </p>
                </a>
              </li>
              <li class="nav-item @if(Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assigned-subject' || Request::segment(2) == 'assigned_class_teacher' || Request::segment(2) == 'class_timetable') active  menu-is-opening menu-open @endif">
                <a href="#" class="nav-link @if(Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assigned-subject' || Request::segment(2) == 'assigned_class_teacher'  || Request::segment(2) == 'class_timetable') active @endif">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Academics
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ asset('admin/class/list') }}" class="nav-link @if(Request::segment(2) == 'class') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Class</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ asset('admin/subject/list') }}" class="nav-link @if(Request::segment(2) == 'subject') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Subject</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ asset('admin/assigned-subject/list') }}" class="nav-link @if(Request::segment(2) == 'assigned-subject') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Assign Subject</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ asset('admin/assigned_class_teacher/list') }}" class="nav-link @if(Request::segment(2) == 'assigned_class_teacher') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Assign class Teacher</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ asset('admin/class_timetable/list') }}" class="nav-link @if(Request::segment(2) == 'class_timetable') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Class Timetable </p>
                    </a>
                  </li>
                </ul>



                <li class="nav-item @if(Request::segment(2) == 'examination') active  menu-is-opening menu-open @endif">
                  <a href="#" class="nav-link @if(Request::segment(2) == 'examination') active @endif">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Examinations
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ asset('admin/examination/exam/list') }}" class="nav-link @if(Request::segment(2) == 'exam') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ asset('admin/examination/exam_schedule') }}" class="nav-link @if(Request::segment(2) == 'exam') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam Schedule</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <li class="nav-item">
                <a href="{{ asset('admin/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    My Account
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Change Password
                  </p>
                </a>
              </li>
              
              @elseif(Auth::user()->user_type == 2)
              <li class="nav-item">
                <a href="{{ asset('teacher/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('teacher/my_student') }}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    My Student
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('teacher/my_class_subject') }}" class="nav-link @if(Request::segment(2) == 'my_class_subject') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    My Class & Subject
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('teacher/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    My Account
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('teacher/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Change Password
                  </p>
                </a>
              </li>
              @elseif(Auth::user()->user_type == 4)
              <li class="nav-item">
                <a href="{{ asset('parent/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('parent/my_student') }}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    My Student
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('parent/my_account') }}" class="nav-link @if(Request::segment(2) == 'my_account') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    My Account
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('parent/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Change Password
                  </p> 
                </a>
              </li>
              @elseif(Auth::user()->user_type == 5)
              <li class="nav-item">
                <a href="{{ asset('student/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('student/my_timetable') }}" class="nav-link @if(Request::segment(2) == 'my_timetable') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Timetable
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('student/my_exam_timetable') }}" class="nav-link @if(Request::segment(2) == 'my_exam_timetable') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Exam Timetable
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('student/my_subject') }}" class="nav-link @if(Request::segment(2) == 'my_subject') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    My Subject
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('admin/student/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    My Account
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('student/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Change Password
                  </p>
                </a>
              </li>
              @endif

              <li class="nav-item">
                <a href="{{ asset('logout') }}" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>