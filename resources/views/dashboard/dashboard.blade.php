@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<!-- Content area -->

		<!-- Main charts -->
		<div class="row">
			<div class="col-xl-7">

				<!-- Traffic sources -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h6 class="card-title">Traffic sources</h6>
						<div class="header-elements">
							<div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
								<label class="form-check-label">
									Live update:
									<input type="checkbox" class="form-input-switchery" checked data-fouc>
								</label>
							</div>
						</div>
					</div>

					<div class="card-body py-0">
						<div class="row">
							<div class="col-sm-4">
								<div class="d-flex align-items-center justify-content-center mb-2">
									<a href="#" class="btn bg-transparent border-teal text-teal rounded-round border-2 btn-icon mr-3">
										<i class="icon-plus3"></i>
									</a>
									<div>
										<div class="font-weight-semibold">New visitors</div>
										<span class="text-muted">2,349 avg</span>
									</div>
								</div>
								<div class="w-75 mx-auto mb-3" id="new-visitors"></div>
							</div>

							<div class="col-sm-4">
								<div class="d-flex align-items-center justify-content-center mb-2">
									<a href="#" class="btn bg-transparent border-warning-400 text-warning-400 rounded-round border-2 btn-icon mr-3">
										<i class="icon-watch2"></i>
									</a>
									<div>
										<div class="font-weight-semibold">New sessions</div>
										<span class="text-muted">08:20 avg</span>
									</div>
								</div>
								<div class="w-75 mx-auto mb-3" id="new-sessions"></div>
							</div>

							<div class="col-sm-4">
								<div class="d-flex align-items-center justify-content-center mb-2">
									<a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon mr-3">
										<i class="icon-people"></i>
									</a>
									<div>
										<div class="font-weight-semibold">Total online</div>
										<span class="text-muted"><span class="badge badge-mark border-success mr-2"></span> 5,378 avg</span>
									</div>
								</div>
								<div class="w-75 mx-auto mb-3" id="total-online"></div>
							</div>
						</div>
					</div>

					<div class="chart position-relative" id="traffic-sources"></div>
				</div>
				<!-- /traffic sources -->

			</div>

			<div class="col-xl-5">

				<!-- Sales stats -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h6 class="card-title">Sales statistics</h6>
						<div class="header-elements">
							<select class="form-control" id="select_date" data-fouc>
								<option value="val1">June, 29 - July, 5</option>
								<option value="val2">June, 22 - June 28</option>
								<option value="val3" selected>June, 15 - June, 21</option>
								<option value="val4">June, 8 - June, 14</option>
							</select>
						</div>
					</div>

					<div class="card-body py-0">
						<div class="row text-center">
							<div class="col-4">
								<div class="mb-3">
									<h5 class="font-weight-semibold mb-0">5,689</h5>
									<span class="text-muted font-size-sm">new orders</span>
								</div>
							</div>

							<div class="col-4">
								<div class="mb-3">
									<h5 class="font-weight-semibold mb-0">32,568</h5>
									<span class="text-muted font-size-sm">this month</span>
								</div>
							</div>

							<div class="col-4">
								<div class="mb-3">
									<h5 class="font-weight-semibold mb-0">$23,464</h5>
									<span class="text-muted font-size-sm">expected profit</span>
								</div>
							</div>
						</div>
					</div>

					<div class="chart mb-2" id="app_sales"></div>
					<div class="chart" id="monthly-sales-stats"></div>
				</div>
				<!-- /sales stats -->

			</div>
		</div>
		<!-- /main charts -->


		<!-- Dashboard content -->
		<div class="row">
			<div class="col-xl-6">
			 <!--- Pie Chart -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Pie chart timeline</h5>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
								<a class="list-icons-item" data-action="reload"></a>
								<a class="list-icons-item" data-action="remove"></a>
							</div>
						</div>
					</div>

					<div class="card-body">
						<div class="chart-container">
							<div class="chart has-fixed-height" id="pie_timeline" _echarts_instance_="ec_1567600729313" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;"><div style="position: relative; overflow: hidden; width: 804px; height: 400px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="1005" height="500" style="position: absolute; left: 0px; top: 0px; width: 804px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div></div></div>
						</div>
					</div>
				</div>
				<!--- /Pie Chart -->
			</div>
			<div class="col-xl-6">

			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
					 <!---Calendar Agenda-->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Basic view</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<p class="mb-3">FullCalendar is a jQuery plugin that provides a full-sized, drag &amp; drop event calendar like the one below. It uses AJAX to fetch events on-the-fly and is easily configured to use your own feed format. It is visually customizable with a rich API. Example below demonstrates a default view of the calendar with a basic setup: draggable and editable events, and starting date.</p>

				<div class="fullcalendar-basic fc fc-ltr fc-unthemed" style=""><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-button-primary" aria-label="prev"><span class="fc-icon fc-icon-chevron-left"></span></button><button type="button" class="fc-next-button fc-button fc-button-primary" aria-label="next"><span class="fc-icon fc-icon-chevron-right"></span></button></div><button type="button" class="fc-today-button fc-button fc-button-primary">today</button></div><div class="fc-center"><h2>November 2014</h2></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-dayGridMonth-button fc-button fc-button-primary fc-button-active">month</button><button type="button" class="fc-dayGridWeek-button fc-button fc-button-primary">week</button><button type="button" class="fc-dayGridDay-button fc-button fc-button-primary">day</button></div></div></div><div class="fc-view-container"><div class="fc-view fc-dayGridMonth-view fc-dayGrid-view" style=""><table class=""><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header"><table class=""><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 1194px;"><div class="fc-day-grid"><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 198.5px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2014-10-26"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2014-10-27"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2014-10-28"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2014-10-29"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-past" data-date="2014-10-30"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-past" data-date="2014-10-31"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2014-11-01"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2014-10-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2014-10-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2014-10-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-wed fc-other-month fc-past" data-date="2014-10-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-thu fc-other-month fc-past" data-date="2014-10-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-fri fc-other-month fc-past" data-date="2014-10-31"><span class="fc-day-number">31</span></td><td class="fc-day-top fc-sat fc-past" data-date="2014-11-01"><span class="fc-day-number">1</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">All Day Event</span></div><div class="fc-resizer fc-end-resizer"></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 198.5px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2014-11-02"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2014-11-03"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2014-11-04"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2014-11-05"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2014-11-06"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2014-11-07"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2014-11-08"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2014-11-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-mon fc-past" data-date="2014-11-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-tue fc-past" data-date="2014-11-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-wed fc-past" data-date="2014-11-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-thu fc-past" data-date="2014-11-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-fri fc-past" data-date="2014-11-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-sat fc-past" data-date="2014-11-08"><span class="fc-day-number">8</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td class="fc-event-container" colspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-not-end fc-draggable"><div class="fc-content"> <span class="fc-title">Long Event</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 198.5px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2014-11-09"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2014-11-10"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2014-11-11"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2014-11-12"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2014-11-13"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2014-11-14"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2014-11-15"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2014-11-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-mon fc-past" data-date="2014-11-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-tue fc-past" data-date="2014-11-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-wed fc-past" data-date="2014-11-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-thu fc-past" data-date="2014-11-13"><span class="fc-day-number">13</span></td><td class="fc-day-top fc-fri fc-past" data-date="2014-11-14"><span class="fc-day-number">14</span></td><td class="fc-day-top fc-sat fc-past" data-date="2014-11-15"><span class="fc-day-number">15</span></td></tr></thead><tbody><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-not-start fc-end fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">Long Event</span></div><div class="fc-resizer fc-end-resizer"></div></a></td><td rowspan="6"></td><td class="fc-event-container" colspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">Conference</span></div><div class="fc-resizer fc-end-resizer"></div></a></td><td class="fc-event-container" rowspan="6"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">7a</span> <span class="fc-title">Birthday Party</span></div></a></td><td rowspan="6"></td><td rowspan="6"></td></tr><tr><td class="fc-event-container" rowspan="5"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">4p</span> <span class="fc-title">Repeating Event</span></div></a></td><td rowspan="5"></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">10:30a</span> <span class="fc-title">Meeting</span></div></a></td></tr><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">12p</span> <span class="fc-title">Lunch</span></div></a></td></tr><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">2:30p</span> <span class="fc-title">Meeting</span></div></a></td></tr><tr class=""><td class="fc-event-container fc-limited"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">5:30p</span> <span class="fc-title">Happy Hour</span></div></a></td><td class="fc-more-cell" rowspan="1"><div><a class="fc-more">+2 more</a></div></td></tr><tr class="fc-limited"><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">8p</span> <span class="fc-title">Dinner</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 199.5px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2014-11-16"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2014-11-17"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2014-11-18"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2014-11-19"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2014-11-20"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2014-11-21"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2014-11-22"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2014-11-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-mon fc-past" data-date="2014-11-17"><span class="fc-day-number">17</span></td><td class="fc-day-top fc-tue fc-past" data-date="2014-11-18"><span class="fc-day-number">18</span></td><td class="fc-day-top fc-wed fc-past" data-date="2014-11-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-thu fc-past" data-date="2014-11-20"><span class="fc-day-number">20</span></td><td class="fc-day-top fc-fri fc-past" data-date="2014-11-21"><span class="fc-day-number">21</span></td><td class="fc-day-top fc-sat fc-past" data-date="2014-11-22"><span class="fc-day-number">22</span></td></tr></thead><tbody><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">4p</span> <span class="fc-title">Repeating Event</span></div></a></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 198.5px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2014-11-23"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2014-11-24"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2014-11-25"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2014-11-26"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2014-11-27"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2014-11-28"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2014-11-29"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2014-11-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-mon fc-past" data-date="2014-11-24"><span class="fc-day-number">24</span></td><td class="fc-day-top fc-tue fc-past" data-date="2014-11-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-wed fc-past" data-date="2014-11-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-thu fc-past" data-date="2014-11-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-fri fc-past" data-date="2014-11-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-sat fc-past" data-date="2014-11-29"><span class="fc-day-number">29</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" href="http://google.com/"><div class="fc-content"> <span class="fc-title">Click for Google</span></div><div class="fc-resizer fc-end-resizer"></div></a></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 198.5px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2014-11-30"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2014-12-01"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2014-12-02"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2014-12-03"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-past" data-date="2014-12-04"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-past" data-date="2014-12-05"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-past" data-date="2014-12-06"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2014-11-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2014-12-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2014-12-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-wed fc-other-month fc-past" data-date="2014-12-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-thu fc-other-month fc-past" data-date="2014-12-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-fri fc-other-month fc-past" data-date="2014-12-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-sat fc-other-month fc-past" data-date="2014-12-06"><span class="fc-day-number">6</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
			</div>
		</div>
		<!---/Calendar Agenda-->
			</div>
		</div>
		<!-- /dashboard content -->
@endsection