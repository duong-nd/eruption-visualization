<?php

/******************************************************************************************************
*
* Package of functions for operations on date/time
*
* is_datetime: Function to check that a string is a correct date in ISO format
* datetime_string_to_int: Function to parse an ISO formatted datetime to year, month, day, hour, minute, second
* datetime_int_to_string: Function to transform year, month, day, hour, minute, second integers to an ISO formatted date
* datetime_seconds_to_iso: Function to transfer seconds into a datetime format
* datetime_add_datetime: Function to add a datetime to another datetime
* datetime_add_seconds: Function to add seconds to a datetime
* datetime_substract_datetime: Function to substract a datetime to another datetime
* datetime_get_min_max: Function to get the minimum and maximum dates from a date and its uncertainty
* datetime_date_before_date: Function to tell whether a date/time is before, equal or after another date/time
* datetime_date_included: Function to tell whether a date is included in a time frame
* datetime_dateframe_included: Function to tell whether a time frame is included in another time frame
* datetime_round_day: Function to round a datetime to the nearest day
* datetime_round_hour: Function to round a datetime to the nearest hour
*
******************************************************************************************************/

/******************************************************************************************************
* Function to check that a string is a correct date in ISO format
* Returns FALSE if string is not a correct date in ISO format, TRUE otherwise
* Input:	- $string: a string
* 			- $zero: a boolean whether 00 is an authorized month and day
******************************************************************************************************/
function is_datetime($string, $zero) {
	// Check number of characters (must be 19)
	if (strlen($string)!=19) {
print "<br />";
print "length != 19";
print "<br />";
	return FALSE;
	}
	
	// Check characters 4 and 7: must be "-"
	if (substr($string, 4, 1)!="-" || substr($string, 7, 1)!="-") {
print "<br />";
print "- not good: ".substr($string, 4, 1);
print "<br />";
		return FALSE;
	}
	// Check character 10: must be " "
	if (substr($string, 10, 1)!=" ") {
print "<br />";
print "_ not good";
print "<br />";
		return FALSE;
	}
	// Check characters 13 and 16: must be ":"
	if (substr($string, 13, 1)!=":" || substr($string, 16, 1)!=":") {
print "<br />";
print ": not good";
print "<br />";
		return FALSE;
	}
	
	// Check year: must be between 0000 and 9999
	$year_str=substr($string, 0, 4);
	if (!ctype_digit($year_str)) {
print "<br />";
print "year not good";
print "<br />";
		return FALSE;
	}
	$year=intval($year_str);
	
	// Check month: must be between 01 (00 if allowed) and 12
	$month_str=substr($string, 5, 2);
	if (!ctype_digit($month_str)) {
print "<br />";
print "month not good";
print "<br />";
		return FALSE;
	}
	$month=intval($month_str);
	if ($zero) {
		if ($month<0) {
print "<br />";
print "month < 0";
print "<br />";
			return FALSE;
		}
	}
	else {
		if ($month<1) {
print "<br />";
print "month < 1";
print "<br />";
			return FALSE;
		}
	}
	if ($month>12) {
print "<br />";
print "month > 12";
print "<br />";
		return FALSE;
	}
	
	// Check day: must be between 01 (00 if allowed) and x where x=28, 29, 30, 31 (depending on year and month)
	$day_str=substr($string, 8, 2);
	if (!ctype_digit($day_str)) {
print "<br />";
print "day not good";
print "<br />";
		return FALSE;
	}
	$day=intval($day_str);
	if ($zero) {
		if ($day<0) {
print "<br />";
print "month < 0";
print "<br />";
			return FALSE;
		}
	}
	else {
		if ($day<1) {
print "<br />";
print "month < 0";
print "<br />";
			return FALSE;
		}
	}
	switch ($month) {
		case 1:
		case 3:
		case 5:
		case 7:
		case 8:
		case 10:
		case 12:
			// 31 days max
			if ($day>31) {
print "<br />";
print "month < 0";
print "<br />";
				return FALSE;
			}
			break;
		case 4:
		case 6:
		case 9:
		case 11:
			// 30 days max
			if ($day>30) {
print "<br />";
print "month < 0";
print "<br />";
				return FALSE;
			}
			break;
		case 2:
			// If leap year
			if ($year%4==0) {
				// 29 days max
				if ($day>29) {
print "<br />";
print "month < 0";
print "<br />";
					return FALSE;
				}
			}
			else {
				// 28 days max
				if ($day>28) {
print "<br />";
print "month < 0";
print "<br />";
					return FALSE;
				}
			}
			break;
	}
	
	// Check hour: must be between 00 and 23
	$hour_str=substr($string, 11, 2);
	if (!ctype_digit($hour_str)) {
print "<br />";
print "month < 0";
print "<br />";
		return FALSE;
	}
	$hour=intval($hour_str);
	if ($hour<0 || $hour>23) {
print "<br />";
print "month < 0";
print "<br />";
		return FALSE;
	}
	
	// Check minute: must be between 00 and 59
	$minute_str=substr($string, 14, 2);
	if (!ctype_digit($minute_str)) {
print "<br />";
print "month < 0";
print "<br />";
		return FALSE;
	}
	$minute=intval($minute_str);
	if ($minute<0 || $minute>59) {
print "<br />";
print "month < 0";
print "<br />";
		return FALSE;
	}
	
	// Check second: must be between 00 and 59
	$second_str=substr($string, 17, 2);
	if (!ctype_digit($second_str)) {
print "<br />";
print "month < 0";
print "<br />";
		return FALSE;
	}
	$second=intval($second_str);
	if ($second<0 || $second>59) {
print "<br />";
print "month < 0";
print "<br />";
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to parse an ISO formatted datetime to year, month, day, hour, minute, second
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* Output:	- $year: the year of date/time as an integer
* 			- $month: the month of date/time as an integer
* 			- $day: the day of date/time as an integer
* 			- $hour: the hour of date/time as an integer
* 			- $minute: the minute of date/time as an integer
* 			- $second: the second of date/time as an integer
* 			- $error: an error message
******************************************************************************************************/
function datetime_string_to_int($date, &$year, &$month, &$day, &$hour, &$minute, &$second, &$error) {
	// Trim date
	$date=preg_replace('/\s+/', ' ', trim($date));
	
	// Check parameters
	if (strlen($date)==10) {
		// If date type (YYYY-MM-DD)
		if (strpos($date, ":")===FALSE) {
			$date=$date." 00:00:00";
		}
		else {
			$error="Date (".$date.") is not in correct ISO format (YYYY-MM-DD HH:MM:SS)";
			return FALSE;
		}
	}
	
	// Get year
	$first_dash=strpos($date, "-");
	if ($first_dash==0) {
		$first_dash=strpos($date, "-", 1);
		$year_str=substr($date, 1, $first_dash-1);
		if (!ctype_digit($year_str)) {
			$error="Date (".$date.") is not in correct ISO format (YYYY-MM-DD HH:MM:SS)";
			return FALSE;
		}
		$year_str="-".$year_str;
	}
	else {
		$year_str=substr($date, 0, $first_dash);
		if (!ctype_digit($year_str)) {
			$error="Date (".$date.") is not in correct ISO format (YYYY-MM-DD HH:MM:SS)";
			return FALSE;
		}
	}
	
	$date_no_year=substr($date, $first_dash+1);
	
	$month_str=substr($date_no_year, 0, 2);
	if (!ctype_digit($month_str)) {
		$error="Date (".$date.") is not in correct ISO format (YYYY-MM-DD HH:MM:SS)";
		return FALSE;
	}
	
	$day_str=substr($date_no_year, 3, 2);
	if (!ctype_digit($day_str)) {
		$error="Date (".$date.") is not in correct ISO format (YYYY-MM-DD HH:MM:SS)";
		return FALSE;
	}
	
	$hour_str=substr($date_no_year, 6, 2);
	if (!ctype_digit($hour_str)) {
		$error="Date (".$date.") is not in correct ISO format (YYYY-MM-DD HH:MM:SS)";
		return FALSE;
	}
	
	$minute_str=substr($date_no_year, 9, 2);
	if (!ctype_digit($minute_str)) {
		$error="Date (".$date.") is not in correct ISO format (YYYY-MM-DD HH:MM:SS)";
		return FALSE;
	}
	
	$second_str=substr($date_no_year, 12, 2);
	if (!ctype_digit($second_str)) {
		$error="Date (".$date.") is not in correct ISO format (YYYY-MM-DD HH:MM:SS)";
		return FALSE;
	}
	
	// Transform strings to integer
	$year=intval($year_str);
	$month=intval($month_str);
	$day=intval($day_str);
	$hour=intval($hour_str);
	$minute=intval($minute_str);
	$second=intval($second_str);
	
	return TRUE;
}

/******************************************************************************************************
* Function to transform year, month, day, hour, minute, second integers to an ISO formatted date
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $year: the year of date/time as an integer
* 			- $month: the month of date/time as an integer
* 			- $day: the day of date/time as an integer
* 			- $hour: the hour of date/time as an integer
* 			- $minute: the minute of date/time as an integer
* 			- $second: the second of date/time as an integer
* Output:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $error: an error message
******************************************************************************************************/
function datetime_int_to_string($year, $month, $day, $hour, $minute, $second, &$date, &$error) {
	// Check parameters given
	if ($year>9999) {
		$year=9999;
	}
	if ($year<0) {
		$year=0;
	}
	if ($month<0 || $month>12) {
		$error="Month must have a value from 0 to 12";
		return FALSE;
	}
	if ($day<0 || $day>31) {
		$error="Day must have a value from 0 to 31";
		return FALSE;
	}
	if ($hour<0 || $hour>23) {
		$error="Hour must have a value from 0 to 23";
		return FALSE;
	}
	if ($minute<0 || $minute>59) {
		$error="Minute must have a value from 0 to 59";
		return FALSE;
	}
	if ($second<0 || $second>59) {
		$error="Second must have a value from 0 to 59";
		return FALSE;
	}
	
	// Year
	$year_str=strval($year);
	switch (strlen($year_str)) {
		case 1:
			$year_str="000".$year_str;
			break;
		case 2:
			$year_str="00".$year_str;
			break;
		case 3:
			$year_str="0".$year_str;
			break;
	}
	
	// Month
	$month_str=strval($month);
	if (strlen($month_str)==1) {
		$month_str="0".$month_str;
	}
	
	// Day
	$day_str=strval($day);
	if (strlen($day_str)==1) {
		$day_str="0".$day_str;
	}
	
	// Hour
	$hour_str=strval($hour);
	if (strlen($hour_str)==1) {
		$hour_str="0".$hour_str;
	}
	
	// Minute
	$minute_str=strval($minute);
	if (strlen($minute_str)==1) {
		$minute_str="0".$minute_str;
	}
	
	// Second
	$second_str=strval($second);
	if (strlen($second_str)==1) {
		$second_str="0".$second_str;
	}
	
	// Compile date
	$date=$year_str."-".$month_str."-".$day_str." ".$hour_str.":".$minute_str.":".$second_str;
	
	return TRUE;
}

/******************************************************************************************************
* Function to transfer seconds into a datetime format
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $add_seconds: the number of seconds to add
* Output:	- $result_date: the computed date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $error: an error message
******************************************************************************************************/
function datetime_seconds_to_iso($seconds, &$date, &$error) {
	// Seconds in 1 minute
	$sec_in_min=60;
	// Seconds in 1 hour
	$sec_in_hour=3600;
	// Seconds in 1 day
	$sec_in_day=3600*24;
	// Seconds in 1 month
	$sec_in_month=3600*24*31;
	// Seconds in 1 year
	$sec_in_year=3600*24*31*12;
	
	// Year
	$year=intval($seconds/$sec_in_year);
	if ($year>9999) {
		$year=9999;
		$month=12;
		$day=31;
		$hour=23;
		$min=59;
		$sec=59;
		return TRUE;
	}
	$seconds=$seconds%$sec_in_year;
	// Month
	$month=intval($seconds/$sec_in_month);
	$seconds=$seconds%$sec_in_month;
	// Day
	$day=intval($seconds/$sec_in_day);
	$seconds=$seconds%$sec_in_day;
	// Hour
	$hour=intval($seconds/$sec_in_hour);
	$seconds=$seconds%$sec_in_hour;
	// Minute
	$min=intval($seconds/$sec_in_min);
	$seconds=$seconds%$sec_in_min;
	
	// Return date in ISO format
	if (!datetime_int_to_string($year, $month, $day, $hour, $min, $seconds, $date, $error)) {
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to add a datetime to another datetime
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $add_date: the date/time to add in ISO format (YYYY-MM-DD HH:MM:SS)
* Output:	- $result_date: the computed date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $error: an error message
******************************************************************************************************/
function datetime_add_datetime($date, $add_date, &$result_date, &$error) {
	// Date/time
	if (!datetime_string_to_int($date, $year, $month, $day, $hour, $min, $sec, $error)) {
		return FALSE;
	}
	
	// Date/time to add
	if (!datetime_string_to_int($add_date, $add_year, $add_month, $add_day, $add_hour, $add_min, $add_sec, $error)) {
		return FALSE;
	}
	
	// Year
	$result_year=$year+$add_year; // 2009 + 2 => 2011
	
	// Month
	$result_month=$month+$add_month; // 3 + 4 => 7 || 3 + 12 => 15
	if ($result_month>12) {
		$result_month-=12; // 15 - 12 => 3
		$result_year++;
	}
	
	// Day
	$result_day=$day+$add_day; // 14 + 7 => 21 || 14 + 31 => 45
	// Depending on month
	switch ($result_month) {
		case 1:
		case 3:
		case 5:
		case 7:
		case 8:
		case 10:
		case 12:
			if ($result_day>31) {
				// Substract 31 days
				$result_day-=31;
				$result_month++;
				// In case it was December
				if ($result_month==13) {
					$result_month=1;
					$result_year++;
				}
			}
			break;
		case 4:
		case 6:
		case 9:
		case 11:
			if ($result_day>30) {
				// Substract 30 days
				$result_day-=30;
				$result_month++;
			}
			break;
		case 2:
			// Determine if it was a leap year
			if (($result_year%4)==0) {
				// Leap year
				if ($result_day>29) {
					// Substract 29 days
					$result_day-=29;
					$result_month++;
				}
			}
			else {
				if ($result_day>28) {
					// Substract 28 days
					$result_day-=28;
					$result_month++;
				}
			}
			break;
	}
	
	// Hour
	$result_hour=$hour+$add_hour; // 12 + 4 => 16 || 12 + 23 => 35
	if ($result_hour>23) {
		$result_hour-=24; // 35 - 24 => 11
		$result_day++;
		// Depending on month
		switch ($result_month) {
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
				if ($result_day>31) {
					// Substract 31 days
					$result_day-=31;
					$result_month++;
					// In case it was December
					if ($result_month==13) {
						$result_month=1;
						$result_year++;
					}
				}
				break;
			case 4:
			case 6:
			case 9:
			case 11:
				if ($result_day>30) {
					// Substract 30 days
					$result_day-=30;
					$result_month++;
				}
				break;
			case 3:
				// Determine if it was a leap year
				if (($result_year%4)==0) {
					// Leap year
					if ($result_day>29) {
						// Substract 29 days
						$result_day-=29;
						$result_month++;
					}
				}
				else {
					if ($result_day>28) {
						// Substract 28 days
						$result_day-=28;
						$result_month++;
					}
				}
				break;
		}
	}
	
	// Minute
	$result_min=$min+$add_min; // 36 + 15 => 51 || 36 + 59 => 95
	if ($result_min>59) {
		$result_min-=60;
		$result_hour++;
		if ($result_hour==24) {
			$result_hour=0;
			$result_day++;
			// Depending on month
			switch ($result_month) {
				case 1:
				case 3:
				case 5:
				case 7:
				case 8:
				case 10:
				case 12:
					if ($result_day>31) {
						// Substract 31 days
						$result_day-=31;
						$result_month++;
						// In case it was December
						if ($result_month==13) {
							$result_month=1;
							$result_year++;
						}
					}
					break;
				case 4:
				case 6:
				case 9:
				case 11:
					if ($result_day>30) {
						// Substract 30 days
						$result_day-=30;
						$result_month++;
					}
					break;
				case 3:
					// Determine if it was a leap year
					if (($result_year%4)==0) {
						// Leap year
						if ($result_day>29) {
							// Substract 29 days
							$result_day-=29;
							$result_month++;
						}
					}
					else {
						if ($result_day>28) {
							// Substract 28 days
							$result_day-=28;
							$result_month++;
						}
					}
					break;
			}
		}
	}
	
	// Second
	$result_sec=$sec+$add_sec; // 36 + 15 => 51 || 36 + 59 => 95
	if ($result_sec>59) {
		$result_sec-=60;
		$result_min++;
		if ($result_min==60) {
			$result_min=0;
			$result_hour++;
			if ($result_hour==24) {
				$result_hour=0;
				$result_day++;
				// Depending on month
				switch ($result_month) {
					case 1:
					case 3:
					case 5:
					case 7:
					case 8:
					case 10:
					case 12:
						if ($result_day>31) {
							// Substract 31 days
							$result_day-=31;
							$result_month++;
							// In case it was December
							if ($result_month==13) {
								$result_month=1;
								$result_year++;
							}
						}
						break;
					case 4:
					case 6:
					case 9:
					case 11:
						if ($result_day>30) {
							// Substract 30 days
							$result_day-=30;
							$result_month++;
						}
						break;
					case 3:
						// Determine if it was a leap year
						if (($result_year%4)==0) {
							// Leap year
							if ($result_day>29) {
								// Substract 29 days
								$result_day-=29;
								$result_month++;
							}
						}
						else {
							if ($result_day>28) {
								// Substract 28 days
								$result_day-=28;
								$result_month++;
							}
						}
						break;
				}
			}
		}
	}
	
	// Return date in ISO format
	if (!datetime_int_to_string($result_year, $result_month, $result_day, $result_hour, $result_min, $result_sec, $result_date, $error)) {
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to add seconds to a datetime
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $add_seconds: the number of seconds to add
* Output:	- $result_date: the computed date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $error: an error message
******************************************************************************************************/
function datetime_add_seconds($date, $add_seconds, &$result_date, &$error) {
	// Transform seconds into date/time format
	if (!datetime_seconds_to_iso($add_seconds, $add_date, $error)) {
		return FALSE;
	}
	
	// Add date/time
	if (!datetime_add_datetime($date, $add_date, $result_date, $error)) {
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to substract seconds to a datetime
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $substract_seconds: the number of seconds to substract
* Output:	- $result_date: the computed date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $error: an error message
******************************************************************************************************/
function datetime_substract_seconds($date, $substract_seconds, &$result_date, &$error) {
	// Transform seconds into date/time format
	if (!datetime_seconds_to_iso($substract_seconds, $substract_date, $error)) {
		return FALSE;
	}
	
	// Substract date/time
	if (!datetime_substract_datetime($date, $substract_date, $result_date, $error)) {
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to substract a datetime to another datetime
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $sub_date: the date/time to substract in ISO format (YYYY-MM-DD HH:MM:SS)
* Output:	- $result_date: the computed date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $error: an error message
******************************************************************************************************/
function datetime_substract_datetime($date, $sub_date, &$result_date, &$error) {
	// Date/time
	if (!datetime_string_to_int($date, $year, $month, $day, $hour, $min, $sec, $error)) {
		return FALSE;
	}
	
	// Date/time to substract
	if (!datetime_string_to_int($sub_date, $sub_year, $sub_month, $sub_day, $sub_hour, $sub_min, $sub_sec, $error)) {
		return FALSE;
	}
	
	// Year
	$result_year=$year-$sub_year; // 2009 - 2 => 2007
	
	// Month
	$result_month=$month-$sub_month; // 11 - 3 => 8 || 11 - 12 => -1
	if ($result_month<=0) {
		$result_month+=12; // -1 + 12 => 11
		$result_year--;
	}
	
	// Day
	$result_day=$day-$sub_day; // 14 - 7 => 7 || 14 - 31 => -17
	if ($result_day<=0) {
		// Depending on month
		switch ($result_month) {
			case 1:
			case 2:
			case 4:
			case 6:
			case 8:
			case 9:
			case 11:
				// Add 31 days (of the previous month)
				$result_day+=31;
				$result_month--; // 2 => 1
				// In case it was January
				if ($result_month==0) {
					$result_month=12;
					$result_year--;
				}
				break;
			case 5:
			case 7:
			case 10:
			case 12:
				// Add 30 days (of the previous month)
				$result_day+=30;
				$result_month--; // 2 => 1
				break;
			case 3:
				// Determine if it was a leap year
				if (($result_year%4)==0) {
					// Leap year
					// Add 29 days
					$result_day+=29;
					$result_month--;
				}
				else {
					// Add 28 days
					$result_day+=28;
					$result_month--;
				}
				break;
		}
	}
	
	// Hour
	$result_hour=$hour-$sub_hour; // 12 - 4 => 8 || 12 - 24 => -12
	if ($result_hour<0) {
		$result_hour+=24; // -12 + 24 => 12
		$result_day--;
		if ($result_day==0) {
			// Depending on month
			switch ($result_month) {
				case 1:
				case 2:
				case 4:
				case 6:
				case 8:
				case 9:
				case 11:
					// Add 31 days
					$result_day+=31;
					$result_month--;
					// In case it was January
					if ($result_month==0) {
						$result_month=12;
						$result_year--;
					}
					break;
				case 5:
				case 7:
				case 10:
				case 12:
					// Add 30 days
					$result_day+=30;
					$result_month--; // 2 => 1
					break;
				case 3:
					// Determine if it was a leap year
					if (($result_year%4)==0) {
						// Leap year
						// Add 29 days
						$result_day+=29;
						$result_month--;
					}
					else {
						// Add 28 days
						$result_day+=28;
						$result_month--;
					}
					break;
			}
		}
	}
	
	// Minute
	$result_min=$min-$sub_min; // 36 - 25 => 11 || 36 - 59 => -23
	if ($result_min<0) {
		$result_min+=60;
		$result_hour--;
		if ($result_hour==-1) {
			$result_hour+=24;
			$result_day--;
			if ($result_day==0) {
				// Depending on month
				switch ($result_month) {
					case 1:
					case 2:
					case 4:
					case 6:
					case 8:
					case 9:
					case 11:
						// Add 31 days
						$result_day+=31;
						$result_month--;
						// In case it was January
						if ($result_month==0) {
							$result_month=12;
							$result_year--;
						}
						break;
					case 5:
					case 7:
					case 10:
					case 12:
						// Add 30 days
						$result_day+=30;
						$result_month--; // 2 => 1
						break;
					case 3:
						// Determine if it was a leap year
						if (($result_year%4)==0) {
							// Leap year
							// Add 29 days
							$result_day+=29;
							$result_month--;
						}
						else {
							// Add 28 days
							$result_day+=28;
							$result_month--;
						}
						break;
				}
			}
		}
	}
	
	// Second
	$result_sec=$sec-$sub_sec; // 36 - 25 => 11 || 36 - 59 => -23
	if ($result_sec<0) {
		$result_sec+=60;
		$result_min--;
		if ($result_min==-1) {
			$result_min+=60;
			$result_hour--;
			if ($result_hour==-1) {
				$result_hour+=24;
				$result_day--;
				if ($result_day==0) {
					// Depending on month
					switch ($result_month) {
						case 1:
						case 2:
						case 4:
						case 6:
						case 8:
						case 9:
						case 11:
							// Add 31 days
							$result_day+=31;
							$result_month--;
							// In case it was January
							if ($result_month==0) {
								$result_month=12;
								$result_year--;
							}
							break;
						case 5:
						case 7:
						case 10:
						case 12:
							// Add 30 days
							$result_day+=30;
							$result_month--; // 2 => 1
							break;
						case 3:
							// Determine if it was a leap year
							if (($result_year%4)==0) {
								// Leap year
								// Add 29 days
								$result_day+=29;
								$result_month--;
							}
							else {
								// Add 28 days
								$result_day+=28;
								$result_month--;
							}
							break;
					}
				}
			}
		}
	}
	
	// Return date in ISO format
	if (!datetime_int_to_string($result_year, $result_month, $result_day, $result_hour, $result_min, $result_sec, $result_date, $error)) {
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the minimum and maximum dates from a date and its uncertainty
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $date_unc: a date/time uncertainty in ISO format (YYYY-MM-DD HH:MM:SS)
* Output:	- $min_date: the computed minimum date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $max_date: the computed maximum date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $error: an error message
******************************************************************************************************/
function datetime_get_min_max($date, $date_unc, &$min_date, &$max_date, &$error) {
	// Minimum date/time (substract uncertainty)
	if (!datetime_substract_datetime($date, $date_unc, $min_date, $error)) {
		return FALSE;
	}
	
	// Maximum start time (add uncertainty)
	if (!datetime_add_datetime($date, $date_unc, $max_date, $error)) {
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to tell whether a date/time is before, equal or after another date/time
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $other_date: the other date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* Output:	- $is_before: 0 = before / 1 = equal / 2 = after
* 			- $error: an error message
******************************************************************************************************/
function datetime_date_before_date($date, $other_date, &$is_before, &$error) {
	// Get year, month, day, hour, minute and second of each dates
	if (!datetime_string_to_int($date, $year, $month, $day, $hour, $min, $sec, $error)) {
		return FALSE;
	}
	if (!datetime_string_to_int($other_date, $other_year, $other_month, $other_day, $other_hour, $other_min, $other_sec, $error)) {
		return FALSE;
	}
	
	// Compare year, month, day, hour, minute, second
	
	// Year
	if ($year<$other_year) {
		$is_before=0;
		return TRUE;
	}
	if ($year>$other_year) {
		$is_before=2;
		return TRUE;
	}
	
	// Month
	if ($month<$other_month) {
		$is_before=0;
		return TRUE;
	}
	if ($month>$other_month) {
		$is_before=2;
		return TRUE;
	}
	
	// Day
	if ($day<$other_day) {
		$is_before=0;
		return TRUE;
	}
	if ($day>$other_day) {
		$is_before=2;
		return TRUE;
	}
	
	// Hour
	if ($hour<$other_hour) {
		$is_before=0;
		return TRUE;
	}
	if ($hour>$other_hour) {
		$is_before=2;
		return TRUE;
	}
	
	// Minute
	if ($min<$other_min) {
		$is_before=0;
		return TRUE;
	}
	if ($min>$other_min) {
		$is_before=2;
		return TRUE;
	}
	
	// Second
	if ($sec<$other_sec) {
		$is_before=0;
		return TRUE;
	}
	if ($sec>$other_sec) {
		$is_before=2;
		return TRUE;
	}
	
	// Dates are equal
	$is_before=1;
	
	return TRUE;
}

/******************************************************************************************************
* Function to tell whether a date is included in a time frame
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: the date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $open_date: the opening date/time frame in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $close_date: the closing date/time frame in ISO format (YYYY-MM-DD HH:MM:SS)
* Output:	- $is_included: 0 = not included / 1 = on time frame / 2 = included
* 			- $error: an error message
******************************************************************************************************/
function datetime_date_included($date, $open_date, $close_date, &$is_included, &$error) {
	// Check that open date is before or equal to close date
	if (!datetime_date_before_date($open_date, $close_date, $open_before_close, $error)) {
		return FALSE;
	}
	if ($open_before_close==2) {
		$error="Open date is after close date";
		return FALSE;
	}
	
	// Compare date with open date
	if (!datetime_date_before_date($date, $open_date, $date_before_open, $error)) {
		return FALSE;
	}
	switch ($date_before_open) {
		case 0:
			// Date is before open time
			$is_included=0;
			return TRUE;
		case 1:
			// Equal - return 1
			$is_included=1;
			return TRUE;
	}
	
	// Compare date with close date
	if (!datetime_date_before_date($date, $close_date, $date_before_close, $error)) {
		return FALSE;
	}
	switch ($date_before_close) {
		case 1:
			// Equal - return 1
			$is_included=1;
			return TRUE;
		case 2:
			// Date is after close time
			$is_included=0;
			return TRUE;
	}
	
	// Date is in between the 2 dates - return 2
	$is_included=2;
	
	return TRUE;
}

/******************************************************************************************************
* Function to tell whether a time frame is included in another time frame
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $open_date: the opening date/time frame in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $close_date: the closing date/time frame in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $other_open_date: the other opening date/time frame in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $other_close_date: the other closing date/time frame in ISO format (YYYY-MM-DD HH:MM:SS)
* Output:	- $is_included: 0 = not included / 1 = 1st time frame included in 2nd / 2 = time frames are overlapping / 3 = 2nd time frame is included in 1st
* 			- $error: an error message
******************************************************************************************************/
function datetime_dateframe_included($open_date, $close_date, $other_open_date, $other_close_date, &$is_included, &$error) {
	// Check that open date is before or equal to close date
	if (!datetime_date_before_date($open_date, $close_date, $open_before_close, $error)) {
		return FALSE;
	}
	if ($open_before_close==2) {
		$error="Open date is after close date";
		return FALSE;
	}
	// Check that other open date is before or equal to other close date
	if (!datetime_date_before_date($other_open_date, $other_close_date, $open_before_close, $error)) {
		return FALSE;
	}
	if ($open_before_close==2) {
		$error="Open date is after close date";
		return FALSE;
	}
	
	// Get if opening date is included in other timeframe
	if (!datetime_date_included($open_date, $other_open_date, $other_close_date, $open_is_included, $error)) {
		return FALSE;
	}
	// Get if closing date is included in other timeframe
	if (!datetime_date_included($close_date, $other_open_date, $other_close_date, $close_is_included, $error)) {
		return FALSE;
	}
	// Get if other opening date is included in timeframe
	if (!datetime_date_included($other_open_date, $open_date, $close_date, $other_open_is_included, $error)) {
		return FALSE;
	}
	
	// Case 1: not included
	if ($open_is_included==0 && $close_is_included==0 && $other_open_is_included==0) {
		$is_included=0;
		return TRUE;
	}
	// Case 2: 1st time frame included in 2nd
	if ($open_is_included!=0 && $close_is_included!=0) {
		$is_included=1;
		return TRUE;
	}
	// Case 3: time frames are overlapping
	if (($open_is_included==0 && $close_is_included!=0) || ($open_is_included!=0 && $close_is_included==0)) {
		$is_included=2;
		return TRUE;
	}
	// Case 4: 2nd time frame is included in 1st
	$is_included=3;
	
	return TRUE;
}

/******************************************************************************************************
* Function to round a datetime to the nearest day
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* Output:	- $result_date: the computed date in ISO format (YYYY-MM-DD)
* 			- $error: an error message
******************************************************************************************************/
function datetime_round_day($date, &$result_date, &$error) {
	// Date/time
	if (!datetime_string_to_int($date, $year, $month, $day, $hour, $min, $sec, $error)) {
		return FALSE;
	}
	
	// If hour is between 12 and 23, add 1 day
	if ($hour>=12) {
		if (!datetime_add_datetime($date, "0000-00-01 00:00:00", $result_date, $error)) {
			return FALSE;
		}
	}
	else {
		$result_date=$date;
	}
	
	// Keep YYYY-MM-DD only
	$result_date=substr($result_date, 0, 10);
	
	return TRUE;
}

/******************************************************************************************************
* Function to round a datetime to the nearest hour
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $date: a date/time in ISO format (YYYY-MM-DD HH:MM:SS)
* Output:	- $result_date: the computed date in ISO format (YYYY-MM-DD HH:MM:SS)
* 			- $error: an error message
******************************************************************************************************/
function datetime_round_hour($date, &$result_date, &$error) {
	// Date/time
	if (!datetime_string_to_int($date, $year, $month, $day, $hour, $min, $sec, $error)) {
		return FALSE;
	}
	
	// If min is between 30 and 59, add 1 hour
	if ($min>=30) {
		if (!datetime_add_datetime($date, "0000-00-00 01:00:00", $result_date, $error)) {
			return FALSE;
		}
	}
	else {
		$result_date=$date;
	}
	
	// Format result date: YYYY-MM-DD HH:00:00
	$result_date=substr($result_date, 0, 13).":00:00";
	
	return TRUE;
}

?>