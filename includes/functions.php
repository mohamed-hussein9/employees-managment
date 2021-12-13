<?php

function rate($rate)
{

    if ($rate == 1) {
        return "*";
    } elseif ($rate == 2) {
        return "**";
    } elseif ($rate == 3) {
        return "***";
    } elseif ($rate == 4) {
        return "****";
    } elseif ($rate == 5) {
        return "*****";
    }
}

// target
function target($target)
{

    switch ($target) {
        case 'sys1_10000':
            $total_income = 83000;
            $salary1 = 66000;
            break;
        case 'sys1_15000':
            $total_income = 104000;
            $salary1 = 83000;
            break;
        case 'sys1_25000':
            $total_income = 151000;
            $salary1 = 120000;
            break;
        case 'sys1_35000':
            $total_income = 206000;
            $salary1 = 165000;
            break;
        case 'sys1_50000':
            $total_income = 274000;
            $salary1 = 205000;
            break;
        case 'sys1_100000':
            $total_income = 508000;
            $salary1 = 381000;
            break;
        case 'sys1_200000':
            $total_income = 937000;
            $salary1 = 702000;
            break;
        case 'sys1_350000':
            $total_income = 1500000;
            $salary1 = 1125000;
            break;
        case 'sys1_500000':
            $total_income = 2142000;
            $salary1 = 1607000;
            break;
        case 'sys1_750000':
            $total_income = 3214000;
            $salary1 = 2410000;
            break;
        case 'sys1_1000000':
            $total_income = 4285000;
            $salary1 = 3214000;
            break;
        case 'sys2_5000':
            $total_income = 68000;
            $salary1 = 50000;
            break;
        case 'sys2_10000':
            $total_income = 135000;
            $salary1 = 100000;
            break;
        case 'sys2_20000':
            $total_income = 270000;
            $salary1 = 200000;
            break;
        case 'sys2_30000':
            $total_income = 365000;
            $salary1 = 260000;
            break;
        case 'sys2_40000':
            $total_income = 460000;
            $salary1 = 320000;
            break;
        case 'sys2_50000':
            $total_income = 575000;
            $salary1 = 400000;
            break;
        case 'sys2_70000':
            $total_income = 805000;
            $salary1 = 560000;
            break;
        case 'sys2_100000':
            $total_income = 1150000;
            $salary1 = 800000;
            break;
        case 'sys2_125000':
            $total_income = 1438000;
            $salary1 = 1000000;
            break;
        case 'sys2_150000':
            $total_income = 1725000;
            $salary1 = 1200000;
            break;
        case 'sys2_200000':
            $total_income = 2300000;
            $salary1 = 1600000;
            break;
        case 'sys2_250000':
            $total_income = 2875000;
            $salary1 = 2000000;
            break;
        case 'sys2_300000':
            $total_income = 3450000;
            $salary1 = 2400000;
            break;
        case 'sys2_350000':
            $total_income = 4025000;
            $salary1 = 2800000;
            break;
        case 'sys2_400000':
            $total_income = 4600000;
            $salary1 = 3200000;
            break;
        case 'sys2_450000':
            $total_income = 5175000;
            $salary1 = 3600000;
            break;
        case 'sys2_500000':
            $total_income = 5750000;
            $salary1 = 4000000;
            break;
        case 'sys2_550000':
            $total_income = 6325000;
            $salary1 = 4400000;
            break;
        case 'sys2_600000':
            $total_income = 6900000;
            $salary1 = 4800000;
            break;
        case 'sys2_700000':
            $total_income = 8050000;
            $salary1 = 5600000;
            break;
        case 'sys2_800000':
            $total_income = 9200000;
            $salary1 = 6400000;
            break;
        case 'sys2_900000':
            $total_income = 10350000;
            $salary1 = 7200000;
            break;
        case 'sys2_1000000':
            $total_income = 11500000;
            $salary1 = 8000000;
            break;
    }
    $r = array($total_income, $salary1);
    return $r;
}
