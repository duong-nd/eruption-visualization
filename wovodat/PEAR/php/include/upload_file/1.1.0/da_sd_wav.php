<?php

// Upload children
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

?>
