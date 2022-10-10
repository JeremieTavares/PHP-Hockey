<?php
    function getDateList($startTimestamp, $nbDates) {
        $dateList = array();
        $nextDate = $startTimestamp;

        for ($i = 0; $i < $nbDates; $i++) {
            $dateString = date('Y-m-d', $nextDate);
            array_push($dateList, $dateString);
            $nextDate += 24 * 3600;
        }

        return $dateList;
    }
?>