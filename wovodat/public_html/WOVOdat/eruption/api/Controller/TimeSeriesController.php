<?php
	class TimeSeriesController {

		/**
		*	@param: 
		*		$vd_id
		*	@return 
		*		data list
		*/
		public static function loadDataList($vd_id) {
			return TimeSeriesRepository::getTimeSeriesList($vd_id);
		}	

	}
