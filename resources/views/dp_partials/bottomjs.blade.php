		<!-- Back to top -->
		<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>


		<script>
		    window.deleteButtonTrans = '{{ trans("global.app_delete_selected") }}';
		    window.copyButtonTrans = '{{ trans("global.app_copy") }}';
		    window.csvButtonTrans = '{{ trans("global.app_csv") }}';
		    window.excelButtonTrans = '{{ trans("global.app_excel") }}';
		    window.pdfButtonTrans = '{{ trans("global.app_pdf") }}';
		    window.printButtonTrans = '{{ trans("global.app_print") }}';
		    window.colvisButtonTrans = '{{ trans("global.app_colvis") }}';
		</script>

		<!-- Dashboard Core -->
		<script src="{{ asset('assets/js/vendors/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('assets/js/vendors/jquery.sparkline.min.js') }}"></script>
		<script src="{{ asset('assets/js/vendors/selectize.min.js') }}"></script>
		<script src="{{ asset('assets/js/vendors/jquery.tablesorter.min.js') }}"></script>
		<script src="{{ asset('assets/js/vendors/circle-progress.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
		<!-- Fullside-menu Js-->
		<script src="{{ asset('assets/plugins/toggle-sidebar/js/sidemenu.js') }}"></script>

		<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
		<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
		<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
		<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
		<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>

		<script src="{{ asset('assets/plugins/echarts/echarts.js') }}"></script>
		<script src="{{ asset('assets/js/index1.js') }}"></script>

		<!--Morris.js Charts Plugin -->
		<script src="{{ asset('assets/plugins/am-chart/amcharts.js') }}"></script>
		<script src="{{ asset('assets/plugins/am-chart/serial.js') }}"></script>
 
		<script src="{{ asset('assets/js/amcharts.js') }}"></script>
		
		<!-- Custom scroll bar Js-->
		<script src="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

		<!-- Custom Js-->
		<script src="{{ asset('assets/js/custom.js') }}"></script>

		<script>
		    window._token = '{{ csrf_token() }}';
		</script>
		<script>
		    $.extend(true, $.fn.dataTable.defaults, {
		        "language": {
		            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/English.json"
		        }
		    });
		</script>

 @yield('javascript')