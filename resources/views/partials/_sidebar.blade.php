<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{route('client.index')}}" aria-expanded="{{request()->routeIs('client.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>العملاء</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{route('users.index')}}" aria-expanded="{{request()->routeIs('client.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>المستخدمين</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="{{route('roles.index')}}" aria-expanded="{{request()->routeIs('client.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>الادوار</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{route('case.index')}}" aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>القضايا</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="{{route('Typecases.index')}}"
                   aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>انواع القضايا</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="{{route('lawercases.index')}}"
                   aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span> وضع القضيه</span>
                    </div>
                </a>
            </li>



            <li class="menu">
                <a href="{{route('statuscases.index')}}"
                   aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span> حاله الدعوه</span>
                    </div>
                </a>
            </li>




            <li class="menu">
                <a href="{{route('expensecases.index')}}"
                   aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>مصروفات القضايا</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{route('expensepayment.index')}}"
                   aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>مدفوعات المصاريف</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="{{route('lawyers.index')}}" aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span> المحامين</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{route('courts.index')}}" aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>المحاكم</span>
                    </div>
                </a>
            </li>



            <li class="menu">
                <a href="{{route('typecourts.index')}}" aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>نوع المحكمه</span>
                    </div>
                </a>
            </li>




            <li class="menu">
                <a href="{{route('statements.index')}}" aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>تميز البيان</span>
                    </div>
                </a>
            </li>





            <li class="menu">
                <a href="{{route('typessesiots.index')}}" aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>نوع الجلسات</span>
                    </div>
                </a>
            </li>




            <li class="menu">
                <a href="{{route('ssesiots.index')}}" aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>الجلسات</span>
                    </div>
                </a>
            </li>



            <li class="menu">
                <a href="{{route('decisions.index')}}" aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>قرارت الجلسه</span>
                    </div>
                </a>
            </li>




            <li class="menu">
                <a href="{{route('stages.index')}}" aria-expanded="{{request()->routeIs('case.*') ? 'true' :'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>مراحل التقاضي</span>
                    </div>
                </a>
            </li>




            <li class="menu">
                <a href="{{route('document.index')}}"
                   aria-expanded="{{request()->routeIs('document.*') ? 'true' :'false'}}" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>المستندات</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{route('payment.index')}}"
                   aria-expanded="{{request()->routeIs('payment.*') ? 'true' :'false'}}" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>الدفعات</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{route('expense.index')}}"
                   aria-expanded="{{request()->routeIs('expense.*') ? 'true' :'false'}}" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>المصروفات</span>
                    </div>
                </a>
            </li>

        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->
