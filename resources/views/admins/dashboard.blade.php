@extends('admins.layouts.master')

@section('content')


	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<div class="row">
				<div class="col-xl-4">
					<!--begin::Stats Widget 13-->
					<a href="{{route('admin.orders')}}" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
						<!--begin::Body-->
						<div class="card-body">
							<span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
								<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"></rect>
										<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
										<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
										<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
										<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<div class="text-inverse-danger font-weight-bolder font-size-h5 mb-2 mt-5"> {{data()['progress_orders']}} </div>
							<div class="font-weight-bold text-inverse-danger font-size-sm">In Progress Orders</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Stats Widget 13-->
				</div>
				<div class="col-xl-4">
					<!--begin::Stats Widget 14-->
					<a href="{{route('admin.orders')}}" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
						<!--begin::Body-->
						<div class="card-body">
							<span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
								<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"></rect>
										<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
										<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
										<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
										<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">{{data()['completed_orders']}}</div>
							<div class="font-weight-bold text-inverse-primary font-size-sm">Completed Orders</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Stats Widget 14-->
				</div>
				<div class="col-xl-4">
					<!--begin::Stats Widget 15-->
					<a href="{{route('admin.orders')}}" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
						<!--begin::Body-->
						<div class="card-body">
							<span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
								<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"></rect>
										<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
										<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
										<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
										<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">{{data()['canceled_orders']}}</div>
							<div class="font-weight-bold text-inverse-success font-size-sm">Canceled Orders</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Stats Widget 15-->
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4">
					<!--begin::Stats Widget 16-->
					<a href="{{route('admin.users')}}" class="card card-custom card-stretch gutter-b">
						<!--begin::Body-->
						<div class="card-body">
							
							<span class="svg-icon svg-icon-info svg-icon-3x ml-n1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24"/>
									<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
									<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
								</g>
							</svg><!--end::Svg Icon--></span>
							<div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">{{data()['users']}}</div>
							<div class="font-weight-bold text-inverse-white font-size-sm">Active Users</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Stats Widget 16-->
				</div>
				<div class="col-xl-4">
					<!--begin::Stats Widget 17-->
					<a href="{{route('admin.cats')}}" class="card card-custom bg-info bg-hover-state-info card-stretch card-stretch gutter-b">
						<!--begin::Body-->
						<div class="card-body">
							<span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
								<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"></rect>
										<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
										<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<div class="text-inverse-info font-weight-bolder font-size-h5 mb-2 mt-5">{{data()['cats']}}</div>
							<div class="font-weight-bold text-inverse-info font-size-sm">Main Categories</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Stats Widget 17-->
				</div>
				<div class="col-xl-4">
					<!--begin::Stats Widget 18-->
					<a href="{{route('admin.services')}}" class="card card-custom bg-dark bg-hover-state-dark card-stretch gutter-b">
						<!--begin::Body-->
						<div class="card-body">
							<span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
								<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"></rect>
										<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
										<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
										<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
										<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<div class="text-inverse-dark font-weight-bolder font-size-h5 mb-2 mt-5">{{data()['services']}}</div>
							<div class="font-weight-bold text-inverse-dark font-size-sm">Services</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Stats Widget 18-->
				</div>
			</div>


			<!--begin::Row-->
			<div class="row">
				
				
		
				
				
			</div>
			<!--end::Row-->
			
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->



@endsection
