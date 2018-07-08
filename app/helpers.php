<?php
	//According to ISO-8601 (Carbon::dayOfWeek)
	if (!function_exists('get_weekday')) {
		function get_weekday($day) {
			switch ($day) {
				case 1:
					return 'Воскресенье';
					break;
				case 2:
					return 'Понедельник';
					break;				
				case 3:
					return 'Вторник';
					break;
				case 4:
					return 'Среда';
					break;
				case 5:
					return 'Четверг';
					break;
				case 6:
					return 'Пятница';
					break;
				case 7:
					return 'Суббота';
					break;				
				default:
					return 'Ошибка. Проверьте код!';
					break;
			}
		}
	}