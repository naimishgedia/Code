<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
	<div class="container-fluid">
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <span>
	  <h1 style="font-size: 22px;" class="navbar-brand navbar-brand-autodark">
		Admin Panel
	  </h1>
	  </span>
	  <div class="collapse navbar-collapse" id="navbar-menu">
		<ul class="navbar-nav pt-lg-3">
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='dashboard'){echo "active";}?>" href="{{ route('admin.dashboard') }}">
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
			  </span>
			  <span class="nav-link-title">
				Dashboard
			  </span>
			</a>
		  </li>
		
		  @if(canAccess('users'))
		  <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Users 
                  </span>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('users.index') }}" >
                    Users
                  </a>
				  <a class="dropdown-item" href="{{ route('users.scrutinyallowcation') }}" >
                    Allocation
                  </a>
                </div>
          </li>
		  @endif
		 
		  @if(canAccess('country'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='country'){echo "active";}?>" href="{{ route('country.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<?xml version="1.0" encoding="iso-8859-1"?>
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-flag" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="5" y1="5" x2="5" y2="21"></line><line x1="19" y1="5" x2="19" y2="14"></line><path d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0"></path><path d="M5 14a5 5 0 0 1 7 0a5 5 0 0 0 7 0"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Country
			  </span>
			</a>
		  </li>
		  @endif
		   
		  @if(canAccess('state'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='state'){echo "active";}?>" href="{{ route('state.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-community" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><line x1="13" y1="7" x2="13" y2="7.01"></line><line x1="17" y1="7" x2="17" y2="7.01"></line><line x1="17" y1="11" x2="17" y2="11.01"></line><line x1="17" y1="15" x2="17" y2="15.01"></line></svg>
			  </span>
			  <span class="nav-link-title">
				State
			  </span>
			</a>
		  </li>
		  @endif
		  
		  @if(canAccess('city'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='city'){echo "active";}?>" href="{{ route('city.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-pavilon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 21h7v-3a2 2 0 0 1 4 0v3h7"></path><line x1="6" y1="21" x2="6" y2="12"></line><line x1="18" y1="21" x2="18" y2="12"></line> <path d="M6 12h12a3 3 0 0 0 3 -3a9 8 0 0 1 -9 -6a9 8 0 0 1 -9 6a3 3 0 0 0 3 3"></path></svg>
			  </span>
			  <span class="nav-link-title">
				City
			  </span>
			</a>
		  </li>
		  @endif
		  
		  @if(canAccess('caste-category'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Caste'){echo "active";}?>" href="{{ route('caste.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-man" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="5" r="2"></circle><path d="M10 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Caste Category
			  </span>
			</a>
		  </li>
		  @endif
		  
		  @if(canAccess('admission-type'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Admission Type Master'){echo "active";}?>" href="{{ route('admissiontype.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Admission Type 
			  </span>
			</a>
		  </li>
		  @endif
		  
		  @if(canAccess('registration'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Registration Master'){echo "active";}?>" href="{{ route('registration.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="9" cy="7" r="4"></circle><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path><path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path></svg>
			  </span>
			  <span class="nav-link-title">
				registration 
			  </span>
			</a>
		  </li>	
		  @endif 
		  
		  @if(canAccess('blood-group'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Blood Group Master'){echo "active";}?>" href="{{ route('bloodgroup.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-hospital" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path><line x1="10" y1="9" x2="14" y2="9"></line><line x1="12" y1="7" x2="12" y2="11"></line></svg>
			  </span>
			  <span class="nav-link-title">
				Blood Group 
			  </span>
			</a>
		  </li>
		  @endif
		  
		  @if(canAccess('board'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Board Master'){echo "active";}?>" href="{{ route('board.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z"></path><path d="M19 16h-12a2 2 0 0 0 -2 2"></path><path d="M9 8h6"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Board 
			  </span>
			</a>
		  </li>	
		  @endif
		  
		  @if(canAccess('degree'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Degree'){echo "active";}?>" href="{{ route('degree.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Degree 
			  </span>
			</a>
		  </li>
		 @endif		
		 
		  @if(canAccess('degree-type'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Degree Type Master'){echo "active";}?>" href="{{ route('degreetype.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-d" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 4h6a5 5 0 0 1 5 5v6a5 5 0 0 1 -5 5h-6v-16"></path></svg>
			</span>
			  <span class="nav-link-title">
				Degree Type 
			  </span>
			</a>
		  </li>
		  @endif	
		  <!--li class="nav-item">
			<a class="nav-link <?php if($page_title=='Document'){echo "active";}?>" href="{{ route('document.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home >
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 18v-6a3 3 0 0 1 3 -3h7"></path><path d="M10 13l4 -4l-4 -4m5 8l4 -4l-4 -4"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Document 
			  </span>
			</a>
		  </li>	
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Document Type Master'){echo "active";}?>" href="{{ route('documenttype.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home >
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 18v-6a3 3 0 0 1 3 -3h7"></path><path d="M10 13l4 -4l-4 -4m5 8l4 -4l-4 -4"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Document Type 
			  </span>
			</a>
		  </li-->	
		  @if(canAccess('faculty'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Faculty Master'){echo "active";}?>" href="{{ route('faculty.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="9" cy="7" r="4"></circle><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path><path d="M16 11l2 2l4 -4"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Faculty 
			  </span>
			</a>
		  </li>
		 @endif
		 @if(canAccess('mother-tongue'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Mother Tongue Master'){echo "active";}?>" href="{{ route('mothertongue.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-m" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 20v-16l6 14l6 -14v16"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Mother Tongue
			  </span>
			</a>
		  </li>	
		 @endif
		 
		  @if(canAccess('subject'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Subject'){echo "active";}?>" href="{{ route('subject.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><line x1="3" y1="6" x2="3" y2="19"></line><line x1="12" y1="6" x2="12" y2="19"></line><line x1="21" y1="6" x2="21" y2="19"></line></svg>
			  </span>
			  <span class="nav-link-title">
				Subject 
			  </span>
			</a>
		  </li>	
		 @endif
		 
		 @if(canAccess('university'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='University'){echo "active";}?>" href="{{ route('university.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-bank" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><line x1="3" y1="10" x2="21" y2="10"></line><polyline points="5 6 12 3 19 6"></polyline><line x1="4" y1="10" x2="4" y2="21"></line><line x1="20" y1="10" x2="20" y2="21"></line><line x1="8" y1="14" x2="8" y2="17"></line><line x1="12" y1="14" x2="12" y2="17"></line><line x1="16" y1="14" x2="16" y2="17"></line></svg>
			  </span>
			  <span class="nav-link-title">
				University 
			  </span>
			</a>
		  </li>	
		  @endif
		  
		  @if(canAccess('university-type'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='University Type Master'){echo "active";}?>" href="{{ route('universitytype.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-castle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 19v-2a3 3 0 0 0 -6 0v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-14h4v3h3v-3h4v3h3v-3h4v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><line x1="3" y1="11" x2="21" y2="11"></line></svg>
			  </span>
			  <span class="nav-link-title">
				University Type 
			  </span>
			</a>
		  </li>	
		  @endif
		  
		  @if(canAccess('year'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Year Master'){echo "active";}?>" href="{{ route('year.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sort-descending-numbers" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 15l3 3l3 -3"></path><path d="M7 6v12"></path><path d="M17 14a2 2 0 0 1 2 2v3a2 2 0 1 1 -4 0v-3a2 2 0 0 1 2 -2z"></path><circle cx="17" cy="5" r="2"></circle><path d="M19 5v3a2 2 0 0 1 -2 2h-1.5"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Year 
			  </span>
			</a>
		  </li>	
		  @endif
		  
		  @if(canAccess('cms'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Cms Master'){echo "active";}?>" href="{{ route('cms.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-c" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 9a5 5 0 0 0 -5 -5h-2a5 5 0 0 0 -5 5v6a5 5 0 0 0 5 5h2a5 5 0 0 0 5 -5"></path></svg>
			  </span>
			  <span class="nav-link-title">
				CMS 
			  </span>
			</a>
		  </li>	
		  @endif
		  
		  @if(canAccess('examination-location'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Examination Location Master'){echo "active";}?>" href="{{ route('examinationlocation.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="11" r="3"></circle><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Examination Location 
			  </span>
			</a>
		  </li>	
		  @endif
		  
		  @if(canAccess('exemption-criteria'))
		  <li class="nav-item">
			<a class="nav-link <?php if($page_title=='Exemption Criteria Master'){echo "active";}?>" href="{{ route('exemptioncriteria.index')}}" >
			  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shield-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="3" x2="21" y2="21"></line><path d="M17.669 17.669a12 12 0 0 1 -5.669 3.331a12 12 0 0 1 -8.5 -15c.797 .036 1.589 0 2.366 -.126m3.092 -.912a12 12 0 0 0 3.042 -1.962a12 12 0 0 0 8.5 3a12 12 0 0 1 -1.117 9.379"></path></svg>
			  </span>
			  <span class="nav-link-title">
				Exemption Criteria
			  </span>
			</a>
		  </li>
		  @endif
		</ul>
	  </div>
	</div>
</aside>