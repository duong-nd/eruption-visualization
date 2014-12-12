<?php
// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_sd_wav_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network event
v1_get_data($da_sd_wav_obj, "NETWORKEVENT", $gen_data);


// ^^^ Get single station event
v1_get_data($da_sd_wav_obj, "SINGLESTATIONEVENT", $gen_data2);

// ^^^ Get Tremor id
v1_get_data($da_sd_wav_obj, "TREMOR", $gen_data3);


// ^^^ Get station
v1_get_ms($da_sd_wav_obj, "STATION", $gen_stations);




// ^^^ Get publish date
v1_get_pubdate($da_sd_wav_obj);


// -- CHECK CHILDREN --


// ### Check children
foreach ($da_sd_wav_obj['value'] as &$da_sd_wav_ele) {
	switch ($da_sd_wav_ele['tag']) {
		case "WAVEFORM":
			$da_sd_wav_wav_obj=&$da_sd_wav_ele;
			include "da_sd_wav_wav.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_data);
array_shift($gen_data2);
array_shift($gen_data3);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>