<? 
    $callclass = $sf_user->getAttribute('sfCalendarPluginClass');
    if(isset($callclass))
    {
        $mark_on = 1;    
    }
    else
        $mark_on = 0;
?>
<table class="sfCalendarPlugin" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td colspan="8">
               <a onclick="xmlhttpPost_<?=$callclass->name?>('/sfCalendarPlugin/index?sfCalendarMonth=<?=$month?>&sfCalendarYear=<?=($year - 1)?>')">&lt;&lt;</a>&nbsp;&nbsp;&nbsp;
               <a onclick="xmlhttpPost_<?=$callclass->name?>('/sfCalendarPlugin/index?sfCalendarMonth=<?=$pmonth?>&sfCalendarYear=<?=$pyear?>')">&lt;</a>&nbsp;&nbsp;&nbsp;
               <?=$month_name;?>&nbsp;<?=$year?>&nbsp;&nbsp;&nbsp;
               <a onclick="xmlhttpPost_<?=$callclass->name?>('/sfCalendarPlugin/index?sfCalendarMonth=<?=$nmonth?>&sfCalendarYear=<?=$nyear?>')">&gt;</a>&nbsp;&nbsp;&nbsp;
               <a onclick="xmlhttpPost_<?=$callclass->name?>('/sfCalendarPlugin/index?sfCalendarMonth=<?=$month?>&sfCalendarYear=<?=($year + 1)?>')">&gt;&gt;</a>
            </td>
        </tr>
    </thead>
    <tr>
        <th>Mo</th>
        <th>Tu</th>
        <th>We</th>
        <th>Th</th>
        <th>Fr</th>
        <th>Sa</th>
        <th>Su</th>
        <th>Week</th>
    </tr>
    <? $over = 0; ?>
    <? $newweek = 1; ?>
    <? $begining = 1; ?>
    <? $day = 1;?>
    
    <? while($over != 1): ?>
        <? if($newweek == 1): ?>
            <? $newweek = 0; ?>
            <tr>
        <? endif;?>
        
        <? for($i = 1 ; $i <= 7 ; $i++): ?>
            <? if($begining == 1 && $i != $first_day): ?>
                <td class="normal">&nbsp;</td>
            <? elseif ($day <= $max_days): ?>
                <? 
                    $cur = mktime(0,0,0,$month,$day,$year);
                    $past = $callclass->past;
                    $future = $callclass->future;
                ?>            
                <? if(($past >= $cur && $past != "") || ($future <= $cur && $future != "")): ?>
                    <td class="past">
                        <?=$day;?>
                    </td>
                <? else: ?>
                    <? if($year."-".$month."-".$day == $today): ?>
                        <td class="today" onclick="choosedate_<?=$callclass->name?>('<?=$day."/".$month."/".$year?>')" onmouseover="this.className='hover'" onmouseout="this.className='today'">
                           <? if($mark_on == 1): ?>
                              <? $events = $callclass->getDayEvents($day,$month,$year); ?>
                              <? if($events > 0): ?>
                                  <div class="events"><?=$events?></div>
                              <? endif; ?>
                           <? endif; ?>
                           <?=$day?>
                        </td>
                    <? else: ?>
                        <? if($i == 7): ?>
                            <td class="sunday" onclick="choosedate_<?=$callclass->name?>('<?=$day."/".$month."/".$year?>')" onmouseover="this.className='hover'" onmouseout="this.className='sunday'">
                                <? if($mark_on == 1): ?>
                                    <? $events = $callclass->getDayEvents($day,$month,$year); ?>
                                    <? if($events > 0): ?>
                                        <div class="events"><?=$events?></div>
                                    <? endif; ?>
                                <? endif; ?>
                                <?=$day?>
                            </td>
                        <? else: ?>
                            <td class="normal" onclick="choosedate_<?=$callclass->name?>('<?=$day."/".$month."/".$year?>')" onmouseover="this.className='hover'" onmouseout="this.className='normal'">
                                <? if($mark_on == 1): ?>
                                    <? $events = $callclass->getDayEvents($day,$month,$year); ?>
                                    <? if($events > 0): ?>
                                        <div class="events"><?=$events?></div>
                                    <? endif; ?>
                                <? endif; ?>
                                <?=$day?>
                            </td>
                        <? endif; ?>
                    <? endif;?>
                <? endif; ?>
                <? $begining = 0;?>
                <? $day++;?>
            <? else: ?>
                <td class="normal">&nbsp;</td>
            <? endif;?>
        <? endfor; ?>
        <th><?=date("W",mktime(0,0,0,$month,$day - 1, $year))?></th>
        <? $newweek = -1; ?>
        <? if($newweek == -1): ?>
            <? $newweek = 1; ?>
            </tr>
        <? endif; ?>       

        <? if($day > $max_days): ?>
            <? $over = 1; ?>
        <? endif; ?>
    <? endwhile; ?>
</table>