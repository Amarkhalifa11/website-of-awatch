<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="{{ route('dashboard') }}">
          <svg
            class="brand-icon"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid"
            width="30"
            height="33"
            viewBox="0 0 30 33"
          >
            <g fill="none" fill-rule="evenodd">
              <path
                class="logo-fill-blue"
                fill="#7DBCFF"
                d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
              />
              <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
            </g>
          </svg>
          <span class="brand-name">watches Dashboard</span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">

        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
          

          
            <li  class="has-sub active " >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">users</span> <b class="caret"></b>
              </a>
              <ul  class="collapse "  id="dashboard"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  
                  
                    
                      <li  class="active" >
                        <a class="sidenav-item-link" href="{{ route('Users') }}">
                          <span class="nav-text">all users</span>
                          
                        </a>
                      </li>

                  
                </div>
              </ul>
            </li>
          

          

          
            <li  class="has-sub active" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
                aria-expanded="false" aria-controls="ui-elements">
                <i class="mdi mdi-folder-multiple-outline"></i>
                <span class="nav-text">products</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="ui-elements"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  
                  
                  <li  class="active" >
                    <a class="sidenav-item-link" href="{{ route('all_products') }}">
                      <span class="nav-text">all products</span>
                      
                    </a>
                  </li>

                  <li  class="active" >
                    <a class="sidenav-item-link" href="{{ route('all_products.create') }}">
                      <span class="nav-text">add products</span>
                      
                    </a>
                  </li>


                  
                </div>
              </ul>
            </li>
          

          

          
            <li  class="has-sub active" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"
                aria-expanded="false" aria-controls="charts">
                <i class="mdi mdi-chart-pie"></i>
                <span class="nav-text">orders</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="charts"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  
                  
                    
                      <li class="active">
                        <a class="sidenav-item-link" href="{{ route('all_orders') }}">
                          <span class="nav-text">all orders</span>
                        </a>
                      </li>
                    
                  

                  
                </div>
              </ul>
            </li>
          

          

          
            <li  class="has-sub active" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
                aria-expanded="false" aria-controls="pages">
                <i class="mdi mdi-image-filter-none"></i>
                <span class="nav-text">order items</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="pages"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  
                  
                    
                      <li class="active">
                        <a class="sidenav-item-link" href="{{ route('all_orders_items') }}">
                          <span class="nav-text">all items</span>
                          
                        </a>
                      </li>
                    

                  
                </div>
              </ul>
            </li>
          

          

          
            <li  class="has-sub active" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#documentation"
                aria-expanded="false" aria-controls="documentation">
                <i class="mdi mdi-book-open-page-variant"></i>
                <span class="nav-text">payments</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="documentation"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                
                    
                  

                  
                  
                    
                      <li class="active" >
                        <a class="sidenav-item-link" href="{{ route('all_payment') }}">
                          <span class="nav-text">all payment</span>
                          
                        </a>
                      </li>
                    
                          
                </div>
              </ul>
            </li>
          

          
        </ul>

      </div>

      {{-- <hr class="separator" /> --}}

      {{-- <div class="sidebar-footer">
        <div class="sidebar-footer-content">
          <h6 class="text-uppercase">
            Cpu Uses <span class="float-right">40%</span>
          </h6>
          <div class="progress progress-xs">
            <div
              class="progress-bar active"
              style="width: 40%;"
              role="progressbar"
            ></div>
          </div>
          <h6 class="text-uppercase">
            Memory Uses <span class="float-right">65%</span>
          </h6>
          <div class="progress progress-xs">
            <div
              class="progress-bar progress-bar-warning"
              style="width: 65%;"
              role="progressbar"
            ></div>
          </div>
        </div>
      </div> --}}
    </div>
  </aside>