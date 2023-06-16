@extends('layouts.app')
@section('page-style')
<link rel="stylesheet" href="{{asset('css/pages/dashboard.css')}}">
@endsection
@section('content')
	<div class="content-wrapper">
		<div class="">
			<div class="">
				<div class="">
					<div class="panel-heading">
						@include('partials.flash')
					</div>
					<div class="pt-5">
						<div class="row">
							@if(auth()->user()->checkSpPermission('Sale-receive-chart Dashboard'))
							<div class="col-md-8">
								<div class="box box-success">
									<div class="box-header with-border">
										<h4>{{__('Sale & Receive Flow')}}</h4>
									</div>
									<div class="box-body">
											<div id="area-chart" ></div>
										<input type="hidden" id="chartData" value="{{ json_encode($incomeexpensechart) }}">
									</div>
								</div>
							</div>
							@endif
							<div class="col-md-4">
								<div class="box box-success">
									
									<div class="box-body">
										<a href="{{route('sales.index')}}"><span class="info-box-icon bg-white"><i class="fa fa-shopping-cart"></i></span></a>
										 <span class="info-box-text">{{__('Sales')}}</span>
										 <span class="info-box-number">{{currencySymbol().number_format($totalincome, 2)}}</span>
										 <div class="progress-group" title="{{__('Income Dues').' '.currencySymbol().number_format($income_dues, 2)}}" data-toggle="tooltip" data-html="true">
											 
											  <span class="progress-text">{{__('Receivables')}}</span>
											  <span class="progress-number">{{currencySymbol().number_format($income_dues, 2)}}</span>
										 </div>
									</div>
							  </div>
							  <div class="box box-success">
								
								<div class="box-body">
									<a href="{{route('receivings.index')}}"><span class="info-box-icon bg-white"><i class="fa fa-cart-arrow-down"></i></span></a>
									 <span class="info-box-text">{{__('Expenses')}}</span>
									<span class="info-box-number">{{currencySymbol().number_format($total_exp, 2)}}</span>
									 <div class="progress-group" title="{{__('Expense Dues').' '.currencySymbol().number_format($exp_dues, 2)}}" data-toggle="tooltip" data-html="true">
										  
										  <span class="progress-text">{{__('Payables')}}</span>
										  <span class="progress-number">{{currencySymbol().number_format($exp_dues, 2)}}</span>
									 </div>
								</div>
						  		</div>
								  <div class="box box-success">
									@php
									$sign = '';
									$total_profit = $totalincome - $total_exp;
									if ($total_profit < 0) {
											$sign = ' - ';
											$total_profit = abs($total_profit);
									}
								@endphp
									<div class="box-body">
										<a href="#"><span class="info-box-icon bg-white"><i class="fa fa-dollar"></i></span></a>
										 <span class="info-box-text">{{__('Total Profit')}}</span>
										 <span class="info-box-number">{{$sign.currencySymbol().number_format($total_profit, 2)}}</span>
										 <div class="progress-group" title="{{__('Income Dues').' '.currencySymbol().number_format($income_dues, 2)}}" data-toggle="tooltip" data-html="true">
											 
											  <span class="progress-text">{{__('Upcoming')}}</span>
											  <span class="progress-number">{{currencySymbol().number_format($income_dues, 2)}}</span>
										 </div>
									</div>
							  </div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="purple well">
									<i class="fa fa-user" aria-hidden="true"></i><br>
									<span>{{trans('dashboard.total_employees')}} : {{$employees}}</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="chocolate well">
									<i class="fa fa-users" aria-hidden="true"></i><br>
									<span>{{trans('dashboard.total_customers')}} : {{$customers}}</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="well yellow">
									<i class="fa fa-cubes" aria-hidden="true"></i><br>
									<span>{{trans('dashboard.total_suppliers')}} : {{$suppliers}}</span>
								</div>
							</div>
						</div>
	
						<div class="row">
						  <div class="col-md-3">
							<div class="well green">
								<i class="fa fa-bars" aria-hidden="true"></i><br>
								<span>{{trans('dashboard.total_items')}} : {{$items}}</span>
							</div>
						  </div>
						  <div class="col-md-3">
							<div class="well blue">
								<i class="fa fa-list" aria-hidden="true"></i><br>
								<span>{{trans('dashboard.total_expenses')}} : {{$expenses}}</span>
							</div>
						  </div>
						  <div class="col-md-3">
							<div class="violet well">
								<i class="fa fa-sitemap" aria-hidden="true"></i><br>
								<span>{{trans('dashboard.total_receivings')}} : {{$receivings}}</span>
							</div>
						  </div>
						  <div class="col-md-3">
							<div class="brown well">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i><br>
								<span>{{trans('dashboard.total_sales')}} : {{$sales}}</span>
							</div>
						  </div>
						</div>
						<!-- latest section -->
						@if(auth()->user()->checkSpPermission('Latest-income-expense Dashboard'))
						@include('dashboard.partials.latest')
						@endif
						
	
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
</script>
@endsection
