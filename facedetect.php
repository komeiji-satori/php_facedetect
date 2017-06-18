<?php
function facedetect($input = '', $output = '', $type = 0) {
	if ($type == 0) {
		$result = shell_exec('facedetect ' . $input);
		$result = explode(' ', $result);
		$face_count = count($result) / 4;
		if ($face_count < 0) {
			return ['status' => 404, 'msg' => 'Face Not Found'];
		} else {
			$location = array_chunk($result, 4);
			for ($i = 0; $i < count($location); $i++) {
				for ($v = 0; $v < count($location[$i]); $v++) {
					$location[$i][$v] = intval(str_replace(PHP_EOL, '', $location[$i][$v]));
				}
			}
			return [
				'status' => 200,
				'result' => [
					'face_count' => $face_count,
					'location' => $location,
				],
			];
		}
	} else {
		$result = shell_exec('facedetect ' . $input . ' -o ' . $output);
		$result = explode(' ', $result);
		$face_count = count($result) / 4;
		if ($face_count < 0) {
			return ['status' => 404, 'msg' => 'Face Not Found'];
		} else {
			$location = array_chunk($result, 4);
			for ($i = 0; $i < count($location); $i++) {
				for ($v = 0; $v < count($location[$i]); $v++) {
					$location[$i][$v] = intval(str_replace(PHP_EOL, '', $location[$i][$v]));
				}
			}
			return [
				'status' => 200,
				'result' => [
					'face_count' => $face_count,
					'location' => $location,
					'output' => $output,
				],
			];
		}
	}
}