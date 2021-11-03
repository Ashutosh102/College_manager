	<div class="row w-100">
		<button class="show-btn button-show ml-auto">
		<i class="fa fa-bars py-1" aria-hidden="true"></i>
		</button> 
	</div>
		<nav id="sidebarMenu" class="">
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
        		<div class="sidebar-header">
					<a class="nav-link text-white" href="../teacher/teacher-index.php">
					<span class="home"></span>
						<i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard
					</a>
				</div>
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="../admin/display-teacher.php">
						<span data-feather="file"></span>
						<i class="fa fa-user mr-2" aria-hidden="true"></i> Personal Profile
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/teacher-personal-information.php">
						<span data-feather="file"></span>
						<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Personal Information
						</a>
						</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/teacher-courses.php">
						<span data-feather="shopping-cart"></span>
						<i class="fa fa-address-book mr-2" aria-hidden="true"></i> Teacher Courses
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/student-attendance.php">
						<span data-feather="users"></span>
						<i class="fa fa-check-circle mr-2" aria-hidden="true"></i> Student Attnedance
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/class-result.php">
						<span data-feather="users"></span>
						<i class="fa fa-users mr-2" aria-hidden="true"></i> Class Results
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/teacher-password.php">
						<span data-feather="bar-chart-2"></span>
						<i class="fa fa-key mr-2" aria-hidden="true"></i> Change Password
						</a>
					</li>
				</ul>
			</div>
		</nav>
		
		<script>
			const toggleBtn = document.querySelector(".show-btn");
			const sidebar = document.querySelector(".sidebar");
			// undefined
			toggleBtn.addEventListener("click",function(){
				sidebar.classList.toggle("show-sidebar");
			});
			
		</script>