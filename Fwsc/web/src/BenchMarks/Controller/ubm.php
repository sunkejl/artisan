<?php
/**
 * 微型压力测试  比较俩个函数的执行效率
 * getrusage — 获取当前资源使用状况  |#478 获取CPU循环的消耗
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/10/3
 * Time: 0:50
 */
register_shutdown_function('micro_benchmark_summary');
$ubm_timing = array();
function micro_benchmark($label, $impl_func, $iterations = 1)
{
    global $ubm_timing;
    print "benchmarking '$label'...";
    flush();
    $start = current_usercpu_rusage();
    //call_user_func($impl_func, $iterations);
    call_user_func(["BenchMarks\\Controller\\BenchMarksController", $impl_func], $iterations);
    //call_user_func_array(["BenchMarks\\Controller\\BenchMarksController",$impl_func], [$iterations]);
    $ubm_timing[$label] = current_usercpu_rusage() - $start;
    print "<br />\n";

    return $ubm_timing[$label];
}

function micro_benchmark_summary()
{
    global $ubm_timing;
    if (empty($ubm_timing)) {
        return;
    }
    arsort($ubm_timing);
    reset($ubm_timing);
    $slowest = current($ubm_timing);
    end($ubm_timing);
    print "<h2>And the winner is :";
    print key($ubm_timing)."</h2>\n";
    print "<table border=1>\n <tr>\n <td>&nbsp;</td>\n";
    foreach ($ubm_timing as $label => $usercpu) {
        print "<th>$label</th>\n";
    }
    print "</tr>\n";
    $ubm_timing_copy = $ubm_timing;
    foreach ($ubm_timing_copy as $label => $usercpu) {
        print "<tr>\n <td><b>$label</b><br />";
        printf("%.3fs</td>\n", $usercpu);
        foreach ($ubm_timing as $label2 => $usercpu2) {
            $percent = (($usercpu2 / $usercpu) - 1) * 100;
            if ($percent > 0) {
                printf("<td>%.3fs<br />%.1f%% slower", $usercpu2, $percent);
            } elseif ($percent < 0) {
                printf("<td>%.3fs<br />%.1f%% faster", $usercpu2, -$percent);
            } else {
                print "<td>&nbsp;";
            }
            print "</td>\n";
        }
        print "</tr>\n";
    }
    print "</table>\n";

}

function current_usercpu_rusage()
{
    $ru = getrusage();

    return $ru['ru_utime.tv_sec']
    + ($ru['ru_utime.tv_usec'] / 1000000.0);
}