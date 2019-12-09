<?php

$self = $_SERVER['PHP_SELF'];

if(isset($_GET['month']))
    $month = $_GET['month'];
elseif(isset($_GET['viewmonth']))
    $month = $_GET['viewmonth'];
else $month = date('m');

if(isset($_GET['year']))
    $year = $_GET['year'];
elseif(isset($_GET['viewyear']))
    $year = $_GET['viewyear'];
else $year = date('Y');

?>

<?php
if($month == '12')
    $next_year = $year + 1;
else $next_year = $year;

?>

<?php
$Month_r = array(
    "1" => "Січень",
    "2" => "Лютий",
    "3" => "Березень",
    "4" => "Квітень",
    "5" => "Травень",
    "6" => "Червень",
    "7" => "Липень",
    "8" => "Серпень",
    "9" => "Вересень",
    "10" => "Жовтень",
    "11" => "Листопад",
    "12" => "Грудень");

$first_of_month = mktime(0, 0, 0, $month, 1, $year);

$day_headings = array('Sunday', 'Monday', 'Tuesday',
    'Wednesday', 'Thursday', 'Friday', 'Saturday');

$maxdays = date('t', $first_of_month);
$date_info = getdate($first_of_month);
$month = $date_info['mon'];
$year = $date_info['year'];

if($month == '1'):
    $last_year = $year-1;
else: $last_year = $year;
endif;

$timestamp_last_month = $first_of_month - (24*60*60);
$last_month = date("m", $timestamp_last_month);

if($month == '12')
    $next_month = '1';
else $next_month = $month+1;

?>

<?php
$calendar = " 
<div class=\"block-on-center\">
<table width='390px' height='280px' style='border: 4px solid #000080';>
    <tr style='background: #228B22;'>
        <td colspan='7' class='navi'>
            <a style='margin-right: 60px; color: #FFFF00;' 
            href='$self?month=".$last_month."&year=".$last_year."'>Назад</a>
           ".$Month_r[$month]." ".$year."
            <a style='margin-left: 90px; color: #FFFF00;'
            href='$self?month=".$next_month."&year=".$next_year."'>Вперед</a>
        </td>
    </tr>
    <tr>
        <td class='datehead'>Пн</td>
        <td class='datehead'>Вт</td>
        <td class='datehead'>Ср</td>
        <td class='datehead'>Чт</td>
        <td class='datehead'>Пт</td>
        <td class='datehead'>Сб</td>
        <td class='datehead'>Нд</td>
    </tr>
    <tr>";
?>

<?php

$class = "";
$weekday = $date_info['wday'];

$weekday = $weekday-1;
if($weekday == -1) $weekday=6;

$day = 1;

if($weekday > 0)
    $calendar .= "<td colspan='$weekday'> </td>";

while($day <= $maxdays)
{
    if($weekday == 7) {
        $calendar .= "</tr><tr>";
        $weekday = 0;
    }

    $linkDate = mktime(0, 0, 0, $month, $day, $year);

    if((($day < 10 and "0$day" == date('d')) or ($day >= 10 and "$day" == date('d')))
        and (($month < 10 and "0$month" == date('m'))
            or ($month >= 10 and "$month" == date('m'))) and $year == date('Y'))
        $class = "caltoday";

    else {
        $d = date('m/d/Y', $linkDate);
        $class = "cal";
    }

    if($weekday == 5 || $weekday == 6) $red='style="color: red" ';
    else $red='';

    $calendar .= "
        <td class='{$class}'><span ".$red.">{$day}</span>
        </td>";
    $day++;
    $weekday++;
}

if($weekday != 7)
    $calendar .= "<td colspan='" . (7 - $weekday) . "'> </td>";

echo $calendar . "</tr></table>";
?>

<p>Виберіть місяць та рік:</p>

<?php
$months = array(
    'Січень',
    'Лютий',
    'Березень',
    'Квітень',
    'Травень',
    'Червень',
    'Липень',
    'Серпень',
    'Вересень',
    'Жовтень',
    'Листопад',
    'Грудень');

echo "<form style='float: left; margin-right: 10px;' action='$self' method='get'>
<select name='month'>";

for($i=0; $i<=11; $i++) {
    echo "<option value='".($i+1)."'";
    if($month == $i+1)
        echo "selected = 'selected'";
    echo ">".$months[$i]."</option>";
}

echo "</select>";
echo "<select name='year'>";

for($i=date('Y'); $i<=(date('Y')+20); $i++)
{
    $selected = ($year == $i ? "selected = 'selected'" : '');
    echo "<option value=\"".($i)."\"$selected>".$i."</option>";
}

echo "</select><input type='submit' value='Перевірити' /></form>";

if($month != date('m') || $year != date('Y'))
    echo "<div><a style='float: left; margin-left: 10px; font-size: 16px; padding-top: 5px;' 
  href='".$self."?month=".date('m')."&year=".date('Y')."'><< Повернутися до поточної дати</a></div>";
echo "</div>";
?>