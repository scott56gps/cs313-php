<?php
function getTimeDisplay($duration) {
    $timestamp = strtotime($duration);
    $hours = idate('H', $timestamp);
    $minutes = idate('i', $timestamp);

    $timeDisplay = '';
    if ($hours > 0) {
        $timeDisplay = $timeDisplay . $hours . ' Hours';
    }

    if ($minutes > 0) {
        $timeDisplay = $timeDisplay . ($hours > 0 ? ' ':'') . $minutes . ' Minutes';
    }

    return $timeDisplay;
}
?>