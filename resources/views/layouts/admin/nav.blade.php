
    <aside class="sidebar sidebar-base sidebar-white sidebar-default navs-rounded-all " id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="../dashboard/index.html" class="navbar-brand">

                <!--Logo start-->
                <div class="logo-main">
                    <div class="logo-normal">
                        <img src="{{ asset('assets/images/dashboard/Naamloos-2.png') }}" alt="header" width="80%">
                    </div>
                    <div class="logo-mini">
                        <img src="{{ asset('assets/images/dashboard/logo.png') }}" alt="header" width="25%">

                    </div>
                </div>
                <!--logo End-->
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">

                    <svg class="icon-10" width="10" height="10" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.29853 8C7.11974 8 6.94002 7.93083 6.80335 7.79248L3.53927 4.50446C3.40728 4.37085 3.33333 4.18987 3.33333 4.00036C3.33333 3.81179 3.40728 3.63081 3.53927 3.4972L6.80335 0.207279C7.07762 -0.069408 7.52132 -0.069408 7.79558 0.209174C8.06892 0.487756 8.06798 0.937847 7.79371 1.21453L5.02949 4.00036L7.79371 6.78618C8.06798 7.06286 8.06892 7.51201 7.79558 7.79059C7.65892 7.93083 7.47826 8 7.29853 8Z" fill="white"/>
                        <path d="M3.96552 8C3.78673 8 3.60701 7.93083 3.47034 7.79248L0.206261 4.50446C0.0742745 4.37085 0.000325203 4.18987 0.000325203 4.00036C0.000325203 3.81179 0.0742745 3.63081 0.206261 3.4972L3.47034 0.207279C3.74461 -0.069408 4.18831 -0.069408 4.46258 0.209174C4.73591 0.487756 4.73497 0.937847 4.4607 1.21453L1.69649 4.00036L4.4607 6.78618C4.73497 7.06286 4.73591 7.51201 4.46258 7.79059C4.32591 7.93083 4.14525 8 3.96552 8Z" fill="white"/>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
              
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                            <span class="default-icon">Home</span>
                            <span class="mini-icon" data-bs-toggle="tooltip" title="Home" data-bs-placement="right">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ url('/') }}">
                            <i class="icon" data-bs-toggle="tooltip" title="Dashboard" data-bs-placement="right">
                                <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    {{--  --}}
                    @if(Auth::user()->vc_tipo_utilizador==2 || Auth::user()->vc_tipo_utilizador==3)
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('prestador.perfil.index') }}" >

                            <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Users" data-bs-original-title="Users">
                                <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                                    <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                                    <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Perfil</span>
                            {{-- <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i> --}}
                        </a>

                    </li>
                    @endif
                    @if(Auth::user()->vc_tipo_utilizador==1)
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('admin.user.index') }}" >

                            <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Users" data-bs-original-title="Users">
                                <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                                    <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                                    <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Utilizadores</span>
                            {{-- <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i> --}}
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('admin.prestador.empresa.index') }}" >

                         <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Users" data-bs-original-title="Users">
                                <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                                    <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                                    <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Prestadores de <br> Serviços Empresa</span>

                        </a>

                    </li>
                    
                    <li class="nav-item">
                         <a class="nav-link " href="{{route('admin.individual.index')}}">

                         <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Users" data-bs-original-title="Users">
                                <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                                    <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                                    <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Prestadores de <br>  Serviços Individual</span>

                        </a>

                    </li>
                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                            <span class="default-icon">Configurações</span>
                            <span class="mini-icon" data-bs-toggle="tooltip" title="Home" data-bs-placement="right">-</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link"  href="{{ route('admin.categoria.index') }}" >
                  

                           <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Spacial Pages" data-bs-original-title="Spacial Pages">
                               <svg width="20" class="icon-20" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path opacity="0.4" d="M6.85044 12.5583C5.32841 11.6182 3.91355 10.5097 2.63172 9.25306C1.7268 8.35584 1.0357 7.26031 0.611238 6.05018C-0.147183 3.69015 0.735667 0.992986 3.20054 0.192264C4.50154 -0.216313 5.9165 0.034503 7.00449 0.866556C8.09289 0.0354335 9.50738 -0.215301 10.8085 0.192264C13.2733 0.992986 14.1621 3.69015 13.4037 6.05018C12.9827 7.25917 12.2957 8.3546 11.395 9.25306C10.1121 10.5083 8.69734 11.6167 7.17632 12.5583L7.01042 12.6667L6.85044 12.5583Z" fill="currentColor"></path>
                                   <path d="M7.00694 12.6666L6.85033 12.5583C5.32643 11.6183 3.90959 10.5098 2.62569 9.25304C1.71648 8.35707 1.02126 7.26144 0.593354 6.05016C-0.159142 3.69013 0.723708 0.992966 3.18858 0.192245C4.48958 -0.216332 5.9232 0.0346753 7.00694 0.873695V12.6666Z" fill="currentColor"></path>
                                   <path d="M11.153 4.66615C11.0191 4.65753 10.8943 4.5906 10.8081 4.48104C10.7218 4.37149 10.6815 4.22893 10.6966 4.08677C10.7111 3.61854 10.4447 3.19234 10.0338 3.02651C9.7733 2.95539 9.61553 2.67324 9.6807 2.39499C9.74255 2.12121 9.99891 1.95098 10.2566 2.0126C10.2891 2.018 10.3204 2.02979 10.3489 2.04737C11.1727 2.36439 11.7061 3.2176 11.6637 4.1505C11.6623 4.2919 11.6072 4.42665 11.5109 4.52387C11.4146 4.62109 11.2854 4.67244 11.153 4.66615Z" fill="currentColor"></path>
                               </svg>
                           </i>
                           <span class="item-name">Categosrias dos <br> Serviços</span>

                       </a>

                   </li>
                    <li class="nav-item">
                    
                        <a class="nav-link " href="{{route('admin.sub_categoria.index')}}">
                            <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Menu Style" data-bs-original-title="Menu Style">
                                <svg width="20" class="icon-20" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M13.6663 6.99992C13.6663 10.6826 10.6817 13.6666 6.99967 13.6666C3.31767 13.6666 0.333008 10.6826 0.333008 6.99992C0.333008 3.31859 3.31767 0.333252 6.99967 0.333252C10.6817 0.333252 13.6663 3.31859 13.6663 6.99992Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.01351 6.20239C3.57284 6.20239 3.21484 6.56039 3.21484 6.99973C3.21484 7.43973 3.57284 7.79839 4.01351 7.79839C4.45418 7.79839 4.81218 7.43973 4.81218 6.99973C4.81218 6.56039 4.45418 6.20239 4.01351 6.20239ZM6.99958 6.20239C6.55891 6.20239 6.20091 6.56039 6.20091 6.99973C6.20091 7.43973 6.55891 7.79839 6.99958 7.79839C7.44024 7.79839 7.79824 7.43973 7.79824 6.99973C7.79824 6.56039 7.44024 6.20239 6.99958 6.20239ZM9.18718 6.99973C9.18718 6.56039 9.54518 6.20239 9.98584 6.20239C10.4265 6.20239 10.7845 6.56039 10.7845 6.99973C10.7845 7.43973 10.4265 7.79839 9.98584 7.79839C9.54518 7.79839 9.18718 7.43973 9.18718 6.99973Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Subcategoria <br> de Serviços:</span>

                        </a>

                    </li>
                    
                   
                 
          

                    @endif

                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                            <span class="default-icon">Estabelecimento</span>
                            <span class="mini-icon" data-bs-toggle="tooltip" title="Home" data-bs-placement="right">-</span>
                        </a>
                    </li>
                    {{-- admin.sub_categoria.index --}}





                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('admin.servico.index')}}">

                           <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Spacial Pages" data-bs-original-title="Spacial Pages">
                               <svg width="20" class="icon-20" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path opacity="0.4" d="M6.85044 12.5583C5.32841 11.6182 3.91355 10.5097 2.63172 9.25306C1.7268 8.35584 1.0357 7.26031 0.611238 6.05018C-0.147183 3.69015 0.735667 0.992986 3.20054 0.192264C4.50154 -0.216313 5.9165 0.034503 7.00449 0.866556C8.09289 0.0354335 9.50738 -0.215301 10.8085 0.192264C13.2733 0.992986 14.1621 3.69015 13.4037 6.05018C12.9827 7.25917 12.2957 8.3546 11.395 9.25306C10.1121 10.5083 8.69734 11.6167 7.17632 12.5583L7.01042 12.6667L6.85044 12.5583Z" fill="currentColor"></path>
                                   <path d="M7.00694 12.6666L6.85033 12.5583C5.32643 11.6183 3.90959 10.5098 2.62569 9.25304C1.71648 8.35707 1.02126 7.26144 0.593354 6.05016C-0.159142 3.69013 0.723708 0.992966 3.18858 0.192245C4.48958 -0.216332 5.9232 0.0346753 7.00694 0.873695V12.6666Z" fill="currentColor"></path>
                                   <path d="M11.153 4.66615C11.0191 4.65753 10.8943 4.5906 10.8081 4.48104C10.7218 4.37149 10.6815 4.22893 10.6966 4.08677C10.7111 3.61854 10.4447 3.19234 10.0338 3.02651C9.7733 2.95539 9.61553 2.67324 9.6807 2.39499C9.74255 2.12121 9.99891 1.95098 10.2566 2.0126C10.2891 2.018 10.3204 2.02979 10.3489 2.04737C11.1727 2.36439 11.7061 3.2176 11.6637 4.1505C11.6623 4.2919 11.6072 4.42665 11.5109 4.52387C11.4146 4.62109 11.2854 4.67244 11.153 4.66615Z" fill="currentColor"></path>
                               </svg>
                           </i>
                           <span class="item-name">Serviços</span>

                       </a>
                       <br>
                       <br>
                   </li>
                </ul>

                <!-- Sidebar Menu End -->        </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>

